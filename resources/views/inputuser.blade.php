<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #e0f2fe;
            --text-color: #1f2937;
            --light-text: #6b7280;
            --border-radius: 12px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            --card-bg: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: #f3f4f6;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .form-section {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .image-section {
            flex: 1;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .form-container {
            max-width: 520px;
            margin: 0 auto;
            width: 100%;
        }
        
        .form-header {
            margin-bottom: 2rem;
        }
        
        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }
        
        .form-header p {
            color: var(--light-text);
            font-size: 0.95rem;
        }
        
        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
        }
        
        .step-indicator {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .step-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            margin-right: 0.75rem;
        }
        
        .step-title {
            font-weight: 600;
            font-size: 1rem;
            color: var(--text-color);
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-color);
        }
        
        .input-help {
            font-size: 0.8rem;
            color: var(--light-text);
            margin-bottom: 0.5rem;
        }
        
        .input-field {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        textarea.input-field {
            min-height: 100px;
            resize: vertical;
        }
        
        .color-pickers {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .color-picker-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .color-help {
            font-size: 0.75rem;
            color: var(--light-text);
            margin-top: 0.5rem;
            max-width: 120px;
        }
        
        .color-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 0.5rem;
            cursor: pointer;
            border: 2px solid white;
            position: relative;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .color-circle input[type="color"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .file-button {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 1rem;
            background-color: #f9fafb;
            border: 1px dashed #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .file-button:hover {
            border-color: var(--primary-color);
        }
        
        .file-icon {
            width: 48px;
            height: 48px;
            background-color: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .file-button span {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .file-format {
            font-size: 0.75rem;
            color: var(--light-text);
            margin-top: 0.25rem;
        }
        
        .submit-button {
            width: 100%;
            padding: 0.875rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .submit-button:hover {
            background-color: #1d4ed8;
        }
        
        .website-illustration {
            max-width: 100%;
            height: auto;
        }
        
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
            }
            
            .image-section {
                display: none;
            }
        }
    </style>
</head>

<body>
    @include('layout.nav')
    <div class="container">
        <div class="form-section">
            <div class="form-container">
                <div class="form-header">
                    <h1>Let's start creating your website</h1>
                    <p>You are about to bring your online presence to life. Fill in the information below to personalize
                        your website.</p>
                </div>

                <form method="POST" action="{{ route('inputUser') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Basic Information -->
                    <div class="card">
                        <div class="step-indicator">
                            <div class="step-circle">1</div>
                            <div class="step-title">Basic Information</div>
                        </div>
                        <div class="form-group">
                            <label class="input-label" for="siteName">Site Name</label>
                            <input class="input-field" id="siteName" name="siteName" type="text"
                                placeholder="Enter your website name" required>
                        </div>
                        <div class="form-group">
                            <label class="input-label" for="description">Description</label>
                            <textarea class="input-field" id="description" name="description" placeholder="Tell us about your website" required></textarea>
                        </div>
                    </div>

                    <!-- Color Theme -->
                    <div class="card">
                        <div class="step-indicator">
                            <div class="step-circle">2</div>
                            <div class="step-title">Color Theme</div>
                        </div>
                        <div class="color-pickers">
                            <div class="color-picker-item">
                                <div class="color-circle" id="colorPreview1">
                                    <input type="color" id="color1" name="color1" value="#2563eb" required>
                                </div>
                                <span class="input-label">Primary color</span>
                                <span class="color-help">NavBar and Footer</span>
                            </div>
                            <div class="color-picker-item">
                                <div class="color-circle" id="colorPreview2">
                                    <input type="color" id="color2" name="color2" value="#e0f2fe" required>
                                </div>
                                <span class="input-label">Secondary color</span>
                                <span class="color-help">Hero section & features</span>
                            </div>
                            <div class="color-picker-item">
                                <div class="color-circle" id="colorPreview3">
                                    <input type="color" id="color3" name="color3" value="#1f2937" required>
                                </div>
                                <span class="input-label">Text color</span>
                                <span class="color-help">Interface text</span>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Assets -->
                    <div class="card">
                        <div class="step-indicator">
                            <div class="step-circle">3</div>
                            <div class="step-title">Brand Assets</div>
                        </div>
                        <div class="file-buttons">
                            <div style="flex: 1;">
                                <label class="file-button">
                                    <div class="file-icon"><i class="fa-solid fa-image"></i></div>
                                    <span>Add Logo</span>
                                    <span class="file-format">PNG, JPG, SVG (Max 2MB)</span>
                                    <input id="logoInput" type="file" name="logoUrl" accept="image/*" required style="display: none;">
                                </label>
                                <img id="logoPreview" style="max-width: 100px; margin-top: 0.5rem; display: none;" />
                            </div>
                            <div style="flex: 1;">
                                <label class="file-button">
                                    <div class="file-icon"><i class="fa-solid fa-star"></i></div>
                                    <span>Add Icon</span>
                                    <span class="file-format">Favicon for your site</span>
                                    <input id="iconInput" type="file" name="faveIcon" accept="image/*" required style="display: none;">
                                </label>
                                <img id="iconPreview" style="max-width: 100px; margin-top: 0.5rem; display: none;" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Validate and Continue</button>
                </form>
            </div>
        </div>

        <div class="image-section">
            <svg class="website-illustration" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
                <!-- Background shapes -->
                <rect x="100" y="50" width="600" height="400" rx="20" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                
                <!-- Header -->
                <rect x="100" y="50" width="600" height="60" rx="20" fill="#2563eb"/>
                <circle cx="140" cy="80" r="15" fill="#ffffff" fill-opacity="0.8"/>
                <rect x="170" y="75" width="80" height="10" rx="5" fill="#ffffff" fill-opacity="0.8"/>
                <rect x="270" y="75" width="60" height="10" rx="5" fill="#ffffff" fill-opacity="0.5"/>
                <rect x="350" y="75" width="60" height="10" rx="5" fill="#ffffff" fill-opacity="0.5"/>
                <rect x="430" y="75" width="60" height="10" rx="5" fill="#ffffff" fill-opacity="0.5"/>
                
                <!-- Hero section -->
                <rect x="130" y="140" width="540" height="180" rx="10" fill="#e0f2fe"/>
                <rect x="160" y="180" width="240" height="20" rx="5" fill="#1f2937"/>
                <rect x="160" y="210" width="320" height="10" rx="5" fill="#6b7280"/>
                <rect x="160" y="230" width="320" height="10" rx="5" fill="#6b7280"/>
                <rect x="160" y="260" width="120" height="35" rx="5" fill="#2563eb"/>
                <rect x="170" y="272" width="100" height="10" rx="5" fill="#ffffff"/>
                
                <!-- Hero image -->
                <rect x="500" y="160" width="140" height="140" rx="10" fill="#bfdbfe"/>
                <circle cx="570" cy="230" r="30" fill="#ffffff"/>
                <path d="M550 210 L590 250" stroke="#ffffff" stroke-width="5"/>
                <path d="M550 250 L590 210" stroke="#ffffff" stroke-width="5"/>
                
                <!-- Content section -->
                <rect x="130" y="350" width="170" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                <rect x="150" y="370" width="130" height="10" rx="5" fill="#1f2937"/>
                <rect x="150" y="390" width="100" height="8" rx="4" fill="#6b7280"/>
                
                <rect x="315" y="350" width="170" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                <rect x="335" y="370" width="130" height="10" rx="5" fill="#1f2937"/>
                <rect x="335" y="390" width="100" height="8" rx="4" fill="#6b7280"/>
                
                <rect x="500" y="350" width="170" height="70" rx="10" fill="#ffffff" stroke="#e5e7eb" stroke-width="2"/>
                <rect x="520" y="370" width="130" height="10" rx="5" fill="#1f2937"/>
                <rect x="520" y="390" width="100" height="8" rx="4" fill="#6b7280"/>
                
                <!-- Footer -->
                <rect x="100" y="450" width="600" height="60" rx="20" fill="#2563eb"/>
                <rect x="130" y="475" width="80" height="10" rx="5" fill="#ffffff" fill-opacity="0.8"/>
                <rect x="550" y="475" width="120" height="10" rx="5" fill="#ffffff" fill-opacity="0.5"/>
                
                <!-- Decorative elements -->
                <circle cx="650" cy="100" r="120" fill="#bfdbfe" fill-opacity="0.3"/>
                <circle cx="200" cy="500" r="80" fill="#bfdbfe" fill-opacity="0.3"/>
            </svg>
        </div>
    </div>

    <script>
        // Color previews
        document.getElementById('color1').addEventListener('input', e => {
            document.getElementById('colorPreview1').style.backgroundColor = e.target.value;
        });
        document.getElementById('color2').addEventListener('input', e => {
            document.getElementById('colorPreview2').style.backgroundColor = e.target.value;
        });
        document.getElementById('color3').addEventListener('input', e => {
            document.getElementById('colorPreview3').style.backgroundColor = e.target.value;
        });
    
        // File preview logic
        const logoInput = document.getElementById('logoInput');
        const iconInput = document.getElementById('iconInput');
    
        logoInput.addEventListener('change', function () {
            previewImage(logoInput, 'logoPreview');
        });
    
        iconInput.addEventListener('change', function () {
            previewImage(iconInput, 'iconPreview');
        });
    
        function previewImage(inputElement, imgId) {
            const file = inputElement.files[0];
            const preview = document.getElementById(imgId);
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
</body>

</html>
