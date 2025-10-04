<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-dark: #2563eb;
            --secondary-color: #dbeafe;
            --text-color: #1f2937;
            --light-text: #6b7280;
            --border-radius: 16px;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --card-bg: #ffffff;
            --hover-lift: translateY(-2px);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .form-section {
            flex: 1;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
        }
        
        .image-section {
            flex: 1;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .image-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 6s ease-in-out infinite;
        }
        
        .image-section::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .form-container {
            max-width: 520px;
            margin: 0 auto;
            width: 100%;
        }
        
        .form-header {
            margin-bottom: 2.5rem;
            animation: slideDown 0.6s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-header p {
            color: var(--light-text);
            font-size: 0.95rem;
        }
        
        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out backwards;
        }
        
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card:hover {
            transform: var(--hover-lift);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .step-indicator {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 0.75rem;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
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
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background-color: white;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }
        
        textarea.input-field {
            min-height: 100px;
            resize: vertical;
        }
        
        .color-pickers {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
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
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 0.75rem;
            cursor: pointer;
            border: 3px solid white;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .color-circle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
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
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .file-button {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .file-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .file-button:hover {
            border-color: var(--primary-color);
            transform: var(--hover-lift);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .file-button:hover::before {
            opacity: 1;
        }
        
        .file-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .file-button:hover .file-icon {
            transform: scale(1.1);
        }
        
        .file-button span {
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }
        
        .file-format {
            font-size: 0.75rem;
            color: var(--light-text);
            margin-top: 0.25rem;
            position: relative;
            z-index: 1;
        }
        
        .submit-button {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1.5rem;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }
        
        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }
        
        .submit-button:hover::before {
            left: 100%;
        }
        
        .website-illustration {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.2));
            animation: illustrationFloat 4s ease-in-out infinite;
        }
        
        @keyframes illustrationFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        img[id$="Preview"] {
            max-width: 100px;
            margin-top: 0.75rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 2px solid white;
        }
        
        @media (max-width: 1024px) {
            .container {
                flex-direction: column;
            }
            
            .image-section {
                display: none;
            }
            
            .form-section {
                padding: 2rem 1.5rem;
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
        // Color previews with initial values
        document.getElementById('colorPreview1').style.backgroundColor = '#2563eb';
        document.getElementById('colorPreview2').style.backgroundColor = '#e0f2fe';
        document.getElementById('colorPreview3').style.backgroundColor = '#1f2937';
        
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