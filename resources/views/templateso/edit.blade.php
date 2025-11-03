<!DOCTYPE html>
<html lang="fr">

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            overflow-x: hidden;
        }

        /* Header Bar */
        .editor-header-bar {
            background: white;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .editor-header-wrapper {
            max-width: 1600px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .editor-header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .editor-header-center {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .editor-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .editor-logo svg {
            width: 32px;
            height: 32px;
            fill: #3b82f6;
        }

        .editor-logo h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }

        .editor-highlight {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .editor-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #f1f5f9;
            border-radius: 50px;
            font-size: 0.85rem;
            color: #475569;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .editor-actions {
            display: flex;
            gap: 1rem;
        }

        .editor-btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .editor-btn.primary {
            background: #3b82f6;
            color: white;
        }

        .editor-btn.primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .editor-btn.secondary {
            background: white;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .editor-btn.secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .editor-btn.accent {
            background: #ec4899;
            color: white;
        }

        .editor-btn.accent:hover {
            background: #db2777;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
        }

        .preview-mode-btn {
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .preview-mode-btn:hover,
        .preview-mode-btn.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .preview-mode-btn i {
            font-size: 1rem;
        }

        /* Main Container */
        .editor-container {
            display: flex;
            height: calc(100vh - 82px);
            max-width: 100%;
            margin: 0 auto;
            gap: 0;
            padding: 0;
        }

        /* Sidebar */
        .editor-sidebar {
            width: 25%;
            background: white;
            border-radius: 0;
            border: none;
            border-right: 1px solid #e2e8f0;
            box-shadow: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .sidebar-section {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .sidebar-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 1rem;
        }

        .elements-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .element-card {
            padding: 1rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .element-card:hover {
            background: #f1f5f9;
            border-color: #3b82f6;
            transform: translateY(-2px);
        }

        .element-card i {
            font-size: 1.5rem;
            color: #3b82f6;
        }

        .element-card span {
            font-size: 0.85rem;
            color: #475569;
            font-weight: 600;
        }

        .property-panel {
            flex: 1;
            overflow-y: auto;
            max-height: 400px;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .sidebar-footer {
            padding: 1.5rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .sidebar-footer .alert {
            font-size: 0.85rem;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        /* Preview Area */
        .editor-main {
            width: 75%;
            background: white;
            border-radius: 0;
            border: none;
            box-shadow: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .preview-container {
            flex: 1;
            position: relative;
            overflow: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
        }

        .preview-frame {
            width: 100%;
            height: 100%;
            border: none;
            background: white;
            transition: all 0.3s ease;
        }

        /* Responsive preview modes */
        .preview-frame.tablet-mode {
            width: 768px;
            height: 100%;
            border: 2px solid #cbd5e1;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .preview-frame.mobile-mode {
            width: 375px;
            height: 100%;
            border: 2px solid #cbd5e1;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .locked-frame {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1.5rem;
            padding: 3rem;
        }

        .locked-frame h4 {
            font-size: 1.5rem;
            color: #0f172a;
            font-weight: 700;
        }

        .locked-frame p {
            color: #64748b;
            font-size: 1.05rem;
        }

        /* AI Panel */
        .fab-container {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 999;
        }

        .fab-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }

        .fab-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.5);
        }

        .fab-button i {
            font-size: 1.75rem;
        }

        .ai-panel {
            position: fixed;
            right: 2rem;
            bottom: 6rem;
            width: 400px;
            height: 500px;
            background: white;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .ai-panel.active {
            display: flex;
        }

        .ai-header {
            padding: 1.25rem 1.5rem;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ai-header h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .close-ai {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-ai:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .ai-messages {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            background: #f8fafc;
        }

        .message {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            max-width: 85%;
        }

        .ai-message {
            background: white;
            border: 1px solid #e2e8f0;
            color: #1e293b;
        }

        .user-message {
            background: #3b82f6;
            color: white;
            margin-left: auto;
        }

        .ai-input-container {
            padding: 1rem 1.5rem;
            background: white;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 0.75rem;
        }

        .ai-input-container input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
        }

        .ai-send {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #3b82f6;
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .ai-send:hover {
            background: #2563eb;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .editor-container {
                flex-direction: column;
                height: auto;
            }

            .editor-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }

            .editor-main {
                width: 100%;
                min-height: 600px;
            }

            .ai-panel {
                width: calc(100% - 4rem);
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            .editor-header-wrapper {
                flex-direction: column;
                gap: 1rem;
            }

            .editor-header-left,
            .editor-header-center {
                width: 100%;
                justify-content: center;
            }

            .editor-actions {
                width: 100%;
                flex-wrap: wrap;
            }

            .editor-btn {
                flex: 1;
                min-width: 120px;
            }

            .editor-container {
                padding: 0;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    @include('layout.nav')

    <!-- Header Bar -->
    <header class="editor-header-bar">
        <div class="editor-header-wrapper">
            <div class="editor-header-left">
                <div class="editor-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12,3L2,12H5V20H19V12H22L12,3M12,7.7L16,11.2V18H14V14H10V18H8V11.2L12,7.7Z" />
                    </svg>
                    <h1><span class="editor-highlight">Éditeur</span> Pro</h1>
                </div>
                <div class="editor-status">
                    <span class="status-dot"></span>
                    <span>Auto-save activé</span>
                </div>
            </div>

            <div class="editor-header-center">
                <button class="preview-mode-btn active" data-mode="desktop">
                    <i class="mdi mdi-monitor"></i> Desktop
                </button>
                <button class="preview-mode-btn" data-mode="tablet">
                    <i class="mdi mdi-tablet"></i> Tablet
                </button>
                <button class="preview-mode-btn" data-mode="mobile">
                    <i class="mdi mdi-cellphone"></i> Mobile
                </button>
            </div>
        </div>
    </header>

    <!-- Main Editor Container -->
    <div class="editor-container">
        <!-- Sidebar with new changes -->
        <aside class="editor-sidebar">
            <div class="sidebar-section">
                <h5 class="section-title">Éléments</h5>
                <div class="elements-grid">
                    <!-- Add your element cards here if needed -->
                </div>
            </div>

            <div class="sidebar-section property-panel" id="dynamicSettings">
                <h5 class="section-title">Propriétés</h5>
                <div class="empty-state">
                    <i class="mdi mdi-cursor-default-click-outline"></i>
                    <p>Sélectionnez un élément pour l'éditer</p>
                </div>
            </div>

            <div class="sidebar-footer">
                <form action="/session" method="POST">
                    @csrf
                    <button type="submit" class="editor-btn primary" id="saveDraft"
                        data-template-id="{{ $templateId }}" style="width: 100%; margin-bottom: 0.75rem;">
                        <i class="mdi mdi-content-save"></i>
                        <span>Sauvegarder</span>
                    </button>
                    <button type="button" class="editor-btn secondary" id="downloadBtn"
                        style="width: 100%; margin-bottom: 0.75rem;">
                        <i class="mdi mdi-download"></i>
                        <span>Télécharger</span>
                    </button>
                    <button type="button" class="editor-btn accent" id="deployBtn" style="width: 100%;">
                        <i class="mdi mdi-rocket"></i>
                        <span>Héberger</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Preview Area -->
        <main class="editor-main">
            <div class="preview-container">
                <iframe src="{{ $templateUrl }}" class="preview-frame" id="templatePreview"></iframe>
            </div>
        </main>
    </div>

    <!-- FAB Button -->
    <div class="fab-container">
        <button class="fab-button" id="aiButton">
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
            <div class="message ai-message">
                Bonjour ! Je suis votre assistant IA. Comment puis-je vous aider avec votre template aujourd'hui ?
            </div>
        </div>
        <div class="ai-input-container">
            <input type="text" id="aiInput" placeholder="Comment puis-je vous aider ?">
            <button class="ai-send" id="sendButton">
                <i class="mdi mdi-send"></i>
            </button>
        </div>
    </div>

    <!-- Deployment Loader -->
    <div id="deploymentLoader"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 9999; align-items: center; justify-content: center;">
        <div style="background: white; padding: 3rem; border-radius: 16px; max-width: 500px; text-align: center;">
            <i class="mdi mdi-rocket-launch" style="font-size: 4rem; color: #3b82f6; margin-bottom: 1rem;"></i>
            <h3 style="margin-bottom: 1rem;">Déploiement en cours...</h3>
            <div
                style="background: #f1f5f9; border-radius: 8px; height: 8px; margin-bottom: 1.5rem; overflow: hidden;">
                <div id="deployProgress"
                    style="width: 0%; height: 100%; background: linear-gradient(90deg, #3b82f6, #60a5fa); transition: width 0.3s ease;">
                </div>
            </div>
            <div style="text-align: left; font-size: 0.9rem; color: #64748b;">
                <p id="serverSetup">⏳ Configuration du serveur...</p>
                <p id="dbSetup">⏳ Préparation de la base de données...</p>
                <p id="securitySetup">⏳ Activation de la sécurité...</p>
            </div>
        </div>
    </div>

    <!-- Deployment Success Popup -->
    <div id="deployPopup"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 10000; align-items: center; justify-content: center;">
        <div style="background: white; padding: 2.5rem; border-radius: 16px; max-width: 500px; text-align: center;">
            <i class="mdi mdi-check-circle" style="font-size: 4rem; color: #22c55e; margin-bottom: 1rem;"></i>
            <h3 style="margin-bottom: 1rem;">Déploiement réussi! 🎉</h3>
            <p style="color: #64748b; margin-bottom: 1.5rem;">Votre site est maintenant en ligne:</p>
            <div
                style="background: #f1f5f9; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; word-break: break-all;">
                <a id="deployLink" href="#" target="_blank"
                    style="color: #3b82f6; text-decoration: none; font-weight: 600;"></a>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button id="copyLinkBtn" class="editor-btn secondary" style="flex: 1;">
                    <i class="mdi mdi-content-copy"></i> Copier le lien
                </button>
                <button id="closePopupBtn" class="editor-btn primary" style="flex: 1;">
                    <i class="mdi mdi-close"></i> Fermer
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
</body>
</html>