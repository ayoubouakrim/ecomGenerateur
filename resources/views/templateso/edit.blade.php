<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Éditeur Universel Pro</title>

    <script>
        window.saveDraftUrl = "{{ route('templateso.saveDraft') }}";
        window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        window.templateId = "{{ $templateId }}";
    </script>

    @vite('resources/js/templateso/edit.js')
    @vite('resources/css/edit.css')

    <!-- Design System -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">


</head>

<body class="editor-body">
@include('layout.nav')

<!-- Main Editor Layout -->
<div class="editor-container">
    <!-- Modern Sidebar -->
    <aside class="editor-sidebar collapsed">
        <div class="sidebar-header">
            <div class="logo-wrapper">
                <svg class="logo-icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,3L2,12H5V20H19V12H22L12,3M12,7.7L16,11.2V18H14V14H10V18H8V11.2L12,7.7Z"/>
                </svg>
                <h3 class="logo-text">Éditeur Pro</h3>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="mdi mdi-chevron-double-left"></i>
            </button>
        </div>

        <div class="sidebar-content">
            <div class="element-picker">
                <h5 class="section-title">Éléments</h5>
                <div class="elements-grid">
                   {{-- <button class="element-card" data-type="text">
                        <i class="mdi mdi-text"></i>
                        <span>Texte</span>
                    </button>
                    <button class="element-card" data-type="image">
                        <i class="mdi mdi-image"></i>
                        <span>Image</span>
                    </button>
                    <button class="element-card" data-type="button">
                        <i class="mdi mdi-button-pointer"></i>
                        <span>Bouton</span>
                    </button>--}}
                   {{-- <button class="element-card" data-type="form">
                        <i class="mdi mdi-form-textbox"></i>
                        <span>Formulaire</span>
                    </button>--}}
                </div>
            </div>

            <div class="property-panel" id="dynamicSettings">
                <h5 class="section-title">Propriétés</h5>
                <div class="empty-state">
                    <i class="mdi mdi-cursor-default-click-outline"></i>
                    <p>Sélectionnez un élément pour l'éditer</p>
                </div>
            </div>
        </div>

      {{--  <div class="sidebar-footer">
            <form action="/session" method="POST">
            <button class="action-btn primary" id="saveDraft" data-template-id="{{ $templateId }}">
                <i class="mdi mdi-content-save"></i>
                <span>Sauvegarder</span>
            </button>
            <button class="action-btn secondary" id="downloadBtn">
                <i class="mdi mdi-download"></i>
                <span>Télécharger</span>
            </button>
            <button class="action-btn accent" id="deployBtn">
                <i class="mdi mdi-rocket"></i>
                <span>Héberger</span>
                <div class="spinner-wave deploy-spinner">
                    <div class="spinner-wave-dot"></div>
                    <div class="spinner-wave-dot"></div>
                    <div class="spinner-wave-dot"></div>
                </div>
            </button>
            </form>
        </div>--}}
        <div class="sidebar-footer">
            @if(auth()->check() && auth()->user()->subscribed)
                <form action="/session" method="POST">
                    @csrf
                    <button class="action-btn primary" id="saveDraft" data-template-id="{{ $templateId }}">
                        <i class="mdi mdi-content-save"></i>
                        <span>Sauvegarder</span>
                    </button>
                    <button type="button" class="action-btn secondary" id="downloadBtn">
                        <i class="mdi mdi-download"></i>
                        <span>Télécharger</span>
                    </button>
                    <button type="button" class="action-btn accent" id="deployBtn">
                        <i class="mdi mdi-rocket"></i>
                        <span>Héberger</span>
                        <div class="spinner-wave deploy-spinner">
                            <div class="spinner-wave-dot"></div>
                            <div class="spinner-wave-dot"></div>
                            <div class="spinner-wave-dot"></div>
                        </div>
                    </button>
                </form>
            @else
                <div class="alert alert-warning">
                    ⚠️ Vous devez vous abonner pour utiliser ces fonctionnalités.
                </div>
                <form action="{{ route('stripe.session') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="Premium">
                    <input type="hidden" name="price" value="1000">  en cents
                    <button class="action-btn accent">
                        <i class="mdi mdi-credit-card"></i>
                        <span>S'abonner</span>
                    </button>
                </form>
            @endif
        </div>

    </aside>

    <!-- Main Content Area -->
    <main class="editor-main">
        <div class="preview-container">
{{--
            <iframe src="{{ $templateUrl }}" class="preview-frame" id="templatePreview"></iframe>
--}}
            @if(auth()->check() && auth()->user()->subscribed)
                <iframe src="{{ $templateUrl }}" class="preview-frame" id="templatePreview"></iframe>
            @else
                <div class="preview-frame locked-frame d-flex justify-content-center align-items-center text-center">
                    <div>
                        <h4>Accès restreint</h4>
                        <p>Vous devez être abonné pour modifier ce template.</p>
                        <form action="{{ route('stripe.session') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" value="Premium">
                            <input type="hidden" name="price" value="1000">
                            <button class="btn btn-primary mt-2">
                                <i class="mdi mdi-credit-card"></i> S’abonner
                            </button>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </main>

    @if(auth()->check() && auth()->user()->subscribed)
        <!-- Floating Action Buttons -->
        <div class="fab-container">
            <button class="fab-button primary" id="aiButton">
                <i class="mdi mdi-robot"></i>
            </button>
        </div>

        <!-- AI Chat Panel -->
        <div class="ai-panel" id="aiChat">
            <div class="ai-header">
                <h5>Assistant IA</h5>
                <button class="close-ai">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="ai-messages" id="chatMessages">
                <!-- Message d'accueil initial -->
                <div class="message ai-message welcome-message">
                    Bonjour ! Je suis votre assistant IA. Comment puis-je vous aider avec votre template aujourd'hui ?
                </div>
            </div>
            <div class="ai-input-container">
                <input type="text" id="aiInput" placeholder="Comment puis-je vous aider ?">
                <button class="ai-send" id="sendButton">
                    <i class="mdi mdi-send"></i>
                </button>
            </div>
            <div class="ai-loading" id="aiThinking">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="loading-text">L'IA réfléchit...</div>
            </div>
        </div>
    @else
        <div class="ai-panel locked-frame d-flex justify-content-center align-items-center text-center">
            <div>
                <h4>Assistant IA réservé</h4>
                <p>Abonnez-vous pour accéder à l’assistant intelligent.</p>
                <form action="{{ route('stripe.session') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="Premium">
                    <input type="hidden" name="price" value="1000">
                    <button class="btn btn-warning mt-2">
                        <i class="mdi mdi-robot"></i> S’abonner pour l’IA
                    </button>
                </form>
            </div>
        </div>
    @endif

    {{--<!-- Floating Action Buttons -->
    <div class="fab-container">
        <button class="fab-button primary" id="aiButton">
            <i class="mdi mdi-robot"></i>
        </button>
    </div>

    <!-- AI Chat Panel -->
    <div class="ai-panel" id="aiChat">
        <div class="ai-header">
            <h5>Assistant IA</h5>
            <button class="close-ai">
                <i class="mdi mdi-close"></i>
            </button>
        </div>
        <div class="ai-messages" id="chatMessages">
            <!-- Message d'accueil initial -->
            <div class="message ai-message welcome-message">
                Bonjour ! Je suis votre assistant IA. Comment puis-je vous aider avec votre template aujourd'hui ?
            </div>
        </div>
        <div class="ai-input-container">
            <input type="text" id="aiInput" placeholder="Comment puis-je vous aider ?">
            <button class="ai-send" id="sendButton">
                <i class="mdi mdi-send"></i>
            </button>
        </div>
        <div class="ai-loading" id="aiThinking">
            <div class="typing-indicator">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="loading-text">L'IA réfléchit...</div>
        </div>
    </div>--}}
{{--
    <div class="ai-panel" id="aiChat">
        <div class="ai-header">
            <h5>Assistant IA</h5>
            <button class="close-ai">
                <i class="mdi mdi-close"></i>
            </button>
        </div>
        <div class="ai-messages" id="chatMessages"></div>
        <div class="ai-input-container">
            <input type="text" id="aiInput" placeholder="Comment puis-je vous aider ?">
            <button class="ai-send" id="sendButton">
                <i class="mdi mdi-send"></i>
            </button>
        </div>
        <div class="ai-loading" id="aiThinking">
            <div class="typing-indicator">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
--}}
</div>

<!-- Deployment Modals -->
<div class="deployment-overlay" id="deploymentLoader">
    <div class="deployment-modal">
        <div class="deployment-animation">
            <svg class="deployment-icon" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,3L2,12H5V20H19V12H22L12,3M12,7.7L16,11.2V18H14V14H10V18H8V11.2L12,7.7Z"/>
            </svg>
            <div class="progress-ring">
                <svg class="ring-svg" viewBox="0 0 36 36">
                    <path class="ring-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                    <path class="ring-fill" stroke-dasharray="0, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                </svg>
            </div>
        </div>
        <div class="deployment-info">
            <h3>Déploiement en cours</h3>
            <p>Votre site est en train d'être publié...</p>
            <div class="deployment-steps">
                <div class="step active" id="serverSetup">
                    <div class="step-icon">
                        <i class="mdi mdi-server"></i>
                    </div>
                    <div class="step-text">
                        <p>Configuration du serveur</p>
                    </div>
                </div>
                <div class="step" id="dbSetup">
                    <div class="step-icon">
                        <i class="mdi mdi-database"></i>
                    </div>
                    <div class="step-text">
                        <p>Préparation de la base de données</p>
                    </div>
                </div>
                <div class="step" id="securitySetup">
                    <div class="step-icon">
                        <i class="mdi mdi-shield-lock"></i>
                    </div>
                    <div class="step-text">
                        <p>Mise en place de la sécurité</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="success-modal" id="deployPopup">
    <div class="success-content">
        <div class="success-icon">
            <i class="mdi mdi-check-circle"></i>
        </div>
        <h3>Déploiement réussi !</h3>
        <p>Votre site est maintenant en ligne :</p>
        <a id="deployLink" target="_blank" rel="noopener noreferrer">Chargement du lien...</a>
        <div class="success-actions">
            <button class="success-btn" id="copyLinkBtn">
                <i class="mdi mdi-content-copy"></i> Copier le lien
            </button>
            <button class="success-btn outline" id="closePopupBtn">
                Fermer
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
</body>
</html>
