<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3f37c9;
            --primary-light: #6366f1;
            --primary-lighter: #3b82f6;
            --gray-light: #F5F5F5;
            --gray-medium: #E0E0E0;
            --gray-dark: #616161;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            color: #333;
            min-height: 100vh;
        }

        /* Sidebar Layout */
        .main-container {
            display: flex;
            min-height: 100vh;
        }

        /* Left Sidebar Navigation */
        .sidebar {
            width: 280px;
            background: white;
            border-right: 2px solid #e2e8f0;
            padding: 2rem 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 20px rgba(0,0,0,0.03);
        }

        .sidebar-header {
            padding: 0 1.5rem 2rem;
            border-bottom: 2px solid #e2e8f0;
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .sidebar-subtitle {
            font-size: 0.875rem;
            color: #64748b;
            line-height: 1.4;
        }

        .sidebar-nav {
            padding: 0 1rem;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            color: #475569;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.9375rem;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .nav-link:hover {
            background: #f1f5f9;
            color: #3b82f6;
            border-color: #e0e7ff;
        }

        .nav-link.active {
            background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 100%);
            color: #3b82f6;
            border-color: #93c5fd;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
        }

        .nav-link i {
            font-size: 1.125rem;
            width: 20px;
            text-align: center;
        }

        /* Main Content Area */
        .content-area {
            flex: 1;
            padding: 2rem 3rem;
            overflow-y: auto;
        }

        /* Hero Section - Horizontal */
        .hero-banner {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            border-radius: 24px;
            padding: 3rem;
            margin-bottom: 3rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .page-title .highlight {
            color: #fef08a;
        }

        .page-subtitle {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 600px;
            opacity: 0.95;
        }

        .hero-illustration {
            position: relative;
            z-index: 1;
        }

        .hero-illustration i {
            font-size: 8rem;
            opacity: 0.2;
        }

        /* Masonry Grid Layout */
        .templates-masonry {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .template-item {
            display: flex;
        }

        /* Template Cards - Back to Original Style */
        .template-card {
            background: white;
            border-radius: 16px;
            border: 2px solid #e2e8f0;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .template-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 16px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .template-card:hover::before {
            opacity: 0.15;
        }

        .template-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.2);
            border-color: #3b82f6;
        }

        .preview-wrapper {
            height: 220px;
            overflow: hidden;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            position: relative;
            border-bottom: 1px solid #e2e8f0;
        }

        .preview-thumbnail {
            display: none;
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
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .template-name {
            font-weight: 600;
            font-size: 1.125rem;
            color: #0f172a;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .template-name i {
            color: #60a5fa;
            font-size: 1rem;
        }

        .template-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: auto;
        }

        /* Original Buttons Style */
        .btn-preview {
            flex: 1;
            background: white;
            color: #3b82f6;
            border: 2px solid #3b82f6;
            border-radius: 10px;
            padding: 0.625rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .btn-preview:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-preview i {
            font-size: 0.8rem;
        }

        .btn-edit {
            flex: 1;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.625rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-edit i {
            font-size: 0.8rem;
        }

        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 0;
        }

        .section-title i {
            color: #60a5fa;
            font-size: 1.25rem;
        }

        .section-count {
            background: #dbeafe;
            color: #3b82f6;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Drafts Section - Collapsible */
        .drafts-section {
            margin-top: 3rem;
        }

        .collapse {
            transition: height 0.35s ease;
        }

        /* Modal */
        .modal-content {
            border-radius: 16px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            border-bottom: 1px solid #e2e8f0;
            padding: 1.25rem 1.5rem;
            background: #f8fafc;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.125rem;
            color: #0f172a;
        }

        .modal-iframe {
            width: 100%;
            height: 80vh;
            border: 0;
        }

        .btn-close {
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-close:hover {
            background: #e2e8f0;
            transform: rotate(90deg);
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .templates-masonry {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 240px;
            }

            .content-area {
                padding: 1.5rem;
            }

            .templates-masonry {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .hero-banner {
                padding: 2rem;
            }

            .page-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 2px solid #e2e8f0;
            }

            .hero-banner {
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }

            .hero-illustration {
                display: none;
            }

            .templates-masonry {
                grid-template-columns: 1fr;
            }

            .template-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
@include('layout.nav')

<div class="main-container">
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2 class="sidebar-title">Templates</h2>
            <p class="sidebar-subtitle">Gérez et créez vos templates</p>
        </div>
        <nav class="sidebar-nav">
            <ul class="list-unstyled">
                <li class="nav-item">
                    <a href="#standards" class="nav-link active">
                        <i class="fas fa-star"></i>
                        <span>Standards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#drafts" class="nav-link" data-bs-toggle="collapse" data-bs-target="#draftsCollapse">
                        <i class="fas fa-drafting-compass"></i>
                        <span>Mes Brouillons</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="content-area">
        <!-- Hero Banner -->
        <div class="hero-banner">
            <div class="hero-content">
                <h1 class="page-title">
                    Choisissez Votre <span class="highlight">Template Parfait</span>
                </h1>
                <p class="page-subtitle">
                    Démarrez rapidement avec nos templates professionnels ou continuez à travailler sur vos brouillons sauvegardés
                </p>
            </div>
            <div class="hero-illustration">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>

        <!-- Standard Templates Section -->
        <div id="standards">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-star"></i>
                    <span>Templates Standards</span>
                </h2>
                <span class="section-count">{{ count($templates) }} templates</span>
            </div>

            <div class="templates-masonry">
                @foreach($templates as $template)
                    <div class="template-item">
                        <div class="template-card">
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
                                <div class="template-actions">
                                    <button
                                        type="button"
                                        class="btn-preview"
                                        data-bs-toggle="modal"
                                        data-bs-target="#previewModal"
                                        data-template-url="{{ route('templateso.content', ['id' => $template->id]) }}"
                                    >
                                        <i class="fas fa-search"></i>
                                        <span>Prévisualiser</span>
                                    </button>

                                    <a href="{{ route('templateso.edit', ['id' => $template->id]) }}"
                                       class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Modifier</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Drafts Section -->
        <div class="drafts-section collapse" id="draftsCollapse">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-drafting-compass"></i>
                    <span>Mes Brouillons</span>
                </h2>
                <span class="section-count">{{ count($tempTemplates) }} brouillons</span>
            </div>

            <div class="templates-masonry">
                @foreach($tempTemplates as $tempTemplate)
                    <div class="template-item">
                        <div class="template-card">
                            <div class="preview-wrapper">
                                <iframe
                                    src="{{ route('templateso.contenttempTemplates', ['id' => $tempTemplate->id]) }}"
                                    class="preview-iframe"
                                    loading="lazy"
                                ></iframe>
                            </div>
                            <div class="card-body">
                                <div class="template-actions">
                                    <button
                                        type="button"
                                        class="btn-preview"
                                        data-bs-toggle="modal"
                                        data-bs-target="#previewModal"
                                        data-template-url="{{ route('templateso.contenttempTemplates', ['id' => $tempTemplate->id]) }}"
                                    >
                                        <i class="fas fa-search"></i>
                                        <span>Prévisualiser</span>
                                    </button>

                                    <a href="{{ route('templateso.edit', ['id' => $tempTemplate->id]) }}"
                                       class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                        <span>Modifier</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
        
    </main>
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
                <iframe class="modal-iframe" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const previewModal = document.getElementById('previewModal');
    const modalIframe = previewModal.querySelector('iframe');

    previewModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const templateUrl = button.getAttribute('data-template-url');
        modalIframe.src = templateUrl;
    });

    previewModal.addEventListener('hidden.bs.modal', () => {
        modalIframe.src = '';
    });

    // Highlight active nav
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
</body>
</html>