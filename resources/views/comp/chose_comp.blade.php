

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
        @foreach($types as $type)
            <section class="section-container">
                <h2 class="section-title">{{ $type->name }}</h2>
                <div class="row g-4">
                    {{-- You can adjust the number of style variations per type --}}
                    @for($i = 1; $i <= 3; $i++)
                        <div class="col-md-4">
                            <div class="component-card">
                                <div class="preview-area">{{ $type->name }} Style {{ $i }}</div>
                                <div class="card-body">
                                    <h5 class="component-title">
                                        @if($i == 1)
                                            Modern {{ $type->name }}
                                        @elseif($i == 2)
                                            Minimal {{ $type->name }}
                                        @else
                                            Feature-Rich {{ $type->name }}
                                        @endif
                                    </h5>
                                    <button class="btn btn-select" onclick="selectCard(this)" data-type="{{ $type->id }}" data-style="{{ $i }}">Select</button>
                                </div>
                                
                                @if(strtolower($type->name) === 'navigation')
                                <div class="component-form">
                                    <form onsubmit="saveComponentSettings(event)" data-type="{{ $type->id }}" data-style="{{ $i }}">
                                        <div class="form-group">
                                            <label class="form-label">Website name</label>
                                            <input type="text" class="form-control" name="website_name" placeholder="">
                                        </div>
                                        @for($j = 1; $j <= 4; $j++)
                                            <div class="form-group">
                                                <label class="form-label">Menu Item {{ $j }}</label>
                                                <input type="text" class="form-control" name="menu_item_{{ $j }}" placeholder="Home, About, Contact">
                                            </div>
                                        @endfor
                                        <button type="submit" class="btn btn-save">Save Settings</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            </section>
        @endforeach
    </div>

  <script>
    function selectCard(button) {
      const card = button.closest('.component-card');
      const section = card.closest('.section-container');
      const cards = section.querySelectorAll('.component-card');
      const forms = section.querySelectorAll('.component-form');
      
      // Remove selected class from all cards and hide all forms
      cards.forEach(c => c.classList.remove('selected-card'));
      forms.forEach(f => f.classList.remove('active'));
      
      // Add selected class to clicked card and show its form
      card.classList.add('selected-card');
      const form = card.querySelector('.component-form');
      if (form) {
        form.classList.add('active');
      }
    }

    function saveComponentSettings(event) {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);
      const settings = Object.fromEntries(formData.entries());
      
      // Here you can handle the form data as needed
      console.log('Component settings:', settings);
      
      // Optional: Show success message
      alert('Settings saved successfully!');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>