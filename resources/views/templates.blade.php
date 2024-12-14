<!-- Styles spécifiques -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pageTemplates.css') }}">
@endpush

<!-- Scripts spécifiques -->
@push('scripts')
    <script src="{{ asset('js/templates.js') }}"></script>

@endpush

<x-master title='templates'>


    <section class="cards-wrapper">
        <div class="card-grid-space">

        <div class="num">Side bar template</div>
            <div class="card">
                <a href="javascript:void(0)" onclick="showTemplateModal('Side bar template', 'path of side bar template')">
                    <video autoplay muted loop class="card-video">
                        <source src="assets/templates/bootstrap-4-sidebar-menu.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="overlay-text">Template Side Bar</div>
                </a>
            </div>

        </div>
        <div class="card-grid-space">

            <div class="num">Simple Template</div>
            <div class="card">
                <a href="javascript:void(0)" onclick="showTemplateModal('Simple template', 'path of simple template')">
                    <video autoplay muted loop class="card-video">
                        <source src="assets/templates/template_without_sidebar.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="overlay-text">Simple template</div>
                </a>
            </div>

        </div>
       {{-- <div class="card-grid-space">
            <div class="num">Simple Template</div>
            <div class="card">
                <a  href="https://codetheweb.blog/2017/10/09/basic-types-of-html-tags/"
                    style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/basic-types-of-html-tags/cover.jpg')">

                    <!-- Vidéo ajoutée ici -->
                    <video autoplay muted loop class="card-video">
                        <source src="assets/templates/template_without_sidebar.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <!-- Texte caché qui apparaît au survol -->
                    <div class="overlay-text">Template with out Side Bar</div>
                    --}}{{-- <div>
                         <h1>Template Side Bar</h1>
                         <p>The syntax of a language is how it works. How to actually write it. Learn HTML syntax…</p>
                     </div>--}}{{--
                </a>
            </div>

        </div>--}}


        <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
    </section>


    <!-- Modal de confirmation -->
    <div class="modal" id="confirmTemplateModal" tabindex="-1" aria-labelledby="confirmTemplateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmTemplateLabel">Confirmer le choix du template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous confirmer le choix du template <strong id="templateName"></strong> ?
                </div>
                <div class="modal-footer">
                    <form id="templateForm" action="{{ route('save.template') }}" method="POST">
                        @csrf <!-- Token CSRF pour la sécurité -->
                        <input type="hidden" id="templateNameInput" name="name">
                        <input type="hidden" id="templateFilepathInput" name="filePath">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-master>
