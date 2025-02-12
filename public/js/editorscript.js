
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
