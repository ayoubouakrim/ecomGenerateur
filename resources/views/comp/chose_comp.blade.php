<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Choose Components</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #4f46e5;
            --accent-color: #818cf8;
            --background-color: #f8fafc;
            --card-background: #ffffff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-primary);
            font-family: system-ui, -apple-system, sans-serif;
        }

        .main-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem 0;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .section-container {
            background: var(--card-background);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: transform 0.2s;
        }

        .section-container:hover {
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 24px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .component-card {
            background: var(--card-background);
            border: 2px solid transparent;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.3s;
        }

        .component-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        .preview-area {
            background: #f1f5f9;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .img-nav-fluid {
            max-width: 100%;
            height: 50%;
        }

        .img-contact-fluid {
            max-width: 100%;
            height: 100%;
        }

        .card-body {
            padding: 1.25rem;
        }

        .component-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
        }

        .btn-select {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-select:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-1px);
        }

        .selected-card {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--accent-color);
        }

        .selected-card .btn-select {
            background-color: var(--secondary-color);
        }

        .generate-button {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 0.75rem;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s;
            margin-top: 2rem;
        }

        .generate-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
        }

        @media (max-width: 768px) {
            .section-container {
                padding: 1.5rem;
            }

            .component-card {
                margin-bottom: 1.5rem;
            }
        }

        .component-form {
            display: none;
            background: #f8fafc;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-top: 1rem;
            border: 1px solid #e2e8f0;
        }

        .component-form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.1);
        }

        .btn-save {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }



        .btn-save:hover {
            background-color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header class="page-header">
            <h1 class="page-title">Website Component Builder</h1>
            <p class="page-subtitle">Select components to create your perfect website</p>
        </header>

        {{-- Navbars Section --}}
        @if ($types->where('name', 'Navbars')->count() > 0)
            <section class="section-container">
                <h2 class="section-title">Navbars</h2>
                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Navbars')->first()->id) as $component)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area"><img src=" {{ $component->img_path }} " alt="Navbar Preview"
                                        class="img-nav-fluid"></div>
                                <div class="card-body">
                                    <h5 class="component-title"> {{ $component->name }} </h5>
                                    <button class="btn btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <div class="component-form">
                                    <form method="POST" action=" {{ route('save.content') }} "
                                        data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        @csrf
                                        <input type="hidden" name="component_id" value="{{ $component->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Website name</label>
                                            <input type="text" class="form-control" name="website_name"
                                                value="{{ $component->settings['website_name'] ?? '' }}"
                                                placeholder="Enter website name">
                                        </div>
                                        @for ($j = 1; $j <= 4; $j++)
                                            <div class="form-group">
                                                <label class="form-label">Menu Item {{ $j }}</label>
                                                <input type="text" class="form-control"
                                                    name="menu_item_{{ $j }}"
                                                    placeholder="Home, About, Contact">
                                            </div>
                                        @endfor
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
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
                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Hero Sections')->first()->id) as $component)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area"><img src=" {{ $component->img_path }} " alt="Hero Preview"
                                        class="img-fluid"></div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <div class="component-form">
                                    <form method="POST" action="{{ route('save.content') }}"
                                        data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                        data-style="{{ $component->id }}">

                                        @csrf
                                        <input type="hidden" name="component_id" value="{{ $component->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Hero Title</label>
                                            <input type="text" class="form-control" name="hero_title"
                                                placeholder="Enter hero title">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Hero Subtitle</label>
                                            <input type="text" class="form-control" name="hero_subtitle"
                                                placeholder="Enter hero subtitle">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Call to Action</label>
                                            <input type="text" class="form-control" name="cta_text"
                                                placeholder="Enter CTA text">
                                        </div>
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
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
                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'About us')->first()->id) as $component)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area"><img src=" {{ $component->img_path }} "
                                        alt="Features Preview" class="img-fluid"></div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'About us')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <div class="component-form">
                                    <form method="POST" action="{{ route('save.content') }}"
                                        data-type="{{ $types->where('name', 'About us')->first()->id }}"
                                        data-style="{{ $component->id }}">

                                        @csrf
                                        <input type="hidden" name="component_id" value="{{ $component->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Section Title</label>
                                            <input type="text" class="form-control" name="section_title"
                                                value="{{ $component->settings['section_title'] ?? '' }}"
                                                placeholder="Enter section title">
                                        </div>
                                        @for ($j = 1; $j <= 3; $j++)
                                            <div class="form-group">
                                                <label class="form-label">Feature {{ $j }} Title</label>
                                                <input type="text" class="form-control"
                                                    name="feature_{{ $j }}_title"
                                                    placeholder="Enter feature title">
                                                <textarea class="form-control mt-2" name="feature_{{ $j }}_description"
                                                    placeholder="Enter feature description"></textarea>
                                            </div>
                                        @endfor
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
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
                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Contact us')->first()->id) as $component)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area"><img src=" {{ $component->img_path }} "
                                        alt="Contact Preview" class="img-contact-fluid"></div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <div class="component-form">
                                    <form method="POST" action="{{ route('save.content') }}"
                                        data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                        data-style="{{ $component->id }}">

                                        @csrf
                                        <input type="hidden" name="component_id" value="{{ $component->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Contact Form Title</label>
                                            <input type="text" class="form-control" name="form_title"
                                                placeholder="Enter contact form title">
                                        </div>
                                        @for ($j = 1; $j <= 3; $j++)
                                            <div class="form-group">
                                                <label class="form-label">Contact Field {{ $j }}</label>
                                                <input type="text" class="form-control"
                                                    name="contact_field_{{ $j }}_label"
                                                    placeholder="Enter field label">
                                                <select class="form-control mt-2"
                                                    name="contact_field_{{ $j }}_type">
                                                    <option value="text"
                                                        {{ ($component->settings['contact_fields'][$j - 1]['type'] ?? '') == 'text' ? 'selected' : '' }}>
                                                        Text</option>
                                                    <option value="email"
                                                        {{ ($component->settings['contact_fields'][$j - 1]['type'] ?? '') == 'email' ? 'selected' : '' }}>
                                                        Email</option>
                                                    <option value="textarea"
                                                        {{ ($component->settings['contact_fields'][$j - 1]['type'] ?? '') == 'textarea' ? 'selected' : '' }}>
                                                        Textarea</option>
                                                </select>
                                            </div>
                                        @endfor
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
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
                <div class="row g-4">
                    @foreach ($allComponents->where('type_id', $types->where('name', 'Footers')->first()->id) as $component)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area"><img src=" {{ $component->img_path }} "
                                        alt="Footer Preview" class="img-fluid"></div>
                                <div class="card-body">
                                    <h5 class="component-title">{{ $component->name }}</h5>
                                    <button class="btn btn-select" onclick="selectCard(this)"
                                        data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                        data-style="{{ $component->id }}">
                                        Select
                                    </button>
                                </div>
                                <div class="component-form">
                                    <form method="POST" action="{{ route('save.content') }}"
                                        data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                        data-style="{{ $component->id }}">

                                        @csrf
                                        <input type="hidden" name="component_id" value="{{ $component->id }}">
                                        <div class="form-group">
                                            <label class="form-label">Copyright Text</label>
                                            <input type="text" class="form-control" name="copyright_text"
                                                placeholder="Enter copyright text">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Social media Links</label>
                                            <input type="text" class="form-control mt-2" name="facebook_link_url"
                                                placeholder="facebook_link_url">
                                            <input type="text" class="form-control mt-2" name="youtube_link_url"
                                                placeholder="youtube_link_url">
                                            <input type="text" class="form-control mt-2" name="x_link_url"
                                                placeholder="x_link_url">
                                        </div>

                                        @for ($j = 1; $j <= 3; $j++)
                                            <div class="form-group">
                                                <label class="form-label">Our Products {{ $j }}</label>
                                                <input type="text" class="form-control"
                                                    name="product_name_{{ $j }}"
                                                    placeholder="Product name">
                                                <input type="text" class="form-control mt-2"
                                                    name="product_link_{{ $j }}_url"
                                                    placeholder="Product URL">
                                            </div>
                                        @endfor
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="section-container">
            <button onclick="window.location='{{ route('generate') }}'" class="btn btn-save">next</button>
        </section>
    </div>

    <script>
        // Function to handle component card selection
        function selectCard(button) {
            const card = button.closest('.component-card');
            const section = card.closest('.section-container');
            const cards = section.querySelectorAll('.component-card');
            const forms = section.querySelectorAll('.component-form');

            // Remove selected class from all cards and hide all forms
            cards.forEach(c => {
                c.classList.remove('selected-card');
                const btn = c.querySelector('.btn-select');
                if (btn) btn.textContent = 'Select';
            });
            forms.forEach(f => f.classList.remove('active'));

            // Add selected class to clicked card and show its form
            card.classList.add('selected-card');
            button.textContent = 'Selected';

            const form = card.querySelector('.component-form');
            if (form) {
                form.classList.add('active');
            }

            // Store selected component ID in localStorage
            localStorage.setItem('selectedComponentId', button.dataset.style);
            localStorage.setItem('selectedTypeId', button.dataset.type);
        }




        // Function to restore selected state on page load
        function restoreSelectedState() {
            const componentId = localStorage.getItem('selectedComponentId');
            const typeId = localStorage.getItem('selectedTypeId');

            if (componentId && typeId) {
                const button = document.querySelector(`button[data-type="${typeId}"][data-style="${componentId}"]`);
                if (button) {
                    selectCard(button);
                }
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', () => {
            restoreSelectedState();

            // Optional: Add form validation
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', (e) => {
                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
