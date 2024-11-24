<!-- Styles spécifiques -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pageTemplates.css') }}">
@endpush

<!-- Scripts spécifiques -->
@push('scripts')
@endpush

<x-master title='templates'>


    <section class="cards-wrapper">


        <div class="card-grid-space">
            <div class="num">Side bar template</div>
            <div class="card">
                <a  href="https://codetheweb.blog/2017/10/09/basic-types-of-html-tags/"
                   style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/basic-types-of-html-tags/cover.jpg')">

                    <!-- Vidéo ajoutée ici -->
                    <video autoplay muted loop class="card-video">
                        <source src="assets/templates/bootstrap-4-sidebar-menu.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <!-- Texte caché qui apparaît au survol -->
                    <div class="overlay-text">Template Side Bar</div>
                   {{-- <div>
                        <h1>Template Side Bar</h1>
                        <p>The syntax of a language is how it works. How to actually write it. Learn HTML syntax…</p>
                    </div>--}}
                </a>
            </div>

        </div>
        <div class="card-grid-space">
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
                    {{-- <div>
                         <h1>Template Side Bar</h1>
                         <p>The syntax of a language is how it works. How to actually write it. Learn HTML syntax…</p>
                     </div>--}}
                </a>
            </div>

        </div>


        <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
    </section>

</x-master>
