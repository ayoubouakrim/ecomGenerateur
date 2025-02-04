{{--<!-- Styles spécifiques -->--}}
{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('css/pageTemplates.css') }}">--}}
{{--@endpush--}}

{{--<!-- Scripts spécifiques -->--}}
{{--@push('scripts')--}}
{{--    <script src="{{ asset('js/templateso.js') }}"></script>--}}
{{--@endpush--}}

{{--<x-master title='templateso'>--}}


{{--    <section class="cards-wrapper">--}}
{{--        <div class="card-grid-space">--}}

{{--            <div class="num">Side bar template</div>--}}
{{--            <div class="card">--}}
{{--                <a href="javascript:void(0)"--}}
{{--                    onclick="showTemplateModal(2, 'path of side bar template')">--}}
{{--                    <video autoplay muted loop class="card-video">--}}
{{--                        <source src="assets/templateso/bootstrap-4-sidebar-menu.mp4" type="video/mp4">--}}
{{--                        Your browser does not support the video tag.--}}
{{--                    </video>--}}
{{--                    <div class="overlay-text">Template Side Bar</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="card-grid-space">--}}

{{--            <div class="num">Simple Template</div>--}}
{{--            <div class="card">--}}
{{--                <a href="javascript:void(0)" onclick="showTemplateModal(1, 'path of simple template')">--}}
{{--                    <video autoplay muted loop class="card-video">--}}
{{--                        <source src="assets/templateso/template_without_sidebar.mp4" type="video/mp4">--}}
{{--                        Your browser does not support the video tag.--}}
{{--                    </video>--}}
{{--                    <div class="overlay-text">Simple template</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}


{{--    <!-- Modal de confirmation -->--}}
{{--    <div class="modal" id="confirmTemplateModal" tabindex="-1" aria-labelledby="confirmTemplateLabel"--}}
{{--        aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="confirmTemplateLabel">Confirmer le choix du template</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    Voulez-vous confirmer le choix du template <strong id="templateName"></strong> ?--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <form id="templateForm" action="{{ route('save.template') }}" method="POST">--}}
{{--                        @csrf <!-- Token CSRF pour la sécurité -->--}}
{{--                        <input type="hidden" id="templateNameInput" name="name">--}}
{{--                        <input type="hidden" id="templateFilepathInput" name="filePath">--}}
{{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"--}}
{{--                            onclick="closeModal()">Annuler</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Confirmer</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</x-master>--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>temp</title>

</head>
<body>

    <h1>Choisissez un template</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <ul>
        @foreach($templates as $template)
            <li>
                <form action="{{ route('templateso.choose') }}" method="POST">
                    @csrf
                    <input type="hidden" name="templateName" value="{{ $template }}">
                    <button type="submit">{{ $template }}</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
