<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditeur de Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-width: 320px;
            --primary-color: #6366f1;
        }

        body {
            overflow: hidden;
        }

        .editor-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            height: 100vh;
        }

        .sidebar {
            background: #1e1e2d;
            color: #fff;
            padding: 1.5rem;
            box-shadow: 4px 0 12px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .preview-wrapper {
            background: #f8f9fa;
            position: relative;
        }

        .preview-toolbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            z-index: 100;
        }

        .form-control {
            background: #2a2a3c;
            border: 1px solid #3a3a4c;
            color: #fff;
        }

        .form-label {
            color: #a1a1aa;
            font-weight: 500;
        }

        .settings-group {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #2a2a3c;
            border-radius: 8px;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="editor-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex align-items-center mb-4">
            <i class="bi bi-layout-wtf fs-4 me-2"></i>
            <h4 class="m-0">Paramètres du template</h4>
        </div>

        <div class="settings-group">
            <h5 class="text-primary mb-3 d-flex align-items-center">
                <i class="bi bi-header fs-6 me-2"></i>
                Paramètres de l'en-tête
            </h5>

            <div class="mb-3">
                <label for="siteTitle" class="form-label">Titre du site</label>
                <input type="text"
                       class="form-control"
                       id="siteTitle"
                       data-target=".logo"
                       data-property="textContent">
            </div>

            <div class="mb-3">
                <label for="primaryColor" class="form-label">Couleur principale</label>
                <input type="color"
                       class="form-control form-control-color"
                       id="primaryColor"
                       data-target=":root"
                       data-property="--primary-color">
            </div>
        </div>

        <div class="settings-group">
            <h5 class="text-primary mb-3 d-flex align-items-center">
                <i class="bi bi-image fs-6 me-2"></i>
                Section héro
            </h5>

            <div class="mb-3">
                <label for="heroText" class="form-label">Texte principal</label>
                <textarea class="form-control"
                          id="heroText"
                          rows="3"
                          data-target=".hero h1"
                          data-property="textContent"></textarea>
            </div>

            <div class="mb-3">
                <label for="heroImage" class="form-label">Image de fond</label>
                <input type="file"
                       class="form-control"
                       id="heroImage"
                       data-target=".hero"
                       data-property="backgroundImage">
            </div>
        </div>

        <div class="sticky-bottom bg-dark p-3 rounded">
            <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-save me-2"></i>
                Sauvegarder les modifications
            </button>
        </div>
    </div>

    <!-- Preview -->
    <div class="preview-wrapper">
        <div class="preview-toolbar">
            <div class="btn-group">
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-laptop"></i>
                </button>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-tablet"></i>
                </button>
                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-phone"></i>
                </button>
            </div>
        </div>

        <div class="loading-overlay">
            <div class="spinner-border text-primary"></div>
        </div>

        <iframe src="{{ $templateUrl }}"
                class="w-100 h-100 border-0"
                id="templatePreview"></iframe>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const iframe = document.getElementById('templatePreview');
    let isLoaded = false;

    iframe.addEventListener('load', () => {
        document.querySelector('.loading-overlay').style.display = 'none';
        isLoaded = true;
        setupLivePreview();
    });

    function setupLivePreview() {
        const iframeDoc = iframe.contentDocument;

        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                if (!isLoaded) return;

                const target = iframeDoc.querySelector(input.dataset.target);
                const property = input.dataset.property;
                const value = input.type === 'file' ?
                    `url(${URL.createObjectURL(input.files[0])})` :
                    input.value;

                if (property.startsWith('--')) {
                    iframeDoc.documentElement.style.setProperty(property, value);
                } else {
                    target[property] = value;
                }
            });
        });
    }

    // Initialiser les valeurs
    iframe.addEventListener('load', () => {
        const iframeDoc = iframe.contentDocument;
        document.querySelectorAll('.form-control').forEach(input => {
            const target = iframeDoc.querySelector(input.dataset.target);
            if (target && input.type !== 'file') {
                input.value = target[input.dataset.property];
            }
        });
    });
</script>
</body>
</html>
