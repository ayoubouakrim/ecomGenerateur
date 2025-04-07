<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.saveDraftUrl = "{{ route('templateso.saveDraft') }}";
        window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        window.templateId = "{{ $templateId }}"; // Ajoute ce qui manque
    </script>

    {{--    <script src="{{ asset('js/templateso/edit.js') }}"></script>--}}
    @vite('resources/js/templateso/edit.js')
    @vite('resources/css/edit.css')

    <title>Éditeur Universel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Animation library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Progress bar for deployment -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
</head>
<body>
<div class="editor-container">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div>
            <div class="logo-title"><img src="logo.svg" alt="Logo" style="height: 32px;" class="me-2"> <h4 class="m-0">
                    Éditeur</h4></div>
            <div id="dynamicSettings"><p class="fst-italic small text-muted">Sélectionnez un élément pour l’éditer.</p>
            </div>
            <div class="mt-4 border-top pt-3">
                <button class="btn btn-success w-100" id="saveDraft" data-template-id="{{ $templateId }}"><i
                        class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder
                </button>
                <button class="btn btn-outline-light w-100" id="downloadBtn"><i class="bi bi-download me-2"></i>Télécharger
                </button>
                <button class="btn btn-info w-100 deploy-button" id="deployBtn"><span class="button-content"> <i
                            class="bi bi-rocket-takeoff me-2"></i>Héberger </span> <span class="button-loader d-none"> <div
                            class="spinner-wave"> <div class="spinner-wave-dot"></div> <div
                                class="spinner-wave-dot"></div> <div class="spinner-wave-dot"></div> <div
                                class="spinner-wave-dot"></div> </div> </span></button>
            </div>
        </div>
        <div class="text-end">
            <div class="toggle-btn" id="sidebarToggle"><i class="bi bi-chevron-left"></i></div>
        </div>
    </div>
    {{--
        <div class="sidebar">
            <div class="d-flex align-items-center mb-4">
                <img src="logo.svg" alt="Logo" style="height: 32px;" class="me-2">
                <h4 class="m-0">Éditeur Universel</h4>
            </div>
            <div id="dynamicSettings">
                <p class="fst-italic">Sélectionnez un élément dans la prévisualisation pour éditer ses propriétés.</p>
            </div>
            <div class="mt-5 border-top pt-3">
                <button class="btn btn-success w-100 mb-2" id="saveDraft" data-template-id="{{ $templateId }}">
                    <i class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder le brouillon
                </button>
                <button class="btn btn-outline-light mb-3" id="downloadBtn">
                    <i class="bi bi-download me-2"></i>Télécharger le template
                </button>

                <button class="btn btn-info w-100 mb-2 deploy-button" id="deployBtn">
        <span class="button-content">
            <i class="bi bi-rocket-takeoff me-2"></i>Héberger le site
        </span>
                    <span class="button-loader">
            <div class="spinner-wave">
                <div class="spinner-wave-dot"></div>
                <div class="spinner-wave-dot"></div>
                <div class="spinner-wave-dot"></div>
                <div class="spinner-wave-dot"></div>
            </div>
        </span>
                </button>
            </div>
        </div>
    --}}
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

            <!-- Nouveau loader moderne -->
            <div class="ai-thinking" id="aiThinking" style="display: none;">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <p class="thinking-text">L'IA génère votre réponse...</p>
            </div>

            <div class="chat-input">
                <input type="text" id="aiInput" class="form-control" placeholder="Décrivez vos modifications...">
                <button class="btn btn-primary ms-2" id="sendButton">
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Fullscreen Deployment Loader -->
<div class="deployment-loader" id="deploymentLoader">
    <div class="loader-content">
        <div class="orbit-spinner">
            <div class="orbit"></div>
            <div class="orbit"></div>
            <div class="orbit"></div>
        </div>
        <h3 class="loader-title">Déploiement en cours</h3>
        <p class="loader-subtitle">Votre site est en train d'être hébergé...</p>
        <div class="progress-container">
            <div class="progress-bar" id="deployProgress"></div>
        </div>
        <div class="loader-stats">
            <div class="stat-item">
                <i class="bi bi-speedometer2"></i>
                <span id="serverSetup">Configuration du serveur...</span>
            </div>
            <div class="stat-item">
                <i class="bi bi-database"></i>
                <span id="dbSetup">Préparation de la base de données...</span>
            </div>
            <div class="stat-item">
                <i class="bi bi-shield-lock"></i>
                <span id="securitySetup">Mise en place de la sécurité...</span>
            </div>
        </div>
    </div>
</div>

<!-- Popup de déploiement -->
<div class="deploy-popup" id="deployPopup">
    <div class="deploy-popup-content">
        <h3>Site hébergé avec succès !</h3>
        <p>Votre site est maintenant en ligne :</p>
        <a id="deployLink" target="_blank" rel="noopener noreferrer">Chargement du lien...</a>
        <div class="deploy-popup-buttons">
            <button class="copy-btn" id="copyLinkBtn">
                <i class="bi bi-clipboard me-2"></i>Copier le lien
            </button>
            <button class="close-btn" id="closePopupBtn">
                Fermer
            </button>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Progress bar library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
</body>
</html>


