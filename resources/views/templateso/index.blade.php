<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Choix du Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .template-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
        .preview-container {
            height: 300px;
            overflow: hidden;
            border-bottom: 1px solid #eee;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4 text-center">Choisissez un template</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($templates as $template)
            <div class="col">
                <div class="card template-card h-100">
                    <div class="preview-container">
                        <iframe
                            src="{{ $template['url'] }}"
                            class="w-100 h-100"
                            style="border:0;"
                            loading="lazy"
                            title="Aperçu de {{ $template['name'] }}">
                        </iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-truncate">
                            {{ pathinfo($template['name'], PATHINFO_FILENAME) }}
                        </h5>
                    </div>
                    <div class="card-footer bg-transparent">
                        <form action="{{ route('templateso.choose') }}" method="POST">
                            @csrf
                            <input type="hidden" name="templateName" value="{{ $template['name'] }}">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-check2-circle me-2"></i>Sélectionner
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
