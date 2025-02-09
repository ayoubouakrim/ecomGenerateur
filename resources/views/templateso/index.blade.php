<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .template-card {
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 12px;
            transition: transform 0.2s;
            background: white;
        }

        .template-card:hover {
            transform: translateY(-3px);
        }

        .preview-wrapper {
            height: 250px;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
            background: #f8f9fa;
        }

        .preview-iframe {
            width: 100%;
            height: 100%;
            border: 0;
            pointer-events: none;
        }

        .card-footer {
            padding: 1rem;
        }

        .btn-group {
            width: 100%;
            gap: 0.5rem;
        }

        .btn-preview {
            background: #e9ecef;
            color: #0d6efd;
        }

        .btn-preview:hover {
            background: #dee2e6;
        }

        /* Modal fullscreen */
        .modal-iframe {
            width: 100%;
            height: 80vh;
            border: 0;
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 90%;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-5 display-6 fw-bold text-dark">Choisissez un template</h1>

    <div class="row g-4">
        @foreach($templates as $template)
            <div class="col-md-4">
                <div class="template-card h-100">
                    <div class="preview-wrapper">
                        <iframe
                            src="{{ route('templateso.content', ['id' => $template->id]) }}"
                            class="preview-iframe"
                            loading="lazy"
                            title="Prévisualisation {{ $template->name }}"
                        ></iframe>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="m-0 fw-semibold text-truncate">
                                {{ $template->name }}
                            </h5>
                            <i class="fas fa-file-code text-muted"></i>
                        </div>
                        <div class="btn-group">
                            <button
                                type="button"
                                class="btn btn-preview btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#previewModal"
                                data-template-url="{{ route('templateso.content', ['id' => $template->id]) }}"
                            >
                                <i class="fas fa-expand"></i>
                            </button>
                            <form method="POST" action="{{ route('templateso.choose') }}" class="w-100">
                                @csrf
                                <input type="hidden" name="templateName" value="{{ $template->name }}">
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-check me-2"></i>Sélectionner
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prévisualisation du template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
