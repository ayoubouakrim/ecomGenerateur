<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Website Component Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #f9fafb;
            --dark: #1e293b;
            --light: #f3f4f6;
            --border: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: var(--text-primary);
        }

        .main-container {
            max-width: 1280px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3.5rem;
            position: relative;
            padding-bottom: 1.5rem;
        }

        .page-title {
            font-size: 2.75rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.75rem;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        .section-container {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 2.5rem;
            margin-bottom: 3.5rem;
            transition: var(--transition);
        }

        .section-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .section-title {
            position: relative;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            color: var(--primary);
            display: inline-flex;
            align-items: center;
            padding-bottom: 0.75rem;
        }

        .section-title::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        .component-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2.5rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
            scrollbar-width: thin;
            scrollbar-color: var(--primary) var(--light);
        }

        .component-tabs::-webkit-scrollbar {
            height: 6px;
        }

        .component-tabs::-webkit-scrollbar-track {
            background: var(--light);
            border-radius: 3px;
        }

        .component-tabs::-webkit-scrollbar-thumb {
            background-color: var(--primary);
            border-radius: 3px;
        }

        .component-tab {
            padding: 0.75rem 1.5rem;
            background: white;
            border-radius: 8px;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            white-space: nowrap;
            border: 1px solid var(--border);
        }

        .component-tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .component-tab:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .component-card {
            background: white;
            border: 2px solid transparent;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .component-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .preview-area {
            width: 100%;
            padding: 1.25rem;
            background: #f3f4f6;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
            position: relative;
        }

        .preview-area img {
            width: 100%;
            border-radius: 6px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .component-card:hover .preview-area img {
            transform: scale(1.05);
        }

        .component-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.4rem 0.85rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 2;
            letter-spacing: 0.025em;
        }

        .menu-preview {
            margin-top: 0.75rem;
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .menu-item {
            font-size: 0.75rem;
            padding: 0.35rem 0.75rem;
            background: rgba(79, 70, 229, 0.1);
            border-radius: 6px;
            color: var(--primary);
            font-weight: 500;
        }

        .card-body {
            padding: 1.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            flex-grow: 1;
        }

        .component-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .btn-select {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.65rem 1.75rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            letter-spacing: 0.025em;
        }

        .btn-select:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(79, 70, 229, 0.3);
        }

        .component-card.selected-card {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2), var(--shadow);
        }

        .btn-configure {
            display: none;
            width: 100%;
            margin-top: 1rem;
            padding: 0.75rem;
            background-color: var(--secondary);
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-configure:hover {
            background-color: rgba(79, 70, 229, 0.1);
        }

        .selected-card .btn-configure {
            display: block;
        }

        /* Modal styles */
        .component-modal .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .component-modal .modal-header {
            border-bottom: 2px solid var(--primary);
            padding: 1.5rem 2rem;
            background: linear-gradient(to right, var(--primary), var(--primary-hover));
            border-radius: 16px 16px 0 0;
        }

        .component-modal .modal-title {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .component-modal .modal-header .btn-close {
            color: white;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            opacity: 0.8;
        }

        .component-modal .modal-body {
            padding: 2rem;
        }

        .component-modal .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1.5rem 2rem;
            justify-content: space-between;
        }

        .form-section {
            margin-bottom: 2rem;
            background-color: var(--light);
            padding: 1.5rem;
            border-radius: 12px;
        }

        .form-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: var(--primary);
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary);
            display: inline-block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1.15rem;
            font-size: 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background-color: white;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon .form-control {
            padding-left: 2.75rem;
        }

        .input-with-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .color-picker-wrapper {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .color-option {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            transition: var(--transition);
            border: 2px solid var(--border);
        }

        .color-option.active {
            transform: scale(1.2);
            border-color: var(--dark);
        }

        .color-option.active::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }

        .btn-save {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.85rem 1.75rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            letter-spacing: 0.025em;
        }

        .btn-save:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .btn-cancel {
            background-color: white;
            color: var(--text-secondary);
            border: 1px solid var(--border);
            padding: 0.85rem 1.75rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-cancel:hover {
            background-color: var(--light);
            color: var(--text-primary);
        }

        .submit-btn {
            text-align: right;
            margin-top: 2.5rem;
        }

        .generate-button {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1.15rem 3.5rem;
            font-size: 1.15rem;
            font-weight: 700;
            transition: var(--transition);
            text-align: center;
            letter-spacing: 0.025em;
            min-width: 220px;
        }

        .generate-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 20px -3px rgba(79, 70, 229, 0.35);
            background: linear-gradient(135deg, var(--primary-hover), var(--primary));
        }

        .toast-message {
            position: fixed;
            bottom: 25px;
            right: 25px;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: white;
            background: #10b981;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
            z-index: 9999;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
        }

        .toast-message.error {
            background: #ef4444;
        }

        /* File upload styling */
        .custom-file-upload {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 2rem 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background-color: white;
        }

        .custom-file-upload:hover {
            border-color: var(--primary);
            background-color: rgba(79, 70, 229, 0.05);
        }

        .custom-file-upload i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .custom-file-upload p {
            margin-bottom: 0;
            color: var(--text-secondary);
        }

        .custom-file-upload strong {
            color: var(--primary);
        }

        .file-preview {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background-color: white;
            border-radius: 10px;
            text-align: center;
        }

        .file-preview img {
            max-height: 120px;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .file-preview p {
            margin-top: 0.75rem;
            margin-bottom: 0;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        @media (max-width: 992px) {
            .page-title {
                font-size: 2.25rem;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 768px) {
            .section-container {
                padding: 1.75rem;
            }

            .component-card {
                margin-bottom: 1.5rem;
            }

            .generate-button {
                width: 100%;
                padding: 1rem 0;
            }

            .page-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 0 1rem;
                margin: 2rem auto;
            }

            .page-title {
                font-size: 1.75rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .btn-select {
                padding: 0.5rem 1.25rem;
            }

            .component-modal .modal-body {
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>

<body>
    @include('layout.nav')
    <div class="main-container">
        <header class="page-header">
            <h1 class="page-title">Website Component Builder</h1>
            <p class="page-subtitle">Select components to create your perfect website</p>
        </header>

        @if (session('success') || session('error'))
            <div id="toast" class="toast-message {{ session('success') ? 'success' : 'error' }}">
                {{ session('success') ?? session('error') }}
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById("toast").style.opacity = "0";
                    setTimeout(() => {
                        document.getElementById("toast").style.display = "none";
                    }, 500);
                }, 5000);
            </script>
        @endif

        {{-- Navbars Section --}}
        @if ($types->where('name', 'Navbars')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">Navbars</h2>

                <div class="component-tabs">
                    <div class="component-tab active">All Designs</div>
                    <div class="component-tab">Simple</div>
                    <div class="component-tab">Business</div>
                    <div class="component-tab">Creative</div>
                    <div class="component-tab">E-commerce</div>
                </div>

                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Navbars')->first()->id) as $component)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="component-card" data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                                data-style="{{ $component->id }}">
                                @if ($loop->index == 0)
                                    <div class="component-badge">Popular</div>
                                @elseif($loop->index == 2)
                                    <div class="component-badge">New</div>
                                @endif
                                <div class="preview-area">
                                    <img src="{{ $component->img_path }}" alt="{{ $component->name }} Preview"
                                        class="img-fluid">
                                    <div class="menu-preview">
                                        <span class="menu-item">Accueil</span>
                                        <span class="menu-item">À propos</span>
                                        <span class="menu-item">Services</span>
                                        <span class="menu-item">Contact</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                                        data-style="{{ $component->id }}" @if($component->id == 12 && !$subscription) disabled @endif>
                                        Select
                                    </button>
                                </div>
                                <button class="btn-configure"
                                    onclick="openConfigModal('{{ $component->name }}', '{{ $component->id }}', '{{ $types->where('name', 'Navbars')->first()->id }}')">
                                    <i class="fas fa-cog me-2"></i> Configure Component
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Hero Sections --}}
        @if ($types->where('name', 'Hero Sections')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">Hero Sections</h2>

                <div class="component-tabs">
                    <div class="component-tab active">All Designs</div>
                    <div class="component-tab">Simple</div>
                    <div class="component-tab">Bold</div>
                    <div class="component-tab">With Image</div>
                </div>

                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Hero Sections')->first()->id) as $component)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="component-card"
                                data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                data-style="{{ $component->id }}">
                                @if ($loop->index == 0)
                                    <div class="component-badge">Featured</div>
                                @endif
                                <div class="preview-area">
                                    <img src="{{ $component->img_path }}" alt="{{ $component->name }} Preview"
                                        class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                        data-style="{{ $component->id }}" @if($component->id == 11 && !$subscription) disabled @endif>
                                        Select
                                    </button>
                                </div>
                                <button class="btn-configure"
                                    onclick="openConfigModal('{{ $component->name }}', '{{ $component->id }}', '{{ $types->where('name', 'Hero Sections')->first()->id }}')">
                                    <i class="fas fa-cog me-2"></i> Configure Component
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- About Us Section --}}
        @if ($types->where('name', 'About us')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">About Us</h2>

                <div class="component-tabs">
                    <div class="component-tab active">All Designs</div>
                    <div class="component-tab">Simple</div>
                    <div class="component-tab">With Image</div>
                    <div class="component-tab">Timeline</div>
                </div>

                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'About us')->first()->id) as $component)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="component-card"
                                data-type="{{ $types->where('name', 'About us')->first()->id }}"
                                data-style="{{ $component->id }}">
                                <div class="preview-area">
                                    <img src="{{ $component->img_path }}" alt="{{ $component->name }} Preview"
                                        class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <button class="btn-configure"
                                    onclick="openConfigModal('{{ $component->name }}', '{{ $component->id }}', '{{ $types->where('name', 'About us')->first()->id }}')">
                                    <i class="fas fa-cog me-2"></i> Configure Component
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Contact Us Section --}}
        @if ($types->where('name', 'Contact us')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">Contact Us</h2>

                <div class="component-tabs">
                    <div class="component-tab active">All Designs</div>
                    <div class="component-tab">Simple</div>
                    <div class="component-tab">With Map</div>
                    <div class="component-tab">Split</div>
                </div>

                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Contact us')->first()->id) as $component)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="component-card"
                                data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                data-style="{{ $component->id }}">
                                <div class="preview-area">
                                    <img src="{{ $component->img_path }}" alt="{{ $component->name }} Preview"
                                        class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <button class="btn-configure"
                                    onclick="openConfigModal('{{ $component->name }}', '{{ $component->id }}', '{{ $types->where('name', 'Contact us')->first()->id }}')">
                                    <i class="fas fa-cog me-2"></i> Configure Component
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Footers Section --}}
        @if ($types->where('name', 'Footers')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">Footers</h2>

                <div class="component-tabs">
                    <div class="component-tab active">All Designs</div>
                    <div class="component-tab">Simple</div>
                    <div class="component-tab">With Links</div>
                    <div class="component-tab">Social</div>
                </div>

                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Footers')->first()->id) as $component)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="component-card"
                                data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                data-style="{{ $component->id }}">
                                <div class="preview-area">
                                    <img src="{{ $component->img_path }}" alt="{{ $component->name }} Preview"
                                        class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <button class="btn-configure"
                                    onclick="openConfigModal('{{ $component->name }}', '{{ $component->id }}', '{{ $types->where('name', 'Footers')->first()->id }}')">
                                    <i class="fas fa-cog me-2"></i> Configure Component
                                </button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="submit-btn">
            <button type="submit" class="generate-button" onclick="window.location='{{ route('generate') }}'">Generate Website</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectCard(button) {
            const card = button.closest('.component-card');
            const type = button.dataset.type;

            // Remove selected class from all cards of same type
            document.querySelectorAll(`.component-card[data-type="${type}"]`).forEach(el => {
                el.classList.remove('selected-card');
            });

            // Add selected class to current card
            card.classList.add('selected-card');

            // Change button text
            button.textContent = 'Selected';
        }
    </script>
    <!-- Add this right before the submit-btn section -->

    <!-- Component Configuration Modal -->
    <div class="modal fade component-modal" id="configModal" tabindex="-1" aria-labelledby="configModalLabel"
        aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="configModalLabel">Configure Component</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="component_id" name="component_id">
                    <input type="hidden" id="component_type_id" name="component_type_id">

                    <!-- Navbar Configuration -->
                    <form id="navbar-config-form" class="component-config-section" method="post"
                        action="/save-content">
                        @csrf
                        <input type="hidden" name="component_id" class="component-id-field">
                        <input type="hidden" name="component_type_id" class="component-type-id-field">
                        <div class="form-section">
                            <h4 class="form-section-title">General Settings</h4>
                            <div class="form-group">
                                <label class="form-label">Website Name</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-building"></i>
                                    <input type="text" class="form-control" name="website_name"
                                        placeholder="Enter your brand name">
                                </div>
                            </div>

                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Navigation Items</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Menu Item 1</label>
                                        <input type="text" class="form-control" name="menu_item_1"
                                            placeholder="Home">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item 1 URL</label>
                                        <input type="text" class="form-control" name="menu_item_1_url"
                                            placeholder="#home">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Menu Item 2</label>
                                        <input type="text" class="form-control" name="menu_item_2"
                                            placeholder="Features">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item 2 URL</label>
                                        <input type="text" class="form-control" name="menu_item_2_url"
                                            placeholder="#features">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Menu Item 3</label>
                                        <input type="text" class="form-control" name="menu_item_3"
                                            placeholder="Contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item 3 URL</label>
                                        <input type="text" class="form-control" name="menu_item_3_url"
                                            placeholder="#contact">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Menu Item 4</label>
                                        <input type="text" class="form-control" name="menu_item_4"
                                            placeholder="About">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Item 4 URL</label>
                                        <input type="text" class="form-control" name="menu_item_4_url"
                                            placeholder="#about">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-end">
                            <button type="submit" class="btn-save">Save Navbar Configuration</button>
                        </div>
                    </form>

                    <!-- Hero Section Configuration -->
                    <form id="hero-config-form" class="component-config-section" method="post"
                        action="/save-content" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="component_id" class="component-id-field">
                        <input type="hidden" name="component_type_id" class="component-type-id-field">
                        <div class="form-section">
                            <h4 class="form-section-title">Content</h4>
                            <div class="form-group">
                                <label class="form-label">Hero Title</label>
                                <input type="text" class="form-control" name="hero_title"
                                    placeholder="Enter your headline">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Hero Subtitle</label>
                                <input type="text" class="form-control" name="hero_subtitle"
                                    placeholder="Enter your subheadline">
                            </div>

                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Call to Action</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">CTA Text</label>
                                        <input type="text" class="form-control" name="hero_cta_text"
                                            placeholder="Get Started">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">CTA URL</label>
                                        <input type="text" class="form-control" name="hero_cta_url"
                                            placeholder="#get-started">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section" id="heroImageUploadSection" style="display: none;">
                            <h4 class="form-section-title">Background Image</h4>
                            <div class="form-group">
                                <label class="form-label">Upload Image</label>
                                <div class="custom-file-upload">
                                    <input type="file" id="heroImageUpload" name="hero_img" accept="image/*"
                                        style="display: none;">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Drag & drop files here or <strong>browse</strong></p>
                                </div>
                                <div class="file-preview" id="heroImagePreview">
                                    <img id="previewImg" src="" alt="Image Preview">
                                    <p id="previewName"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer text-end">
                            <button type="submit" class="btn-save">Save Hero Configuration</button>
                        </div>
                    </form>

                    <!-- Features Configuration -->
                    <form id="features-config-form" class="component-config-section" method="post"
                        action="/save-content">
                        @csrf
                        <input type="hidden" name="component_id" class="component-id-field">
                        <input type="hidden" name="component_type_id" class="component-type-id-field">
                        <div class="form-section">
                            <h4 class="form-section-title">Content</h4>
                            <div class="form-group">
                                <label class="form-label">Section Title</label>
                                <input type="text" class="form-control" name="section_title"
                                    placeholder="Features">
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Features</h4>
                            <div class="form-group">
                                <label class="form-label">Feature 1 Title</label>
                                <input type="text" class="form-control" name="feature_1_title"
                                    placeholder="Feature 1">
                                <label class="form-label mt-2">Feature 1 Description</label>
                                <textarea class="form-control" name="feature_1_description" rows="2" placeholder="Feature 1 description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Feature 2 Title</label>
                                <input type="text" class="form-control" name="feature_2_title"
                                    placeholder="Feature 2">
                                <label class="form-label mt-2">Feature 2 Description</label>
                                <textarea class="form-control" name="feature_2_description" rows="2" placeholder="Feature 2 description"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Feature 3 Title</label>
                                <input type="text" class="form-control" name="feature_3_title"
                                    placeholder="Feature 3">
                                <label class="form-label mt-2">Feature 3 Description</label>
                                <textarea class="form-control" name="feature_3_description" rows="2" placeholder="Feature 3 description"></textarea>
                            </div>
                        </div>
                        <div class="form-footer text-end">
                            <button type="submit" class="btn-save">Save Features Configuration</button>
                        </div>
                    </form>

                    <!-- Contact Form Configuration -->
                    <form id="contact-config-form" class="component-config-section" method="post"
                        action="/save-content">
                        @csrf
                        <input type="hidden" name="component_id" class="component-id-field">
                        <input type="hidden" name="component_type_id" class="component-type-id-field">
                        <div class="form-section">
                            <h4 class="form-section-title">Contact Information</h4>
                            <div class="form-group">
                                <label class="form-label">Form Title</label>
                                <input type="text" class="form-control" name="form_title"
                                    placeholder="Contact Us">
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Form Fields</h4>
                            <div class="form-group">
                                <label class="form-label">Field 1 Label</label>
                                <input type="text" class="form-control" name="contact_field_1_label"
                                    placeholder="Full Name">
                                <label class="form-label mt-2">Field Type</label>
                                <select class="form-control" name="contact_field_1_type">
                                    <option value="text">Text</option>
                                    <option value="email">Email</option>
                                    <option value="textarea">Textarea</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Field 2 Label</label>
                                <input type="text" class="form-control" name="contact_field_2_label"
                                    placeholder="Email">
                                <label class="form-label mt-2">Field Type</label>
                                <select class="form-control" name="contact_field_2_type">
                                    <option value="text">Text</option>
                                    <option value="email" selected>Email</option>
                                    <option value="textarea">Textarea</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Field 3 Label</label>
                                <input type="text" class="form-control" name="contact_field_3_label"
                                    placeholder="Message">
                                <label class="form-label mt-2">Field Type</label>
                                <select class="form-control" name="contact_field_3_type">
                                    <option value="text">Text</option>
                                    <option value="email">Email</option>
                                    <option value="textarea" selected>Textarea</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer text-end">
                            <button type="submit" class="btn-save">Save Contact Configuration</button>
                        </div>
                    </form>

                    <!-- Footer Configuration -->
                    <form id="footer-config-form" class="component-config-section" method="post"
                        action="/save-content">
                        @csrf
                        <input type="hidden" name="component_id" class="component-id-field">
                        <input type="hidden" name="component_type_id" class="component-type-id-field">
                        <div class="form-section">
                            <h4 class="form-section-title">General Settings</h4>
                            <div class="form-group">
                                <label class="form-label">Footer Text</label>
                                <input type="text" class="form-control" name="footer_text"
                                    placeholder="© 2025 Your Brand. All rights reserved.">
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Social Media Links</h4>
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <div class="input-with-icon">
                                    <i class="fab fa-facebook-f"></i>
                                    <input type="text" class="form-control" name="facebook_link_url"
                                        placeholder="https://facebook.com/yourbrand">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Twitter/X</label>
                                <div class="input-with-icon">
                                    <i class="fab fa-twitter"></i>
                                    <input type="text" class="form-control" name="x_link_url"
                                        placeholder="https://twitter.com/yourbrand">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">YouTube</label>
                                <div class="input-with-icon">
                                    <i class="fab fa-youtube"></i>
                                    <input type="text" class="form-control" name="youtube_link_url"
                                        placeholder="https://youtube.com/yourbrand">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="form-section-title">Quick Links</h4>
                            <div class="form-group">
                                <label class="form-label">Link 1</label>
                                <input type="text" class="form-control mb-2" name="product_1_name"
                                    placeholder="Product 1">
                                <input type="text" class="form-control" name="product_link_1_url"
                                    placeholder="https://yourdomain.com/product1">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Link 2</label>
                                <input type="text" class="form-control mb-2" name="product_2_name"
                                    placeholder="Product 2">
                                <input type="text" class="form-control" name="product_link_2_url"
                                    placeholder="https://yourdomain.com/product2">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Link 3</label>
                                <input type="text" class="form-control mb-2" name="product_3_name"
                                    placeholder="Product 3">
                                <input type="text" class="form-control" name="product_link_3_url"
                                    placeholder="https://yourdomain.com/product3">
                            </div>
                        </div>
                        <div class="form-footer text-end">
                            <button type="submit" class="btn-save">Save Footer Configuration</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add these scripts right before the closing body tag -->
    <script>
        function openConfigModal(componentName, componentId, typeId) {
            document.getElementById('configModalLabel').textContent = 'Configure ' + componentName;
            document.getElementById('component_id').value = componentId;
            document.getElementById('component_type_id').value = typeId;

            // Hide all config sections first
            document.querySelectorAll('.component-config-section').forEach(section => {
                section.style.display = 'none';
            });

            // Set component ID & type ID in all forms
            document.querySelectorAll('.component-id-field').forEach(field => {
                field.value = componentId;
            });
            document.querySelectorAll('.component-type-id-field').forEach(field => {
                field.value = typeId;
            });

            const navbarSection = findSectionByTitle("Navbars");
            const heroSection = findSectionByTitle("Hero Sections");
            const featuresSection = findSectionByTitle("About Us");
            const contactSection = findSectionByTitle("Contact Us");
            const footerSection = findSectionByTitle("Footers");

            if (navbarSection && typeId === navbarSection.querySelector('.component-card').dataset.type) {
                document.getElementById('navbar-config-form').style.display = 'block';
            } else if (heroSection && typeId === heroSection.querySelector('.component-card').dataset.type) {
                document.getElementById('hero-config-form').style.display = 'block';

                // 🟢 Show or hide the hero image upload
                const uploadSection = document.getElementById('heroImageUploadSection');
                if (componentId == 11 && uploadSection) {
                    uploadSection.style.display = 'block';
                } else if (uploadSection) {
                    uploadSection.style.display = 'none';
                }
            } else if (featuresSection && typeId === featuresSection.querySelector('.component-card').dataset.type) {
                document.getElementById('features-config-form').style.display = 'block';
            } else if (contactSection && typeId === contactSection.querySelector('.component-card').dataset.type) {
                document.getElementById('contact-config-form').style.display = 'block';
            } else if (footerSection && typeId === footerSection.querySelector('.component-card').dataset.type) {
                document.getElementById('footer-config-form').style.display = 'block';
            }

            const configModal = new bootstrap.Modal(document.getElementById('configModal'));
            configModal.show();
        }

        function findSectionByTitle(title) {
            const headings = Array.from(document.querySelectorAll('.section-title'));
            const heading = headings.find(element => element.textContent.includes(title));
            return heading ? heading.closest('.section-container') : null;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('heroImageUpload');
            const fileLabel = document.querySelector('.custom-file-upload');
            const filePreview = document.getElementById('heroImagePreview');
            const previewImg = document.getElementById('previewImg');
            const previewName = document.getElementById('previewName');

            if (fileInput && fileLabel) {
                fileLabel.addEventListener('click', function() {
                    fileInput.click();
                });

                fileLabel.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    fileLabel.classList.add('dragover');
                });

                fileLabel.addEventListener('dragleave', function() {
                    fileLabel.classList.remove('dragover');
                });

                fileLabel.addEventListener('drop', function(e) {
                    e.preventDefault();
                    fileLabel.classList.remove('dragover');
                    if (e.dataTransfer.files.length) {
                        fileInput.files = e.dataTransfer.files;
                        handleFileSelect(e.dataTransfer.files[0]);
                    }
                });

                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length) {
                        handleFileSelect(fileInput.files[0]);
                    }
                });

                function handleFileSelect(file) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            previewName.textContent = file.name;
                            filePreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        alert('Please select an image file');
                    }
                }
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('color-option')) {
                const colorValue = e.target.dataset.color;
                document.querySelector('input[name="navbar_color"]').value = colorValue;
                document.querySelectorAll('.color-option').forEach(option => {
                    option.classList.remove('active');
                });
                e.target.classList.add('active');
            }
        });
    </script>

</body>

</html>
