<!-- Styles spécifiques -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
@endpush

<!-- Scripts spécifiques -->
@push('scripts')
    <script src="{{ asset('js/formulaire.js') }}"></script>
@endpush
@auth
    <x-master title='InputUser'>
        <main>
            <section class="contact">
                <div class="container">
                    <div class="left">
                        <div class="form-wrapper">
                            <div class="contact-heading">
                                <h2>Let's work inventing together<span>.</span></h2>
                                <!-- <p class="text">
                                      Or reach us via :
                                      <a href="mailto:Publius@mil.com">Publius@mil.com</a>
                                    </p> -->
                            </div>
                            <form method="POST" action="{{ route('inputUser') }}" class="contact-form">

                                @csrf
                                <div class="input-wrap w-100">
                                    <input class="contact-input" autocomplete="off" name="siteName" type="text"
                                        placeholder="Site Name" required />

                                    <i class="icon fa-solid fa-globe"></i>
                                </div>

                                <div class="input-wrap textare w-100">
                                    <textarea name="description" auto-complete="off" class="contact-input" placeholder="Description" required></textarea>

                                    <i class="icon fa-solid fa-inbox"></i>
                                </div>

                                <div class="input-wrap w-100">
                                    <input class="contact-input" name="color1" type="color" required />
                                    <label>Color 1</label>
                                    <i class="icon fa-solid fa-palette"></i>
                                </div>

                                <div class="input-wrap w-100">
                                    <input class="contact-input" autocomplete="off" name="color2" type="color"
                                        required />
                                    <label>Color 2</label>
                                    <i class="icon fa-solid fa-palette"></i>
                                </div>

                                <div class="input-wrap w-100">
                                    <input class="contact-input" autocomplete="off" name="color3" type="color"
                                        required />
                                    <label>Color 3</label>
                                    <i class="icon fa-solid fa-palette"></i>
                                </div>

                                <div class="contact-buttons input-wrap">
                                    <button class="btn upload">
                                        <span>
                                            <i class="fa-solid fa-paperclip"></i> Add Logo
                                        </span>
                                        <input type="file" name="logoUrl" required />
                                    </button>
                                    <button class="btn upload">
                                        <span>
                                            <i class="fa-solid fa-paperclip"></i> Add Icons
                                        </span>
                                        <input type="file" name="faveIcon" required />
                                    </button>
                                </div>

                                <div class="contact-buttons">

                                    <input type="submit" value="Validate" class="btn" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="image-wrapper">
                            <img src="assets/img/img.jpg" class="img" />
                            <div class="wave-wrap">
                                <svg class="wave" viewBox="0 0 783 1536" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path id="wave"
                                        d="M236.705 1356.18C200.542 1483.72 64.5004 1528.54 1 1535V1H770.538C793.858 63.1213 797.23 196.197 624.165 231.531C407.833 275.698 274.374 331.715 450.884 568.709C627.393 805.704 510.079 815.399 347.561 939.282C185.043 1063.17 281.908 1196.74 236.705 1356.18Z" />
                                </svg>
                            </div>

                            <svg class="dashed-wave" viewBox="0 0 345 877" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="dashed-wave"
                                    d="M0.5 876C25.6667 836.167 73.2 739.8 62 673C48 589.5 35.5 499.5 125.5 462C215.5 424.5 150 365 87 333.5C24 302 44 237.5 125.5 213.5C207 189.5 307 138.5 246 87C185 35.5 297 1 344.5 1" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </x-master>

@endauth
