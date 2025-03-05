<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <script src="{{ asset('js/templateso/edit.js') }}"></script>--}}
    @vite('resources/js/templateso/edit.js')

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
        .preview-wrapper {
            position: relative;
            background: #f8f9fa;
            padding: 1rem;
            overflow-y: auto;
        }
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
        /* Interface IA */
        .ai-assistant {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 10000;
        }
        .ai-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #4F46E5;
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .ai-button:hover {
            transform: scale(1.1);
        }
        .ai-chat {
            position: absolute;
            bottom: 70px;
            right: 0;
            width: 400px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            display: none;
        }
        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 15px;
        }
        .chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #eee;
        }
        .message {
            margin: 8px 0;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
        }
        .user-message {
            background: #4F46E5;
            color: white;
            margin-left: auto;
        }
        .ai-message {
            background: #f3f4f6;
            margin-right: auto;
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
        </div>
        <div class="mt-5 border-top pt-3">
            <button class="btn btn-success w-100 mb-2" id="saveDraft">
                <i class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder le brouillon
            </button>
            <button class="btn btn-outline-light mb-3" id="downloadBtn">
                <i class="bi bi-download me-2"></i>Télécharger le template
            </button>
            <button class="btn btn-info w-100 mb-2" id="deployBtn">
                <i class="bi bi-rocket-takeoff me-2"></i>Héberger le site
            </button>
        </div>
    </div>
    <!-- Preview -->
    <div class="preview-wrapper">
        <iframe src="{{ $templateUrl }}"
                class="w-100 h-100 border-0"
                id="templatePreview"></iframe>
    </div>
    <!-- Interface IA -->
    <div class="ai-assistant">
        <button class="ai-button" id="aiButton">
            <i class="bi bi-robot"></i>
        </button>
        <div class="ai-chat" id="aiChat">
            <div class="chat-messages" id="chatMessages"></div>
            <div class="chat-input">
                <input type="text" id="aiInput" class="form-control" placeholder="Décrivez vos modifications...">
                <button class="btn btn-primary ms-2" id="sendButton">
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{--<script>
    // ATTENTION : Exposer votre clé API dans le code client n'est PAS sécurisé.
    // Ce code est fourni à titre d'exemple. Il est recommandé d'effectuer les appels API depuis un backend.
    const state = {
        originalContent: null,
        modifications: new Map(),
        selectedElement: null
    };

    // Configuration OpenAI (ChatGPT API)
    const OPENAI_ENDPOINT = 'https://models.inference.ai.azure.com/chat/completions';

    // État de l'IA
    const aiState = {
        isProcessing: false,
        chatHistory: []
    };

    document.addEventListener('DOMContentLoaded', async () => {
        const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");
        state.originalContent = await response.text();
        enableElementPicker();
        setupDragAndDrop();
    });

    function enableElementPicker() {
        const iframe = document.getElementById('templatePreview');
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        iframeDoc.body.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const element = e.target;
            if (state.selectedElement) {
                state.selectedElement.classList.remove('element-highlight');
            }
            state.selectedElement = element;
            element.classList.add('element-highlight');
            showElementSettings(element);
        });
    }

    function showElementSettings(element) {
        const settingsPanel = document.getElementById('dynamicSettings');
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
            let value = '';
            if (prop === 'textContent' || prop === 'href') {
                value = element[prop] || '';
            } else if (prop === 'src') {
                value = element.getAttribute('src') || '';
            } else {
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

    function getInputForProperty(prop, value) {
        switch(prop) {
            case 'color':
            case 'backgroundColor':
                return `<input type="color" class="form-control form-control-color" data-property="${prop}" value="${value || '#000000'}">`;
            case 'fontSize':
                let size = parseInt(value) || 16;
                return `<input type="range" class="form-range" min="8" max="72" data-property="${prop}" value="${size}">`;
            default:
                return `<input type="text" class="form-control" data-property="${prop}" value="${value || ''}">`;
        }
    }

    function attachEventListeners(element) {
        document.querySelectorAll('[data-property]').forEach(input => {
            input.addEventListener('input', () => {
                const prop = input.dataset.property;
                let value = input.value;
                if (input.type === 'file' && input.files.length > 0) {
                    const file = input.files[0];
                    value = `url(${URL.createObjectURL(file)})`;
                }
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
                state.modifications.set(element, { ...(state.modifications.get(element) || {}), [prop]: value });
            });
        });
    }

    async function getModifiedContent() {
        const iframe = document.getElementById('templatePreview');
        const serializer = new XMLSerializer();
        return serializer.serializeToString(iframe.contentDocument);
    }

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

    document.getElementById('saveDraft').addEventListener('click', async () => {
        const modifiedContent = await getModifiedContent();
        await fetch("{{ route('templateso.saveDraft') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({ content: modifiedContent, templateId: "{{ $templateId }}" })
        });
        alert('Brouillon sauvegardé !');
    });

    function setupDragAndDrop() {
        const iframe = document.getElementById('templatePreview');
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        iframeDoc.body.addEventListener('drop', (e) => {
            e.preventDefault();
            const type = e.dataTransfer.getData('type');
            const { clientX, clientY } = e;
            const newElement = createElementByType(type);
            if (newElement) {
                newElement.style.position = 'absolute';
                newElement.style.left = `${clientX}px`;
                newElement.style.top = `${clientY}px`;
                iframeDoc.body.appendChild(newElement);
                enableElementPicker();
            }
        });
        iframeDoc.body.addEventListener('dragover', (e) => {
            e.preventDefault();
        });
        document.querySelectorAll('.draggable-element').forEach(el => {
            el.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('type', el.dataset.type);
            });
        });
    }

    function createElementByType(type) {
        switch (type) {
            case 'text': return createTextElement();
            case 'image': return createImageElement();
            case 'section': return createSectionElement();
            default: return null;
        }
    }

    function createTextElement() {
        const element = document.createElement('div');
        element.contentEditable = true;
        element.textContent = 'Nouveau texte';
        element.style.padding = '10px';
        element.style.border = '1px dashed #4F46E5';
        element.style.backgroundColor = '#F3F4F6';
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

    function createImageElement() {
        const element = document.createElement('img');
        element.src = 'https://via.placeholder.com/150';
        element.alt = 'Nouvelle image';
        element.style.maxWidth = '100%';
        element.style.height = 'auto';
        return element;
    }

    function createSectionElement() {
        const element = document.createElement('div');
        element.style.padding = '20px';
        element.style.backgroundColor = '#E0E7FF';
        element.style.border = '1px solid #4F46E5';
        element.textContent = 'Nouvelle section';
        return element;
    }

    // Interface IA : Toggle et auto-description du template avec ChatGPT
    document.getElementById('aiButton').addEventListener('click', () => {
        const aiChatEl = document.getElementById('aiChat');
        if (aiChatEl.style.display === 'block') {
            aiChatEl.style.display = 'none';
        } else {
            aiChatEl.style.display = 'block';
            if (document.getElementById('chatMessages').childElementCount === 0) {
                autoDescribeTemplate();
            }
        }
    });

    // document.getElementById('sendButton').addEventListener('click', async () => {
    //     if (aiState.isProcessing) return;
    //     const input = document.getElementById('aiInput');
    //     const message = input.value.trim();
    //     if (!message) return;
    //     aiState.isProcessing = true;
    //     input.disabled = true;
    //     try {
    //         addMessage(message, 'user');
    //         const currentHtml = await getModifiedContent();
    //         const response = await fetch(OPENAI_ENDPOINT, {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'Authorization': `Bearer ${OPENAI_API_KEY}`
    //             },
    //             body: JSON.stringify({
    //                 model: "gpt-3.5-turbo",
    //                 messages: [
    //                     { role: "system", content: "Vous êtes un assistant expert en édition de templates HTML." },
    //                     { role: "user", content: `Modifie ce template HTML selon ces instructions: ${message}\n\nHTML Actuel:\n${currentHtml}` }
    //                 ]
    //             })
    //         });
    //         if (!response.ok) {
    //             throw new Error(`Erreur HTTP ${response.status}`);
    //         }
    //         const data = await response.json();
    //         const aiResponse = data.choices[0].message.content;
    //         addMessage(aiResponse, 'ai');
    //         applyAiModifications(aiResponse);
    //     } catch (error) {
    //         console.error('Erreur API:', error);
    //         addMessage("Désolé, une erreur s'est produite.", 'ai');
    //     } finally {
    //         aiState.isProcessing = false;
    //         input.disabled = false;
    //         input.value = '';
    //     }
    // });

    document.getElementById('sendButton').addEventListener('click', async () => {
        if (aiState.isProcessing) return;
        const input = document.getElementById('aiInput');
        const message = input.value.trim();
        if (!message) return;
        aiState.isProcessing = true;
        input.disabled = true;
        try {
            addMessage(message, 'user');
            const currentHtml = await getModifiedContent();

            // Préparez les messages pour le modèle (incluant éventuellement un message "system")
            const messages = [
                { role: "system", content: "Vous êtes un assistant expert en édition de templates HTML et css." },
                { role: "user", content: `Modifie ce template HTML selon ces instructions: ${message}\n\nHTML Actuel:\n${currentHtml}` }
            ];

            // Appeler notre endpoint backend sécurisé
            const response = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ messages })
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status}`);
            }

            const data = await response.json();
            const aiResponse = data.choices[0].message.content;
            addMessage(aiResponse, 'ai');
            applyAiModifications(aiResponse);
        } catch (error) {
            console.error('Erreur API:', error);
            addMessage("Désolé, une erreur s'est produite.", 'ai');
        } finally {
            aiState.isProcessing = false;
            input.disabled = false;
            input.value = '';
        }
    });


    function addMessage(content, sender) {
        const messagesDiv = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;
        messageDiv.textContent = content;
        messagesDiv.appendChild(messageDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    async function autoDescribeTemplate() {
        const currentHtml = await getModifiedContent();
        const prompt = `Donne-moi quelques caractéristiques et une description du template HTML actuel. HTML Actuel:\n${currentHtml}`;
        aiState.isProcessing = true;
        try {
            addMessage("Chargement de la description...", 'ai');
            const response = await fetch(OPENAI_ENDPOINT, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${OPENAI_API_KEY}`
                },
                body: JSON.stringify({
                    model: "gpt-3.5-turbo",
                    messages: [
                        { role: "system", content: "Vous êtes un assistant expert en édition de templates HTML." },
                        { role: "user", content: prompt }
                    ]
                })
            });
            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status}`);
            }
            const data = await response.json();
            const aiResponse = data.choices[0].message.content;
            addMessage(aiResponse, 'ai');
        } catch (error) {
            console.error('Erreur dans la description automatique:', error);
            addMessage("Erreur lors de la description du template.", 'ai');
        } finally {
            aiState.isProcessing = false;
        }
    }

    async function applyAiModifications(aiResponse) {
        try {
            const modifiedHtml = extractHtmlFromResponse(aiResponse);
            const iframe = document.getElementById('templatePreview');
            const iframeDoc = iframe.contentDocument;
            iframeDoc.open();
            iframeDoc.write(modifiedHtml);
            iframeDoc.close();
            enableElementPicker();
            setupDragAndDrop();
        } catch (error) {
            console.error('Erreur application modifications:', error);
            addMessage("Impossible d'appliquer les modifications.", 'ai');
        }
    }

    function extractHtmlFromResponse(response) {
        const htmlMatch = response.match(/```html\n([\s\S]*?)\n```/);
        return htmlMatch ? htmlMatch[1] : response;
    }
</script>--}}
</body>
</html>


