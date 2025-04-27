<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3f37c9;
            --primary-light: #6366f1;
            --primary-lighter: #3b82f6;
            --gray-light: #F5F5F5;
            --gray-medium: #E0E0E0;
            --gray-dark: #616161;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: #333;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .page-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }

        .template-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255,165,0,0.15);
        }

        .preview-wrapper {
            height: 200px;
            overflow: hidden;
            background: var(--gray-light);
            position: relative;
        }

        .preview-iframe {
            width: 100%;
            height: 100%;
            border: 0;
            pointer-events: none;
            background: white;
        }

        .card-body {
            padding: 1.5rem;
        }

        .template-name {
            font-weight: 500;
            color: #333;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .template-name i {
            color: var(--primary-color);
        }

        .btn-preview {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-preview:hover {
            background-color: var(--primary-lighter);
            color: var(--primary-color);
        }

        .btn-edit {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-edit:hover {
            background-color: var(--primary-light);
            color: white;
        }

        /* Section anciens templates */
        .old-templates-section {
            margin-bottom: 3rem;
        }

        .old-templates-title {
            font-weight: 500;
            color: var(--gray-dark);
            margin-bottom: 1.5rem;
        }

        .old-templates-container {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scrollbar-width: thin;
        }

        .old-template-card {
            min-width: 180px;
            border-radius: 8px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 1rem;
            display: flex;
            flex-direction: column;
        }

        .old-template-preview {
            height: 100px;
            background: var(--gray-light);
            border-radius: 6px;
            margin-bottom: 0.5rem;
            overflow: hidden;
        }

        .old-template-name {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn-continue {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 6px;
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            margin-top: auto;
        }

        .btn-continue:hover {
            background-color: var(--primary-lighter);
        }

        /* Modal */
        .modal-iframe {
            width: 100%;
            height: 80vh;
            border: 0;
            border-radius: 0 0 8px 8px;
        }

        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-title {
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .preview-wrapper {
                height: 160px;
            }

            .page-title {
                font-size: 1.8rem;
            }
        }

    /*    */
        .btn-outline-secondary {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.45rem 1rem;
            transition: all 0.2s ease;
        }

        .btn-outline-secondary:hover {
            background-color: var(--gray-light);
            color: var(--primary-color);
        }

        /* Ajouts CSS */
        .btn-toggle-drafts {
            background: var(--primary-lighter);
            color: var(--primary-color);
            border: 2px solid var(--primary-light);
            border-radius: 10px;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-toggle-drafts:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-toggle-drafts[aria-expanded="true"] {
            background: var(--primary-color);
            color: white;
        }

        .btn-toggle-drafts[aria-expanded="true"] .fa-chevron-down {
            transform: rotate(180deg);
        }

        .btn-toggle-drafts .fa-chevron-down {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fw-600 {
            font-weight: 600;
        }

    </style>
</head>

<body>
@include('layout.nav')


<div class="container py-4 py-lg-5">
    <h1 class="text-center page-title">Choisissez un template</h1>

    <!-- Nouveau bouton de toggle -->
    <div class="text-center mb-4">
        <button class="btn btn-toggle-drafts shadow-sm"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#draftsCollapse"
                aria-expanded="false"
                aria-controls="draftsCollapse">
            <i class="fas fa-chevron-down me-2"></i>
            Voir mes brouillons de templates
        </button>
    </div>






    <!-- Section des brouillons masquée par défaut -->
    <div class="collapse" id="draftsCollapse">
        <h2 class="h5 mb-4 fw-600 text-muted">
            <i class="fas fa-drafting-compass me-2"></i>Mes Brouillons
        </h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($tempTemplates as $tempTemplate)
                <div class="col">
                    <div class="template-card h-100">
                        <div class="preview-wrapper">
                            <iframe
                                src="{{ route('templateso.contenttempTemplates', ['id' => $tempTemplate->id]) }}"
                                class="preview-iframe"
                                loading="lazy"
                                {{--                            title="Prévisualisation {{ $template->name }}"--}}
                            ></iframe>
                        </div>
                        <div class="card-body">
                            {{--                        <h5 class="template-name">--}}
                            {{--                            <i class="fas fa-file-alt"></i>--}}
                            {{--                            {{ $template->name }}--}}
                            {{--                        </h5>--}}
                            <div class="d-flex gap-2 mt-3">
                                <button
                                    type="button"
                                    class="btn btn-preview flex-grow-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#previewModal"
                                    data-template-url="{{ route('templateso.contenttempTemplates', ['id' => $tempTemplate->id]) }}"
                                >
                                    <i class="fas fa-search me-2"></i>Prévisualiser
                                </button>

                                <a href="{{ route('templateso.edit', ['id' => $tempTemplate->id]) }}"
                                   class="btn btn-edit flex-grow-1">
                                    <i class="fas fa-edit me-2"></i>Modifier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Section des templates standards -->
    <h2 class="h5 mb-4 fw-600 text-muted">
        <i class="fas fa-star me-2"></i>Templates Standards
    </h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($templates as $template)
            <div class="col">
                <div class="template-card h-100">
                    <div class="preview-wrapper">
                        <iframe
                            src="{{ route('templateso.content', ['id' => $template->id]) }}"
                            class="preview-iframe"
                            loading="lazy"
                            title="Prévisualisation {{ $template->name }}"
                        ></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="template-name">
                            <i class="fas fa-file-alt"></i>
                            {{ $template->name }}
                        </h5>
                        <div class="d-flex gap-2 mt-3">
                            <button
                                type="button"
                                class="btn btn-preview flex-grow-1"
                                data-bs-toggle="modal"
                                data-bs-target="#previewModal"
                                data-template-url="{{ route('templateso.content', ['id' => $template->id]) }}"
                            >
                                <i class="fas fa-search me-2"></i>Prévisualiser
                            </button>

                            <a href="{{ route('templateso.edit', ['id' => $template->id]) }}"
                               class="btn btn-edit flex-grow-1">
                                <i class="fas fa-edit me-2"></i>Modifier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>





<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prévisualisation du template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe
                    class="modal-iframe"
                    src=""
                    frameborder="0"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Gestion de la prévisualisation
    const previewModal = document.getElementById('previewModal')
    const modalIframe = previewModal.querySelector('iframe')

    previewModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const templateUrl = button.getAttribute('data-template-url')
        modalIframe.src = templateUrl
    })

    // Reset l'iframe à la fermeture
    previewModal.addEventListener('hidden.bs.modal', () => {
        modalIframe.src = ''
    })
</script>
</body>
</html>
