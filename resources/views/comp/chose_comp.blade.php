

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
@if($types->where('name', 'Navbars')->count() > 0)
<section class="section-container">
    <h2 class="section-title">Navbars</h2>
    <div class="row g-4">
        @foreach($allComponents->where('type_id', $types->where('name', 'Navbars')->first()->id) as $component)
            <div class="col-md-4">
                <div class="component-card">
                    <div class="preview-area">Navbar Style</div>
                    <div class="card-body">
                        <h5 class="component-title">{{ $component->name }}</h5>
                        <button class="btn btn-select" onclick="selectCard(this)"
                                data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                                data-style="{{ $component->id }}">
                            Select
                        </button>
                    </div>
                    <div class="component-form">
                        <form onsubmit="saveComponentSettings(event)"
                              data-type="{{ $types->where('name', 'Navbars')->first()->id }}"
                              data-style="{{ $component->id }}">
                            <div class="form-group">
                                <label class="form-label">Website name</label>
                                <input type="text" class="form-control"
                                       name="website_name"
                                       value="{{ $component->settings['website_name'] ?? '' }}"
                                       placeholder="Enter website name">
                            </div>
                            @for($j = 1; $j <= 4; $j++)
                                <div class="form-group">
                                    <label class="form-label">Menu Item {{ $j }}</label>
                                    <input type="text" class="form-control"
                                           name="menu_item_{{ $j }}"
                                           value="{{ $component->settings['menu_items'][$j-1] ?? '' }}"
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
@if($types->where('name', 'Hero Sections')->count() > 0)
    <section class="section-container">
        <h2 class="section-title">Hero Sections</h2>
        <div class="row g-4">
            @foreach($allComponents->where('type_id', $types->where('name', 'Hero Sections')->first()->id) as $component)
                <div class="col-md-4">
                    <div class="component-card">
                        <div class="preview-area">Hero Style</div>
                        <div class="card-body">
                            <h5 class="component-title">{{ $component->name }}</h5>
                            <button class="btn btn-select" onclick="selectCard(this)"
                                    data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                    data-style="{{ $component->id }}">
                                Select
                            </button>
                        </div>
                        <div class="component-form">
                            <form onsubmit="saveComponentSettings(event)"
                                  data-type="{{ $types->where('name', 'Hero Sections')->first()->id }}"
                                  data-style="{{ $component->id }}">
                                <div class="form-group">
                                    <label class="form-label">Hero Title</label>
                                    <input type="text" class="form-control"
                                           name="hero_title"
                                           value="{{ $component->settings['hero_title'] ?? '' }}"
                                           placeholder="Enter hero title">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Hero Subtitle</label>
                                    <input type="text" class="form-control"
                                           name="hero_subtitle"
                                           value="{{ $component->settings['hero_subtitle'] ?? '' }}"
                                           placeholder="Enter hero subtitle">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Call to Action</label>
                                    <input type="text" class="form-control"
                                           name="cta_text"
                                           value="{{ $component->settings['cta_text'] ?? '' }}"
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
@if($types->where('name', 'About us')->count() > 0)
    <section class="section-container">
        <h2 class="section-title">About Us</h2>
        <div class="row g-4">
            @foreach($allComponents->where('type_id', $types->where('name', 'About us')->first()->id) as $component)
                <div class="col-md-4">
                    <div class="component-card">
                        <div class="preview-area">About Us Style</div>
                        <div class="card-body">
                            <h5 class="component-title">{{ $component->name }}</h5>
                            <button class="btn btn-select" onclick="selectCard(this)"
                                    data-type="{{ $types->where('name', 'About us')->first()->id }}"
                                    data-style="{{ $component->id }}">
                                Select
                            </button>
                        </div>
                        <div class="component-form">
                            <form onsubmit="saveComponentSettings(event)"
                                  data-type="{{ $types->where('name', 'About us')->first()->id }}"
                                  data-style="{{ $component->id }}">
                                <div class="form-group">
                                    <label class="form-label">Section Title</label>
                                    <input type="text" class="form-control"
                                           name="section_title"
                                           value="{{ $component->settings['section_title'] ?? '' }}"
                                           placeholder="Enter section title">
                                </div>
                                @for($j = 1; $j <= 3; $j++)
                                    <div class="form-group">
                                        <label class="form-label">Feature {{ $j }} Title</label>
                                        <input type="text" class="form-control"
                                               name="feature_{{ $j }}_title"
                                               value="{{ $component->settings['features'][$j-1]['title'] ?? '' }}"
                                               placeholder="Enter feature title">
                                        <textarea class="form-control mt-2"
                                                  name="feature_{{ $j }}_description"
                                                  placeholder="Enter feature description">{{ $component->settings['features'][$j-1]['description'] ?? '' }}</textarea>
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
@if($types->where('name', 'Contact us')->count() > 0)
    <section class="section-container">
        <h2 class="section-title">Contact Us</h2>
        <div class="row g-4">
            @foreach($allComponents->where('type_id', $types->where('name', 'Contact us')->first()->id) as $component)
                <div class="col-md-4">
                    <div class="component-card">
                        <div class="preview-area">Contact Us Style</div>
                        <div class="card-body">
                            <h5 class="component-title">{{ $component->name }}</h5>
                            <button class="btn btn-select" onclick="selectCard(this)"
                                    data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                    data-style="{{ $component->id }}">
                                Select
                            </button>
                        </div>
                        <div class="component-form">
                            <form onsubmit="saveComponentSettings(event)"
                                  data-type="{{ $types->where('name', 'Contact us')->first()->id }}"
                                  data-style="{{ $component->id }}">
                                <div class="form-group">
                                    <label class="form-label">Contact Form Title</label>
                                    <input type="text" class="form-control"
                                           name="form_title"
                                           value="{{ $component->settings['form_title'] ?? '' }}"
                                           placeholder="Enter contact form title">
                                </div>
                                @for($j = 1; $j <= 3; $j++)
                                    <div class="form-group">
                                        <label class="form-label">Contact Field {{ $j }}</label>
                                        <input type="text" class="form-control"
                                               name="contact_field_{{ $j }}_label"
                                               value="{{ $component->settings['contact_fields'][$j-1]['label'] ?? '' }}"
                                               placeholder="Enter field label">
                                        <select class="form-control mt-2"
                                                name="contact_field_{{ $j }}_type">
                                            <option value="text" {{ ($component->settings['contact_fields'][$j-1]['type'] ?? '') == 'text' ? 'selected' : '' }}>Text</option>
                                            <option value="email" {{ ($component->settings['contact_fields'][$j-1]['type'] ?? '') == 'email' ? 'selected' : '' }}>Email</option>
                                            <option value="textarea" {{ ($component->settings['contact_fields'][$j-1]['type'] ?? '') == 'textarea' ? 'selected' : '' }}>Textarea</option>
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
@if($types->where('name', 'Footers')->count() > 0)
    <section class="section-container">
        <h2 class="section-title">Footers</h2>
        <div class="row g-4">
            @foreach($allComponents->where('type_id', $types->where('name', 'Footers')->first()->id) as $component)
                <div class="col-md-4">
                    <div class="component-card">
                        <div class="preview-area">Footer Style</div>
                        <div class="card-body">
                            <h5 class="component-title">{{ $component->name }}</h5>
                            <button class="btn btn-select" onclick="selectCard(this)"
                                    data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                    data-style="{{ $component->id }}">
                                Select
                            </button>
                        </div>
                        <div class="component-form">
                            <form onsubmit="saveComponentSettings(event)"
                                  data-type="{{ $types->where('name', 'Footers')->first()->id }}"
                                  data-style="{{ $component->id }}">
                                <div class="form-group">
                                    <label class="form-label">Copyright Text</label>
                                    <input type="text" class="form-control"
                                           name="copyright_text"
                                           value="{{ $component->settings['copyright_text'] ?? '' }}"
                                           placeholder="Enter copyright text">
                                </div>
                                @for($j = 1; $j <= 3; $j++)
                                    <div class="form-group">
                                        <label class="form-label">Footer Link {{ $j }}</label>
                                        <input type="text" class="form-control"
                                               name="footer_link_{{ $j }}_text"
                                               value="{{ $component->settings['footer_links'][$j-1]['text'] ?? '' }}"
                                               placeholder="Enter link text">
                                        <input type="text" class="form-control mt-2"
                                               name="footer_link_{{ $j }}_url"
                                               value="{{ $component->settings['footer_links'][$j-1]['url'] ?? '' }}"
                                               placeholder="Enter link URL">
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

      function saveComponentSettings(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    const componentData = {};
    
    // Collect all form inputs
    for (let [key, value] of formData.entries()) {
        // Handle complex nested structures
        if (key.startsWith('menu_item_')) {
            componentData.menu_items = componentData.menu_items || [];
            componentData.menu_items.push(value);
        } else if (key.startsWith('feature_')) {
            if (key.includes('_title')) {
                const featureIndex = key.split('_')[1] - 1;
                componentData.features = componentData.features || [];
                componentData.features[featureIndex] = componentData.features[featureIndex] || {};
                componentData.features[featureIndex].title = value;
            } else if (key.includes('_description')) {
                const featureIndex = key.split('_')[1] - 1;
                componentData.features = componentData.features || [];
                componentData.features[featureIndex] = componentData.features[featureIndex] || {};
                componentData.features[featureIndex].description = value;
            }
        } else if (key.startsWith('contact_field_')) {
            if (key.includes('_label')) {
                const fieldIndex = key.split('_')[2] - 1;
                componentData.contact_fields = componentData.contact_fields || [];
                componentData.contact_fields[fieldIndex] = componentData.contact_fields[fieldIndex] || {};
                componentData.contact_fields[fieldIndex].label = value;
            } else if (key.includes('_type')) {
                const fieldIndex = key.split('_')[2] - 1;
                componentData.contact_fields = componentData.contact_fields || [];
                componentData.contact_fields[fieldIndex] = componentData.contact_fields[fieldIndex] || {};
                componentData.contact_fields[fieldIndex].type = value;
            }
        } else if (key.startsWith('footer_link_')) {
            if (key.includes('_text')) {
                const linkIndex = key.split('_')[2] - 1;
                componentData.footer_links = componentData.footer_links || [];
                componentData.footer_links[linkIndex] = componentData.footer_links[linkIndex] || {};
                componentData.footer_links[linkIndex].text = value;
            } else if (key.includes('_url')) {
                const linkIndex = key.split('_')[2] - 1;
                componentData.footer_links = componentData.footer_links || [];
                componentData.footer_links[linkIndex] = componentData.footer_links[linkIndex] || {};
                componentData.footer_links[linkIndex].url = value;
            }
        } else {
            // Handle other individual fields
            componentData[key] = value;
        }
    }
    
    // Get component ID from form data attributes
    const componentId = form.dataset.style;
    
    // Send data to backend via AJAX
    fetch('/save-component-content', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            component_id: componentId,
            content: componentData
        })
    })
    .then(response => response.json())
    .then(data => {
        alert('Component settings saved successfully!');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to save component settings.');
    });
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