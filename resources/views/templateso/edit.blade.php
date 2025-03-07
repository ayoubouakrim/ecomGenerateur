<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <script src="{{ asset('js/templateso/edit.js') }}"></script>--}}
    @vite('resources/js/templateso/edit.js')

    <title>Éditeur Universel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --sidebar-width: 360px;
            --primary-color: #4F46E5;
        }
        /* Surlignage de l’élément sélectionné */
        .element-highlight {
            outline: 2px solid var(--primary-color) !important;
            position: relative;
            transition: outline 0.2s;
        }
        .element-highlight::after {
            content: attr(data-element-type);
            position: absolute;
            top: -20px;
            left: 0;
            background: var(--primary-color);
            color: white;
            padding: 2px 5px;
            font-size: 12px;
            border-radius: 3px;
        }
        .editor-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            height: 100vh;
            background: #1A1C22;
        }
        .sidebar {
            background: #252830;
            color: #fff;
            padding: 1rem;
            overflow-y: auto;
        }
        .element-picker {
            cursor: crosshair;
            position: absolute;
            z-index: 1000;
            background: rgba(79, 70, 229, 0.1);
            border: 2px solid var(--primary-color);
        }
        .dynamic-form-group {
            margin-bottom: 1rem;
        }
        .preview-wrapper {
            position: relative;
            background: #f8f9fa;
            padding: 1rem;
            overflow-y: auto;
        }
        .dropzone {
            border: 2px dashed #4F46E5;
            padding: 20px;
            min-height: 200px;
            background: white;
        }
        .editable {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px 0;
            position: relative;
        }
        .editable:hover {
            outline: 2px solid #4F46E5;
        }
        .remove-btn {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            cursor: pointer;
        }
        .draggable-elements {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .draggable-element {
            padding: 0.75rem;
            background: #4F46E5;
            color: white;
            border-radius: 0.5rem;
            cursor: grab;
            transition: background 0.2s;
            display: flex;
            align-items: center;
        }
        .draggable-element:hover {
            background: #4338CA;
        }
        .draggable-element:active {
            cursor: grabbing;
        }
        /* Interface IA */
        .ai-assistant {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 10000;
        }
        .ai-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #4F46E5;
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .ai-button:hover {
            transform: scale(1.1);
        }
        .ai-chat {
            position: absolute;
            bottom: 70px;
            right: 0;
            width: 400px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            display: none;
        }
        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 15px;
        }
        .chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #eee;
        }
        .message {
            margin: 8px 0;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
        }
        .user-message {
            background: #4F46E5;
            color: white;
            margin-left: auto;
        }
        .ai-message {
            background: #f3f4f6;
            margin-right: auto;
        }

        /**/
        /* Style du popup */
        .deploy-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .deploy-popup.active {
            opacity: 1;
            visibility: visible;
        }

        .deploy-popup-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .deploy-popup h3 {
            margin-bottom: 1.5rem;
            color: #4F46E5;
        }

        .deploy-popup a {
            color: #4F46E5;
            text-decoration: none;
            font-weight: 500;
            word-break: break-all;
        }

        .deploy-popup a:hover {
            text-decoration: underline;
        }

        .deploy-popup-buttons {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .deploy-popup-buttons button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.2s;
        }

        .deploy-popup-buttons .copy-btn {
            background: #4F46E5;
            color: white;
        }

        .deploy-popup-buttons .copy-btn:hover {
            background: #4338CA;
        }

        .deploy-popup-buttons .close-btn {
            background: #f3f4f6;
            color: #333;
        }

        .deploy-popup-buttons .close-btn:hover {
            background: #e0e7ff;
        }
    </style>
</head>
<body>
<div class="editor-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex align-items-center mb-4">
            <img src="logo.svg" alt="Logo" style="height: 32px;" class="me-2">
            <h4 class="m-0">Éditeur Universel</h4>
        </div>
        <div id="dynamicSettings">
            <p class="fst-italic">Sélectionnez un élément dans la prévisualisation pour éditer ses propriétés.</p>
        </div>
        <h4 class="mt-4">Éléments à glisser</h4>
        <div class="draggable-elements">
            <div class="draggable-element" draggable="true" data-type="text">
                <i class="bi bi-text-paragraph me-2"></i>Texte
            </div>
            <div class="draggable-element" draggable="true" data-type="image">
                <i class="bi bi-image me-2"></i>Image
            </div>
            <div class="draggable-element" draggable="true" data-type="section">
                <i class="bi bi-layout-wtf me-2"></i>Section
            </div>
        </div>
        <div class="mt-5 border-top pt-3">
            <button class="btn btn-success w-100 mb-2" id="saveDraft">
                <i class="bi bi-cloud-arrow-up me-2"></i>Sauvegarder le brouillon
            </button>
            <button class="btn btn-outline-light mb-3" id="downloadBtn">
                <i class="bi bi-download me-2"></i>Télécharger le template
            </button>
            <button class="btn btn-info w-100 mb-2" id="deployBtn">
                <i class="bi bi-rocket-takeoff me-2"></i>Héberger le site
            </button>
        </div>
    </div>
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
            <div class="chat-input">
                <input type="text" id="aiInput" class="form-control" placeholder="Décrivez vos modifications...">
                <button class="btn btn-primary ms-2" id="sendButton">
                    <i class="bi bi-send"></i>
                </button>
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

</body>
</html>


