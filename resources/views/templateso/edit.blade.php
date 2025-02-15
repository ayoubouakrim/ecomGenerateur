




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditeur Universel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-width: 360px;
            --primary-color: #4F46E5;
        }

        /* Surlignage de l’élément sélectionné */
        .element-highlight {
            outline: 2px solid var(--primary-color) !important;
            position: relative;
            transition: outline 0.2s;
        }
        .element-highlight::after {
            content: attr(data-element-type);
            position: absolute;
            top: -20px;
            left: 0;
            background: var(--primary-color);
            color: white;
            padding: 2px 5px;
            font-size: 12px;
            border-radius: 3px;
        }

        .editor-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            height: 100vh;
            background: #1A1C22;
        }

        .sidebar {
            background: #252830;
            color: #fff;
            padding: 1rem;
            overflow-y: auto;
        }

        /*.preview-wrapper {*/
        /*    position: relative;*/
        /*    background: #fff;*/
        /*}*/

        .element-picker {
            cursor: crosshair;
            position: absolute;
            z-index: 1000;
            background: rgba(79, 70, 229, 0.1);
            border: 2px solid var(--primary-color);
        }

        .dynamic-form-group {
            margin-bottom: 1rem;
        }

    /*    */
    /*    .editor-container {*/
    /*        display: grid;*/
    /*        grid-template-columns: var(--sidebar-width) 1fr;*/
    /*        height: 100vh;*/
    /*    }*/

        .preview-wrapper {
            position: relative;
            background: #f8f9fa;
            padding: 1rem;
            overflow-y: auto;
        }
        /*.draggable-element {*/
        /*    padding: 10px;*/
        /*    background: #4F46E5;*/
        /*    color: white;*/
        /*    border-radius: 5px;*/
        /*    margin-bottom: 10px;*/
        /*    cursor: grab;*/
        /*}*/
        .dropzone {
            border: 2px dashed #4F46E5;
            padding: 20px;
            min-height: 200px;
            background: white;
        }
        .editable {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px 0;
            position: relative;
        }
        .editable:hover {
            outline: 2px solid #4F46E5;
        }
        .remove-btn {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            cursor: pointer;
        }


    /*    */
        .draggable-elements {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .draggable-element {
            padding: 0.75rem;
            background: #4F46E5;
            color: white;
            border-radius: 0.5rem;
            cursor: grab;
            transition: background 0.2s;
            display: flex;
            align-items: center;
        }

        .draggable-element:hover {
            background: #4338CA;
        }

        .draggable-element:active {
            cursor: grabbing;
        }
    </style>
</head>
<body>
<div class="editor-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex align-items-center mb-4">
            <img src="logo.svg" alt="Logo" style="height: 32px;" class="me-2">
            <h4 class="m-0">Éditeur Universel</h4>
        </div>

        <div id="dynamicSettings">
            <p class="fst-italic">Sélectionnez un élément dans la prévisualisation pour éditer ses propriétés.</p>
        </div>

{{--        --}}
        <h4 class="mt-4">Éléments à glisser</h4>
        <div class="draggable-elements">
            <div class="draggable-element" draggable="true" data-type="text">
                <i class="bi bi-text-paragraph me-2"></i>Texte
            </div>
            <div class="draggable-element" draggable="true" data-type="image">
                <i class="bi bi-image me-2"></i>Image
            </div>
            <div class="draggable-element" draggable="true" data-type="section">
                <i class="bi bi-layout-wtf me-2"></i>Section
            </div>
        </div>>

        <div class="mt-4 border-top pt-3">
            <button class="btn btn-success w-100 mb-2" id="saveDraft">
                <i class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder le brouillon
            </button>
            <button class="btn btn-outline-light w-100" id="downloadBtn">
                <i class="bi bi-download me-2"></i>Télécharger le template
            </button>
        </div>
    </div>

    <!-- Preview -->
    <div class="preview-wrapper">
        <iframe src="{{ $templateUrl }}"
                class="w-100 h-100 border-0"
                id="templatePreview"></iframe>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const state = {
        originalContent: null,
        modifications: new Map(),
        selectedElement: null
    };

   /* document.addEventListener('DOMContentLoaded', async () => {
        // Charger le contenu original
        const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");
        state.originalContent = await response.text();

        // Activer le mode sélection
        enableElementPicker();
    });*/

    document.addEventListener('DOMContentLoaded', async () => {
        // Charger le contenu original
        const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");
        state.originalContent = await response.text();

        // Activer le mode sélection et le drag and drop
        // const iframe = document.getElementById('templatePreview');
        // iframe.addEventListener('load', () => {
            enableElementPicker();
            setupDragAndDrop();
        // });
    });
    // Initialisation après chargement du DOM principal
    {{--document.addEventListener('DOMContentLoaded', async () => {--}}
    {{--    // Charger le contenu original (pour sauvegarde ou comparaison ultérieure)--}}
    {{--    const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");--}}
    {{--    state.originalContent = await response.text();--}}

    {{--    // Attendre le chargement complet de l'iframe--}}
    {{--    // const iframe = document.getElementById('templatePreview');--}}
    {{--    // iframe.addEventListener('load', () => {--}}
    {{--        // Activer le mode sélection dans l'iframe--}}
    {{--        enableElementPicker();--}}
    {{--    // });--}}
    {{--});--}}

    // Fonction d'activation du mode sélection dans l'iframe via délégation d'événements
    function enableElementPicker() {
        const iframe = document.getElementById('templatePreview');
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

        // Utilisation de la délégation : on écoute le clic sur le body de l'iframe
        iframeDoc.body.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const element = e.target;
            // Si un élément est déjà sélectionné, on retire le surlignage
            if (state.selectedElement) {
                state.selectedElement.classList.remove('element-highlight');
            }
            // Marquer le nouvel élément sélectionné
            state.selectedElement = element;
            element.classList.add('element-highlight');
            // Mettre à jour la sidebar avec les paramètres de cet élément
            showElementSettings(element);
        });
    }


    // Génération dynamique de la sidebar avec les paramètres modifiables
    function showElementSettings(element) {
        const settingsPanel = document.getElementById('dynamicSettings');
        // Vous pouvez personnaliser l'affichage de type d'élément ici (extraction du nom de la balise)
        element.dataset.elementType = element.tagName;

        const commonProperties = {
            'textContent': 'Texte',
            'color': 'Couleur du texte',
            'backgroundColor': 'Couleur de fond',
            'fontSize': 'Taille de police',
            'src': 'Source image',
            'href': 'Lien'
        };

        const formGroups = Object.entries(commonProperties).map(([prop, label]) => {
            // Pour les propriétés CSS, récupérer la valeur calculée si disponible
            let value = '';
            if (prop === 'textContent' || prop === 'href') {
                value = element[prop] || '';
            } else if (prop === 'src') {
                value = element.getAttribute('src') || '';
            } else {
                // Pour les styles, utiliser getComputedStyle
                value = window.getComputedStyle(element)[prop] || '';
            }
            return `
          <div class="dynamic-form-group">
            <label class="form-label">${label}</label>
            ${getInputForProperty(prop, value)}
          </div>
        `;
        });
        settingsPanel.innerHTML = formGroups.join('');
        attachEventListeners(element);
    }

    // Renvoie le champ de saisie adapté à la propriété
    function getInputForProperty(prop, value) {
        switch(prop) {
            case 'color':
            case 'backgroundColor':
                return `<input type="color" class="form-control form-control-color"
                    data-property="${prop}" value="${value || '#000000'}">`;
            case 'fontSize':
                // Extraire la valeur numérique (en px) si présent
                let size = parseInt(value) || 16;
                return `<input type="range" class="form-range" min="8" max="72"
                    data-property="${prop}" value="${size}">`;
            default:
                return `<input type="text" class="form-control"
                    data-property="${prop}" value="${value || ''}">`;
        }
    }

    // Attache des écouteurs sur les inputs de la sidebar afin de modifier l'élément sélectionné
    function attachEventListeners(element) {
        document.querySelectorAll('[data-property]').forEach(input => {
            input.addEventListener('input', () => {
                const prop = input.dataset.property;
                let value = input.value;
                // Gestion particulière pour les fichiers (images)
                if (input.type === 'file' && input.files.length > 0) {
                    const file = input.files[0];
                    value = `url(${URL.createObjectURL(file)})`;
                }
                // Appliquer la modification selon la propriété :
                if (prop === 'textContent') {
                    element.textContent = value;
                } else if (prop === 'src') {
                    element.setAttribute('src', value);
                } else if (prop === 'href') {
                    element.setAttribute('href', value);
                } else if (prop === 'fontSize') {
                    element.style[prop] = value + 'px';
                } else {
                    element.style[prop] = value;
                }
                // Sauvegarder la modification dans l'état (pour un usage ultérieur si besoin)
                state.modifications.set(element, {
                    ...(state.modifications.get(element) || {}), [prop]: value
                });
            });
        });
    }

    // Fonction pour récupérer le contenu HTML modifié depuis l'iframe
    async function getModifiedContent() {
        const iframe = document.getElementById('templatePreview');
        const serializer = new XMLSerializer();
        return serializer.serializeToString(iframe.contentDocument);
    }

    // Bouton de téléchargement du template modifié
    document.getElementById('downloadBtn').addEventListener('click', async () => {
        const modifiedContent = await getModifiedContent();
        const blob = new Blob([modifiedContent], { type: 'text/html' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `template-modifie-${Date.now()}.html`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });

    // Sauvegarde temporaire (brouillon) via requête POST vers le serveur
    document.getElementById('saveDraft').addEventListener('click', async () => {
        const modifiedContent = await getModifiedContent();
        await fetch("{{ route('templateso.saveDraft') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                content: modifiedContent,
                templateId: "{{ $templateId }}"
            })
        });
        alert('Brouillon sauvegardé !');
    });

   /* // Drag & Drop
    const dropzone = document.getElementById('dropzone');

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.background = '#e0e7ff';
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.style.background = 'white';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.style.background = 'white';

        const elementType = e.dataTransfer.getData('text/plain');
        let newElement;

        switch (elementType) {
            case 'text':
                newElement = createEditableElement('Paragraphe de texte');
                break;
            case 'image':
                newElement = createEditableElement('<img src="https://via.placeholder.com/150" alt="Image">');
                break;
            case 'section':
                newElement = createEditableElement('<div style="height: 100px; background: #ccc;">Nouvelle section</div>');
                break;
        }

        if (newElement) {
            dropzone.appendChild(newElement);
        }
    });

    document.querySelectorAll('.draggable-element').forEach(el => {
        el.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', el.dataset.type);
        });
    });

    function createEditableElement(content) {
        const element = document.createElement('div');
        element.classList.add('editable');
        element.innerHTML = content + '<button class="remove-btn">x</button>';

        // Bouton pour supprimer l'élément
        element.querySelector('.remove-btn').addEventListener('click', () => {
            element.remove();
        });

        return element;
    }*/

//
//

    // Gestion du drag and drop
    function setupDragAndDrop() {
        const iframe = document.getElementById('templatePreview');
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

        // Écouter l'événement de dépôt (drop)
        iframeDoc.body.addEventListener('drop', (e) => {
            e.preventDefault();
            const type = e.dataTransfer.getData('type');
            const { clientX, clientY } = e;

            // Créer un nouvel élément en fonction du type
            const newElement = createElementByType(type);
            if (newElement) {
                // Positionner l'élément à l'endroit où il a été déposé
                newElement.style.position = 'absolute';
                newElement.style.left = `${clientX}px`;
                newElement.style.top = `${clientY}px`;

                // Ajouter l'élément à la prévisualisation
                iframeDoc.body.appendChild(newElement);

                // Activer l'édition pour le nouvel élément
                enableElementPicker();
            }
        });

        // Écouter l'événement de survol (dragover)
        iframeDoc.body.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        // Activer le drag pour les éléments de la sidebar
        document.querySelectorAll('.draggable-element').forEach(el => {
            el.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('type', el.dataset.type);
            });
        });
    }

    // Créer un nouvel élément en fonction du type
    function createElementByType(type) {
        switch (type) {
            case 'text':
                return createTextElement();
            case 'image':
                return createImageElement();
            case 'section':
                return createSectionElement();
            default:
                return null;
        }
    }

    // Créer un élément de texte
    function createTextElement() {
        const element = document.createElement('div');
        element.contentEditable = true;
        element.textContent = 'Nouveau texte';
        element.style.padding = '10px';
        element.style.border = '1px dashed #4F46E5';
        element.style.backgroundColor = '#F3F4F6';


        // Ajouter un bouton de suppression
        const removeButton = document.createElement('button');
        removeButton.textContent = '×';
        removeButton.style.position = 'absolute';
        removeButton.style.top = '-10px';
        removeButton.style.right = '-10px';
        removeButton.style.background = 'red';
        removeButton.style.color = 'white';
        removeButton.style.border = 'none';
        removeButton.style.borderRadius = '50%';
        removeButton.style.cursor = 'pointer';
        removeButton.addEventListener('click', () => element.remove());

        element.appendChild(removeButton);
        return element;
    }

    // Créer un élément d'image
    function createImageElement() {
        const element = document.createElement('img');
        element.src = 'https://via.placeholder.com/150';
        element.alt = 'Nouvelle image';
        element.style.maxWidth = '100%';
        element.style.height = 'auto';
        return element;
    }

    // Créer un élément de section
    function createSectionElement() {
        const element = document.createElement('div');
        element.style.padding = '20px';
        element.style.backgroundColor = '#E0E7FF';
        element.style.border = '1px solid #4F46E5';
        element.textContent = 'Nouvelle section';
        return element;
    }
</script>
</body>
</html>

{{--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditeur Universel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-width: 360px;
            --primary-color: #4F46E5;
        }

        .element-highlight {
            outline: 2px solid #4F46E5 !important;
            position: relative;
            transition: outline 0.2s;
        }

        .element-highlight::after {
            content: attr(data-element-type);
            position: absolute;
            top: -20px;
            left: 0;
            background: #4F46E5;
            color: white;
            padding: 2px 5px;
            font-size: 12px;
            border-radius: 3px;
        }
        .editor-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            height: 100vh;
            background: #1A1C22;
        }

        .sidebar {
            background: #252830;
            color: #fff;
            padding: 1rem;
            overflow-y: auto;
        }

        .preview-wrapper {
            position: relative;
            background: #fff;
        }

        .element-picker {
            cursor: crosshair;
            position: absolute;
            z-index: 1000;
            background: rgba(79, 70, 229, 0.1);
            border: 2px solid #4F46E5;
        }

        .dynamic-form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="editor-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex align-items-center mb-4">
            <img src="logo.svg" alt="Logo" style="height: 32px;" class="me-2">
            <h4 class="m-0">Éditeur Universel</h4>
        </div>

        <div id="dynamicSettings"></div>

        <div class="mt-4 border-top pt-3">
            <button class="btn btn-success w-100 mb-2" id="saveDraft">
                <i class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder le brouillon
            </button>
            <button class="btn btn-outline-light w-100" id="downloadBtn">
                <i class="bi bi-download me-2"></i>Télécharger le template
            </button>
        </div>
    </div>

    <!-- Preview -->
    <div class="preview-wrapper">
        <iframe src="{{ $templateUrl }}"
                class="w-100 h-100 border-0"
                id="templatePreview"></iframe>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const state = {
        originalContent: null,
        modifications: new Map(),
        selectedElement: null
    };


    // Initialisation
    document.addEventListener('DOMContentLoaded', async () => {
        // Charger le contenu original
        const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");
        state.originalContent = await response.text();

        // Activer le mode sélection
        enableElementPicker();
    });

    // Système de sélection d'éléments
    function enableElementPicker() {
        const iframe = document.getElementById('templatePreview');
        const iframeDoc = iframe.contentDocument;

        iframeDoc.body.querySelectorAll('*').forEach(element => {
            element.style.cursor = 'pointer';
            element.addEventListener('click', (e) => {
                e.stopPropagation();
                state.selectedElement = element;
                showElementSettings(element);
            });
        });
    }

    // Génération dynamique des paramètres
    function showElementSettings(element) {
        const settingsPanel = document.getElementById('dynamicSettings');
        settingsPanel.innerHTML = '';

        const commonProperties = {
            'textContent': 'Texte',
            'color': 'Couleur du texte',
            'backgroundColor': 'Couleur de fond',
            'fontSize': 'Taille de police',
            'src': 'Source image',
            'href': 'Lien'
        };

        const formGroups = Object.entries(commonProperties).map(([prop, label]) => {
            return `
            <div class="dynamic-form-group">
                <label class="form-label">${label}</label>
                ${getInputForProperty(prop, element[prop])}
            </div>
        `;
        });

        settingsPanel.innerHTML = formGroups.join('');
        attachEventListeners(element);
    }

    function getInputForProperty(prop, value) {
        switch(prop) {
            case 'color':
            case 'backgroundColor':
                return `<input type="color" class="form-control form-control-color"
                      data-property="${prop}" value="${value || '#000000'}">`;
            case 'fontSize':
                return `<input type="range" class="form-range" min="8" max="72"
                      data-property="${prop}" value="${parseInt(value) || 16}">`;
            default:
                return `<input type="text" class="form-control"
                      data-property="${prop}" value="${value || ''}">`;
        }
    }

    function attachEventListeners(element) {
        document.querySelectorAll('[data-property]').forEach(input => {
            input.addEventListener('input', () => {
                const prop = input.dataset.property;
                const value = input.value;

                // Appliquer la modification
                element.style[prop] = value;

                // Sauvegarder dans l'état
                state.modifications.set(element, {
                    ...(state.modifications.get(element) || {}),
                    [prop]: value
                });
            });
        });
    }

    // Gestion des fichiers
    document.getElementById('downloadBtn').addEventListener('click', async () => {
        const modifiedContent = await getModifiedContent();

        const blob = new Blob([modifiedContent], { type: 'text/html' });
        const url = URL.createObjectURL(blob);

        const a = document.createElement('a');
        a.href = url;
        a.download = `template-modifie-${Date.now()}.html`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });

    async function getModifiedContent() {
        const iframe = document.getElementById('templatePreview');
        const serializer = new XMLSerializer();
        return serializer.serializeToString(iframe.contentDocument);
    }

    // Sauvegarde temporaire
    document.getElementById('saveDraft').addEventListener('click', async () => {
        const modifiedContent = await getModifiedContent();

        await fetch("{{ route('templateso.saveDraft') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                content: modifiedContent,
                templateId: "{{ $templateId }}"
            })
        });

        alert('Brouillon sauvegardé !');
    });
</script>
</body>
</html>--}}
