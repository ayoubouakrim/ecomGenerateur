function showTemplateModal(name, filepath) {
    // Mettre à jour les champs cachés du formulaire avec les données du template
    document.getElementById('templateName').innerText = name;
    document.getElementById('templateNameInput').value = name;
    document.getElementById('templateFilepathInput').value = filepath;

    // Afficher le modal
    document.getElementById('confirmTemplateModal').style.display = 'block';
}

function closeModal() {
    // Fermer le modal en masquant l'élément
    document.getElementById('confirmTemplateModal').style.display = 'none';
}

function submitTemplate() {
    // Soumettre le formulaire
    document.getElementById('templateForm').submit();
}
