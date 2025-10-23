/******************************
 * INITIALISATION ET VARIABLES
 ******************************/

// Sélection des éléments DOM
const sidebar = document.querySelector('.editor-sidebar');
const toggleBtn = document.getElementById('sidebarToggle'); // This element doesn't exist!
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

// FIX: Only add event listener if the element exists
if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        editorContainer.classList.toggle('collapsed');

        const icon = toggleBtn.querySelector('i');
        if (sidebar.classList.contains('collapsed')) {
            icon.classList.remove('mdi-chevron-double-left');
            icon.classList.add('mdi-chevron-double-right');
        } else {
            icon.classList.remove('mdi-chevron-double-right');
            icon.classList.add('mdi-chevron-double-left');
        }
    });
}

/******************************
 * INITIALISATION DE L'ÉDITEUR
 ******************************/

document.addEventListener('DOMContentLoaded', async () => {
    console.log('=== Editor Initializing ===');
    
    // Initialize editor features
    try {
        const templatePreview = document.getElementById('templatePreview');
        if (templatePreview) {
            enableElementPicker();
            setupDragAndDrop();
            console.log('✅ Editor features initialized');
        }
    } catch (error) {
        console.error('Error initializing editor:', error);
    }
    
    // Initialize AI chat
    initializeAIChat();
    
    // Initialize deployment
    initializeDeployment();
    
    console.log('=== Editor Ready ===');
});

/******************************
 * FONCTIONS DE L'ÉDITEUR
 ******************************/

function enableElementPicker() {
    const iframe = document.getElementById('templatePreview');
    if (!iframe) return;
    
    iframe.addEventListener('load', function() {
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        if (!iframeDoc) return;

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
    });
}

function showElementSettings(element) {
    const settingsPanel = document.getElementById('dynamicSettings');
    if (!settingsPanel) return;
    
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

            state.modifications.set(element, { ...(state.modifications.get(element) || {}), [prop]: value });
        });
    });
}

/******************************
 * FONCTIONS DE SAUVEGARDE
 ******************************/

async function getModifiedContent() {
    const iframe = document.getElementById('templatePreview');
    if (!iframe) throw new Error('Preview iframe not found');
    
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    const serializer = new XMLSerializer();
    return '<!DOCTYPE html>\n' + serializer.serializeToString(iframeDoc.documentElement);
}

// Download button
const downloadBtn = document.getElementById('downloadBtn');
if (downloadBtn) {
    downloadBtn.addEventListener('click', async () => {
        try {
            const modifiedContent = await getModifiedContent();
            const blob = new Blob([modifiedContent], { type: 'text/html' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `template-modifie-${Date.now()}.html`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        } catch (error) {
            console.error('Download error:', error);
            alert('Erreur lors du téléchargement');
        }
    });
}

// Save draft button
const saveDraftBtn = document.getElementById('saveDraft');
if (saveDraftBtn) {
    saveDraftBtn.addEventListener('click', async () => {
        try {
            const modifiedContent = await getModifiedContent();
            
            await fetch(saveDraftUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ content: modifiedContent })
            });

            alert('Brouillon sauvegardé !');
        } catch (error) {
            console.error('Save error:', error);
            alert('Erreur lors de la sauvegarde');
        }
    });
}

/******************************
 * DRAG AND DROP
 ******************************/

function setupDragAndDrop() {
    const iframe = document.getElementById('templatePreview');
    if (!iframe) return;
    
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    if (!iframeDoc) return;

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
 * AI CHAT INITIALIZATION
 ******************************/

function initializeAIChat() {
    const aiButton = document.getElementById('aiButton');
    const aiChat = document.getElementById('aiChat');
    const closeAi = document.querySelector('.close-ai');
    const sendButton = document.getElementById('sendButton');
    const aiInput = document.getElementById('aiInput');

    if (aiButton && aiChat) {
        aiButton.addEventListener('click', () => {
            aiChat.classList.toggle('active');
        });
    }

    if (closeAi && aiChat) {
        closeAi.addEventListener('click', () => {
            aiChat.classList.remove('active');
        });
    }

    if (aiInput) {
        aiInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !aiState.isProcessing && sendButton) {
                sendButton.click();
            }
        });
    }

    if (sendButton) {
        sendButton.addEventListener('click', handleAIMessage);
    }
}

async function handleAIMessage() {
    if (aiState.isProcessing) return;

    const input = document.getElementById('aiInput');
    const message = input.value.trim();
    if (!message) return;

    aiState.isProcessing = true;
    input.disabled = true;
    document.getElementById('sendButton').disabled = true;

    try {
        addMessage(message, 'user');
        input.value = '';
        const currentHtml = await getModifiedContent();

        const messages = [
            { role: "system", content: "Vous êtes un assistant expert en édition de templates HTML et CSS et Js. And you return only the code not explanations." },
            { role: "user", content: `Modifie ce template HTML selon ces instructions: ${message}\n\nHTML Actuel:\n${currentHtml}` }
        ];

        const response = await fetch('/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ messages })
        });

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }

        const data = await response.json();

        if (data.choices && data.choices[0] && data.choices[0].message) {
            applyAiModifications(data.choices[0].message.content);
        } else {
            throw new Error('Invalid API response');
        }

    } catch (error) {
        console.error('Erreur API:', error);
        addMessage(`Erreur: ${error.message}`, 'ai');
    } finally {
        aiState.isProcessing = false;
        input.disabled = false;
        document.getElementById('sendButton').disabled = false;
        input.focus();
    }
}

function addMessage(content, sender) {
    const messagesDiv = document.getElementById('chatMessages');
    if (!messagesDiv) return;
    
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender}-message`;
    messageDiv.textContent = content;
    messagesDiv.appendChild(messageDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
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
 * DEPLOYMENT INITIALIZATION
 ******************************/

function initializeDeployment() {
    const deployBtn = document.getElementById('deployBtn');
    
    if (!deployBtn) {
        console.log('Deploy button not found (user may not be subscribed)');
        return;
    }
    
    console.log('✅ Deploy button found, attaching listener');
    
    deployBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        console.log('🚀 Deploy button clicked!');
        
        deployBtn.disabled = true;
        
        try {
            showDeploymentLoader();
            
            const modifiedContent = await getModifiedContent();
            console.log('Content ready, deploying...');
            
            const response = await fetch('/deploy', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ content: modifiedContent })
            });
            
            console.log('Deploy response:', response.status);
            
            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.error || `HTTP ${response.status}`);
            }
            
            const data = await response.json();
            console.log('✅ Deployment successful:', data);
            
            hideDeploymentLoader();
            showDeployPopup(data.siteUrl);
            
        } catch (error) {
            console.error('❌ Deployment error:', error);
            hideDeploymentLoader();
            alert(`Erreur lors du déploiement: ${error.message}`);
        } finally {
            deployBtn.disabled = false;
        }
    });
}

function showDeploymentLoader() {
    const loader = document.getElementById('deploymentLoader');
    if (!loader) return;
    
    loader.style.display = 'flex';
    
    const progressBar = document.getElementById('deployProgress');
    let progress = 0;
    
    window.deployProgressInterval = setInterval(() => {
        progress += 1;
        if (progressBar) {
            progressBar.style.width = `${progress}%`;
        }

        if (progress === 20) {
            const el = document.getElementById('serverSetup');
            if (el) el.innerHTML = "✓ Serveur configuré";
        }
        if (progress === 50) {
            const el = document.getElementById('dbSetup');
            if (el) el.innerHTML = "✓ Base de données prête";
        }
        if (progress === 80) {
            const el = document.getElementById('securitySetup');
            if (el) el.innerHTML = "✓ Sécurité activée";
        }

        if (progress >= 100) {
            clearInterval(window.deployProgressInterval);
        }
    }, 800);
}

function hideDeploymentLoader() {
    const loader = document.getElementById('deploymentLoader');
    if (loader) {
        loader.style.display = 'none';
    }
    
    if (window.deployProgressInterval) {
        clearInterval(window.deployProgressInterval);
    }
}

function showDeployPopup(url) {
    const popup = document.getElementById('deployPopup');
    const deployLink = document.getElementById('deployLink');
    
    if (!popup || !deployLink) {
        alert('Site déployé: ' + url);
        return;
    }

    deployLink.href = url;
    deployLink.textContent = url;
    popup.style.display = 'flex';

    const copyBtn = document.getElementById('copyLinkBtn');
    if (copyBtn) {
        copyBtn.onclick = () => {
            navigator.clipboard.writeText(url)
                .then(() => alert('Lien copié!'))
                .catch(() => alert('Erreur de copie'));
        };
    }

    const closeBtn = document.getElementById('closePopupBtn');
    if (closeBtn) {
        closeBtn.onclick = () => {
            popup.style.display = 'none';
        };
    }
}