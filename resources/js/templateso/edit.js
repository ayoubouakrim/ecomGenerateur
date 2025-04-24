/******************************
 * INITIALISATION ET VARIABLES
 ******************************/

// Sélection des éléments DOM
const sidebar = document.querySelector('.editor-sidebar'); // Correction: querySelector au lieu de getElementById
const toggleBtn = document.getElementById('sidebarToggle');
const editorContainer = document.querySelector('.editor-container');

// États globaux
const state = {
    originalContent: null,
    modifications: new Map(),
    selectedElement: null
};

const aiState = {
    isProcessing: false,
    chatHistory: []
};

// Variables de configuration
const saveDraftUrl = window.saveDraftUrl;
const csrfToken = window.csrfToken;
const templateId = window.templateId;

/******************************
 * GESTION DE LA SIDEBAR
 ******************************/

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    editorContainer.classList.toggle('collapsed');

    // Mise à jour de l'icône
    const icon = toggleBtn.querySelector('i');
    if (sidebar.classList.contains('collapsed')) {
        icon.classList.remove('mdi-chevron-double-left');
        icon.classList.add('mdi-chevron-double-right');
    } else {
        icon.classList.remove('mdi-chevron-double-right');
        icon.classList.add('mdi-chevron-double-left');
    }
});

/******************************
 * INITIALISATION DE L'ÉDITEUR
 ******************************/

document.addEventListener('DOMContentLoaded', async () => {
    const response = await fetch("{{ route('templateso.original', ['id' => $templateId]) }}");
    state.originalContent = await response.text();
    enableElementPicker();
    setupDragAndDrop();
});

/******************************
 * FONCTIONS DE L'ÉDITEUR
 ******************************/

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
    switch (prop) {
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

            state.modifications.set(element, {...(state.modifications.get(element) || {}), [prop]: value});
        });
    });
}

/******************************
 * FONCTIONS DE SAUVEGARDE
 ******************************/

async function getModifiedContent() {
    const iframe = document.getElementById('templatePreview');
    const serializer = new XMLSerializer();
    return serializer.serializeToString(iframe.contentDocument);
}

document.getElementById('downloadBtn').addEventListener('click', async () => {
    const modifiedContent = await getModifiedContent();
    const blob = new Blob([modifiedContent], {type: 'text/html'});
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
    console.log('Envoi avec ID:', templateId, 'Type:', typeof templateId);

    await fetch(saveDraftUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            content: modifiedContent
        })
    });

    alert('Brouillon sauvegardé !');
});

/******************************
 * DRAG AND DROP
 ******************************/

function setupDragAndDrop() {
    const iframe = document.getElementById('templatePreview');
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

    iframeDoc.body.addEventListener('drop', (e) => {
        e.preventDefault();
        const type = e.dataTransfer.getData('type');
        const {clientX, clientY} = e;
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

/******************************
 * FONCTIONNALITÉS IA
 ******************************/

/*// ==================== NOUVELLE VERSION AMÉLIORÉE ====================
document.getElementById('sendButton').addEventListener('click', async () => {
    if (aiState.isProcessing) return;

    const input = document.getElementById('aiInput');
    const message = input.value.trim();
    if (!message) return;

    // Sauvegarde du message pour le réafficher si erreur
    const originalMessage = message;
    input.value = ''; // On vide immédiatement le champ

    // Activation de l'état de chargement
    aiState.isProcessing = true;
    toggleLoadingState(true);

    try {
        // Ajout du message utilisateur avec animation
        addMessage(originalMessage, 'user');

        // Préparation de la requête avec timeout minimum
        const [currentHtml, startTime] = await Promise.all([
            getModifiedContent(),
            new Promise(resolve => resolve(Date.now()))
        ]);

        const messages = [
            {
                role: "system",
                content: "Vous êtes un assistant expert en création de sites web. " +
                    "Répondez de manière concise et technique. " +
                    "Proposez toujours des solutions optimisées pour le SEO et les performances."
            },
            {
                role: "user",
                content: `Demande: ${originalMessage}\n\nHTML Actuel:\n${currentHtml}`
            }
        ];

        // Envoi avec gestion du timeout minimum
        const minWaitTime = 1000;
        const response = await Promise.all([
            fetch('/chat', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({messages})
            }),
            new Promise(resolve => setTimeout(resolve, minWaitTime))
        ]).then(([response]) => response);

        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }

        const data = await response.json();

        // Traitement de la réponse
        if (data.choices && data.choices[0].message) {
            const aiResponse = data.choices[0].message.content;

            // Délai supplémentaire pour l'animation de typing
            await new Promise(resolve => setTimeout(resolve, 500));

            // Affichage progressif de la réponse
            displayTypingResponse(aiResponse);
        } else {
            throw new Error('Réponse AI invalide');
        }

    } catch (error) {
        console.error('Erreur:', error);
        input.value = originalMessage; // Restaure le message en cas d'erreur

        addMessage(
            "Désolé, je rencontre des difficultés techniques. " +
            "Veuillez reformuler votre demande ou réessayer plus tard.",
            'ai',
            'error'
        );
    } finally {
        // Désactivation de l'état de chargement
        aiState.isProcessing = false;
        toggleLoadingState(false);
        input.focus();
    }
});

// Fonctions utilitaires améliorées
function toggleLoadingState(show) {
    const input = document.getElementById('aiInput');
    const sendButton = document.getElementById('sendButton');
    const loadingIndicator = document.getElementById('aiThinking');

    if (show) {
        input.disabled = true;
        sendButton.disabled = true;
        sendButton.innerHTML = '<i class="mdi mdi-loading mdi-spin"></i>';
        loadingIndicator.style.display = 'flex';
    } else {
        input.disabled = false;
        sendButton.disabled = false;
        sendButton.innerHTML = '<i class="mdi mdi-send"></i>';
        loadingIndicator.style.display = 'none';
    }
}

function displayTypingResponse(text) {
    const messagesDiv = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'message ai-message typing';

    messagesDiv.appendChild(messageDiv);
    messageDiv.scrollIntoView({ behavior: 'smooth' });

    // Affichage progressif caractère par caractère
    let i = 0;
    const typingInterval = setInterval(() => {
        if (i < text.length) {
            messageDiv.textContent = text.substring(0, i + 1);
            i++;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        } else {
            clearInterval(typingInterval);
            messageDiv.classList.remove('typing');
        }
    }, 20);
}

function addMessage(content, sender, type = 'normal') {
    const messagesDiv = document.getElementById('chatMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender}-message ${type}-message`;

    // Formatage des retours à la ligne
    const formattedContent = content.replace(/\n/g, '<br>');
    messageDiv.innerHTML = formattedContent;

    messagesDiv.appendChild(messageDiv);
    messageDiv.scrollIntoView({
        behavior: 'smooth',
        block: 'end'
    });

    // Animation sonore discrète (optionnelle)
    if (sender === 'ai') {
        playSound('notification');
    }
}

// Fonction optionnelle pour les effets sonores
function playSound(type) {
    if (window.soundsEnabled) {
        const audio = new Audio(`/sounds/${type}.mp3`);
        audio.volume = 0.3;
        audio.play().catch(e => console.log('Son désactivé'));
    }
}*/
// ==================== FIN DE LA NOUVELLE VERSION ====================




// Gestion du chat IA
document.getElementById('aiButton').addEventListener('click', () => {
    const aiChatEl = document.getElementById('aiChat');
    aiChatEl.classList.toggle('active');
});

document.getElementById('aiInput').addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && !aiState.isProcessing) {
        document.getElementById('sendButton').click();
    }
});

document.getElementById('sendButton').addEventListener('click', async () => {
    if (aiState.isProcessing) return;

    const input = document.getElementById('aiInput');
    const message = input.value.trim();
    if (!message) return;

    aiState.isProcessing = true;
    input.disabled = true;
    document.getElementById('sendButton').disabled = true;
    document.getElementById('aiThinking').style.display = 'block';

    try {
        addMessage(message, 'user');
        const currentHtml = await getModifiedContent();

        const minWaitTime = 1500;
        const startTime = Date.now();

        const messages = [
            {role: "system", content: "Vous êtes un assistant expert en édition de templates HTML et CSS."},
            {role: "user", content: `Modifie ce template HTML selon ces instructions: ${message}\n\nHTML Actuel:\n${currentHtml}`}
        ];

        const response = await fetch('/chat', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({messages})
        });

        const elapsed = Date.now() - startTime;
        if (elapsed < minWaitTime) {
            await new Promise(resolve => setTimeout(resolve, minWaitTime - elapsed));
        }

        const data = await response.json();
        applyAiModifications(data.choices[0].message.content);

    } catch (error) {
        console.error('Erreur API:', error);
        addMessage("Désolé, une erreur s'est produite. Veuillez réessayer.", 'ai');
    } finally {
        aiState.isProcessing = false;
        input.disabled = false;
        document.getElementById('sendButton').disabled = false;
        document.getElementById('aiThinking').style.display = 'none';
        input.focus();
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
    const prompt = `Donne-moi une description concise du template HTML actuel sous forme de trois points, sans explications supplémentaires. HTML Actuel:\n${currentHtml}`;

    aiState.isProcessing = true;
    try {
        addMessage("Chargement de la description...", 'ai');

        const messages = [
            {role: "system", content: "Vous êtes un assistant expert en édition de templates HTML et CSS."},
            {role: "user", content: prompt}
        ];

        const response = await fetch('/chat', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({messages})
        });

        if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);

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

function applyAiModifications(aiResponse) {
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
    const regex = /```html\s*([\s\S]*?)\s*```/;
    const match = response.match(regex);
    return match ? match[1].trim() : response.trim();
}

/******************************
 * FONCTIONS DE DÉPLOIEMENT
 ******************************/

function showDeployPopup(url) {
    const popup = document.getElementById('deployPopup');
    const deployLink = document.getElementById('deployLink');
    const copyLinkBtn = document.getElementById('copyLinkBtn');
    const closePopupBtn = document.getElementById('closePopupBtn');

    deployLink.href = url;
    deployLink.textContent = url;

    copyLinkBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(url).then(() => {
            alert('Lien copié dans le presse-papiers !');
        }).catch(() => {
            alert('Impossible de copier le lien.');
        });
    });

    closePopupBtn.addEventListener('click', () => {
        popup.classList.remove('active');
    });

    popup.classList.add('active');
}

function showDeploymentLoader() {
    const loader = document.getElementById('deploymentLoader');
    loader.classList.add('active');

    const progressBar = document.getElementById('deployProgress');
    let progress = 0;
    const interval = setInterval(() => {
        progress += 1;
        progressBar.style.width = `${progress}%`;

        if (progress === 20) {
            document.getElementById('serverSetup').textContent = "Serveur configuré ✓";
        }
        if (progress === 50) {
            document.getElementById('dbSetup').textContent = "Base de données prête ✓";
        }
        if (progress === 80) {
            document.getElementById('securitySetup').textContent = "Sécurité activée ✓";
        }

        if (progress >= 100) {
            clearInterval(interval);
        }
    }, 300);
}

function hideDeploymentLoader() {
    const loader = document.getElementById('deploymentLoader');
    loader.classList.remove('active');
}

document.getElementById('deployBtn').addEventListener('click', async () => {
    showDeploymentLoader();
    document.getElementById('deployBtn').disabled = true;

    try {
        const minWaitTime = 45000;

        setTimeout(async () => {
            try {
                const modifiedContent = await getModifiedContent();

                const response = await fetch('/deploy', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({content: modifiedContent})
                });

                if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);

                const data = await response.json();
                hideDeploymentLoader();
                showDeployPopup(data.siteUrl);

            } catch (error) {
                console.error('Erreur de déploiement :', error);
                hideDeploymentLoader();
                alert("Erreur lors du déploiement. Veuillez réessayer.");
            } finally {
                document.getElementById('deployBtn').disabled = false;
            }
        }, 500);

    } catch (error) {
        hideDeploymentLoader();
        document.getElementById('deployBtn').disabled = false;
        console.error('Erreur initiale :', error);
    }
});
