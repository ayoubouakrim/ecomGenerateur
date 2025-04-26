<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a56d4;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --dark: #2b2d42;
            --light: #f8f9fa;
            --gray: #e9ecef;
            --border: #dee2e6;
            --shadow: rgba(0, 0, 0, 0.1);
            --card-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
            --radius: 12px;
            --radius-sm: 6px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.5;
            background-color: #f5f7fa;
            color: var(--dark);
            position: relative;
            min-height: 100vh;
            overflow-x: hidden;
            font-size: 0.95rem;
        }
        
        /* Enhanced Background Gradient Effect */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.12) 0%, rgba(76, 201, 240, 0.07) 100%);
            z-index: -1;
            clip-path: ellipse(95% 60% at 50% 0%);
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 4rem 0 6rem;
            text-align: center;
            margin-bottom: -4rem;
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -10%;
            width: 120%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(45deg);
        }
        
        /* Added animated background elements */
        .header-particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
            background: white;
        }
        
        .particle-1 {
            width: 16px;
            height: 16px;
            top: 30%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }
        
        .particle-2 {
            width: 12px;
            height: 12px;
            top: 60%;
            left: 85%;
            animation: float 6s ease-in-out infinite 1s;
        }
        
        .particle-3 {
            width: 8px;
            height: 8px;
            top: 20%;
            left: 70%;
            animation: float 7s ease-in-out infinite 0.5s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(10deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-header p {
            font-size: 1.1rem;
            opacity: 0.95;
            max-width: 600px;
            margin: 0 auto;
            font-weight: 300;
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.25rem;
            position: relative;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -1rem;
            gap: 0.8rem;
        }
        
        .col {
            flex: 1;
            padding: 0 1rem;
            min-width: 320px;
            margin-bottom: 1.5rem;
        }
        
        .card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            height: 100%;
            transition: var(--transition);
            border: 1px solid rgba(222, 226, 230, 0.5);
            position: relative;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0) 100%);
            z-index: 1;
            opacity: 0;
            transition: var(--transition);
        }
        
        .card:hover {
            box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
            transform: translateY(-5px);
        }
        
        .card:hover::before {
            opacity: 0.5;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.4rem;
            font-weight: 700;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid rgba(0,0,0,0.05);
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: -10px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            opacity: 0.8;
        }
        
        .card-header i {
            margin-right: 0.8rem;
            font-size: 1.3rem;
            background: rgba(255, 255, 255, 0.2);
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            transition: var(--transition);
        }
        
        .card:hover .card-header i {
            transform: rotate(5deg) scale(1.05);
            background: rgba(255, 255, 255, 0.3);
        }
        
        .card-body {
            padding: 1.8rem;
        }
        
        .input-group {
            margin-bottom: 1.6rem;
            position: relative;
        }
        
        .input-group:last-child {
            margin-bottom: 0;
        }
        
        .input-group::after {
            content: '';
            position: absolute;
            bottom: -0.8rem;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, var(--border) 0%, transparent 100%);
            opacity: 0.5;
        }
        
        .input-group:last-child::after {
            display: none;
        }
        
        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 700;
            color: var(--dark);
            font-size: 0.95rem;
            letter-spacing: -0.01em;
        }
        
        .input-value {
            padding: 0.9rem 1.1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            width: 100%;
            background-color: var(--light);
            font-size: 0.95rem;
            color: var(--dark);
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        
        .input-value:hover {
            border-color: var(--primary-light);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        
        .color-preview {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 8px;
            margin-right: 12px;
            vertical-align: middle;
            border: 3px solid white;
            box-shadow: 0 2px 6px var(--shadow);
            position: relative;
            overflow: hidden;
        }
        
        .color-preview::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 16px;
            height: 16px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
        }
        
        .color-value {
            font-family: 'SFMono-Regular', Consolas, monospace;
            font-size: 0.9rem;
            background-color: var(--gray);
            padding: 4px 8px;
            border-radius: 5px;
            letter-spacing: 0.03em;
            border: 1px solid rgba(0,0,0,0.05);
            vertical-align: middle;
        }
        
        .component-list {
            display: grid;
            gap: 1.2rem;
        }
        
        .component-item {
            display: flex;
            align-items: center;
            padding: 1.1rem;
            background-color: var(--light);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        
        .component-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary), var(--primary-light));
            opacity: 0;
            transition: var(--transition);
        }
        
        .component-item::after {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 1.2rem;
            transform: translateY(-50%);
            color: var(--primary);
            opacity: 0;
            transition: var(--transition);
            font-size: 1.1rem;
        }
        
        .component-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.07);
            border-color: var(--primary-light);
            background-color: rgba(248, 249, 250, 0.8);
        }
        
        .component-item:hover::before {
            opacity: 1;
        }
        
        .component-item:hover::after {
            opacity: 0.8;
            right: 1rem;
        }
        
        .component-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            background-color: white;
            padding: 8px;
            border: 1px solid var(--border);
            margin-right: 1.2rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.07);
            transition: var(--transition);
        }
        
        .component-item:hover .component-image {
            transform: scale(1.06) rotate(-3deg);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .component-name {
            font-weight: 700;
            color: var(--dark);
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .component-item:hover .component-name {
            transform: translateX(4px);
            color: var(--primary);
        }
        
        .btn-container {
            text-align: center;
            margin: 3rem 0 4rem;
            position: relative;
        }
        
        .btn-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(76, 201, 240, 0.12) 0%, rgba(76, 201, 240, 0) 70%);
            z-index: -1;
            border-radius: 50%;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1.1rem 2.6rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            border: none;
            border-radius: 40px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.35);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.6s;
            z-index: -1;
        }
        
        .btn:hover {
            background: linear-gradient(45deg, var(--primary-dark), var(--primary));
            transform: translateY(-4px);
            box-shadow: 0 15px 25px rgba(67, 97, 238, 0.45);
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn i {
            margin-right: 10px;
            font-size: 1.2rem;
            transition: var(--transition);
        }
        
        .btn:hover i {
            transform: rotate(15deg);
        }
        
        .logo-preview, .favicon-preview {
            text-align: center;
            background-color: var(--light);
            border-radius: var(--radius-sm);
            padding: 1.6rem;
            margin-top: 0.8rem;
            border: 2px dashed var(--border);
            transition: var(--transition);
            position: relative;
        }
        
        .logo-preview::after, .favicon-preview::after {
            content: '\f03e';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            bottom: 8px;
            right: 8px;
            color: var(--border);
            opacity: 0.5;
            font-size: 1.1rem;
            transition: var(--transition);
        }
        
        .logo-preview:hover, .favicon-preview:hover {
            border-color: var(--primary-light);
            background-color: rgba(248, 249, 250, 0.9);
        }
        
        .logo-preview:hover::after, .favicon-preview:hover::after {
            color: var(--primary-light);
            opacity: 1;
        }
        
        .logo-preview img, .favicon-preview img {
            max-height: 75px;
            max-width: 100%;
            object-fit: contain;
            transition: var(--transition);
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }
        
        .logo-preview:hover img, .favicon-preview:hover img {
            transform: scale(1.06);
        }
        
        .favicon-preview img {
            max-height: 40px;
        }
        
        /* Enhanced Floating Decoration Elements */
        .decoration {
            position: absolute;
            border-radius: 50%;
            opacity: 0.5;
            z-index: -1;
        }
        
        .decoration-1 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(76, 201, 240, 0.15) 0%, rgba(76, 201, 240, 0) 70%);
            top: 15%;
            right: -175px;
            animation: pulse 15s infinite alternate;
        }
        
        .decoration-2 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.15) 0%, rgba(67, 97, 238, 0) 70%);
            bottom: 15%;
            left: -125px;
            animation: pulse 12s infinite alternate-reverse;
        }
        
        .decoration-3 {
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(63, 55, 201, 0.12) 0%, rgba(63, 55, 201, 0) 70%);
            top: 60%;
            right: 10%;
            animation: pulse 10s infinite alternate;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.6;
            }
            100% {
                transform: scale(1);
                opacity: 0.5;
            }
        }
        
        /* Added progress indicator */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, var(--primary), var(--primary-light), var(--success));
            z-index: 1000;
            transform-origin: 0 0;
            transition: transform 0.3s ease;
        }
        
        /* Tooltip styles */
        [data-tooltip] {
            position: relative;
            cursor: help;
        }
        
        [data-tooltip]::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--dark);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.85rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 10;
        }
        
        [data-tooltip]::before {
            content: '';
            position: absolute;
            bottom: calc(100% + 4px);
            left: 50%;
            transform: translateX(-50%);
            border-width: 4px;
            border-style: solid;
            border-color: var(--dark) transparent transparent transparent;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        [data-tooltip]:hover::after,
        [data-tooltip]:hover::before {
            opacity: 1;
            visibility: visible;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .page-header {
                padding: 3.5rem 0 5.5rem;
            }
            
            .page-header h1 {
                font-size: 2.4rem;
            }
            
            .card-body {
                padding: 1.7rem;
            }
            
            .decoration-1 {
                width: 280px;
                height: 280px;
            }
            
            .decoration-2 {
                width: 180px;
                height: 180px;
            }
        }
        
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
            
            .col {
                width: 100%;
            }
            
            .page-header {
                padding: 3rem 0 5rem;
                margin-bottom: -3.5rem;
            }
            
            .page-header h1 {
                font-size: 2.25rem;
            }
            
            .component-image {
                width: 55px;
                height: 55px;
            }
            
            .btn {
                padding: 1rem 2.2rem;
            }
        }
        
        @media (max-width: 576px) {
            .page-header {
                padding: 2.5rem 0 4.5rem;
                margin-bottom: -3rem;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .btn {
                padding: 0.95rem 2rem;
                font-size: 1.05rem;
            }
            
            .card-header {
                padding: 1.3rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .component-item {
                padding: 1rem;
            }
            
            .component-image {
                width: 50px;
                height: 50px;
                margin-right: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Progress bar -->
    <div class="progress-bar" style="transform: scaleX(0.7);"></div>
    
    <!-- Decorative elements -->
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="decoration decoration-3"></div>

    @include('layout.nav')

    <div class="page-header">
        <div class="container">
            <div class="header-particle particle-1"></div>
            <div class="header-particle particle-2"></div>
            <div class="header-particle particle-3"></div>
            <h1>Generate Your Template</h1>
            <p>Configure your site settings and components to create and download a custom HTML template tailored to your needs.</p>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <!-- First Column: User Input -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-info-circle"></i> Site Information
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <label class="input-label">Site Name</label>
                            <div class="input-value" id="siteName">{{$userInput->siteName}}</div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Description</label>
                            <div class="input-value" id="description">{{$userInput->description}}</div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Logo</label>
                            <div class="logo-preview" id="logo" data-tooltip="Preview of your site logo">
                                <img src="{{$userInput->logoUrl}}" alt="Site Logo">
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Favicon</label>
                            <div class="favicon-preview" id="faveIcon" data-tooltip="Preview of your site favicon">
                                <img src="{{$userInput->faveIcon}}" alt="Site Favicon">
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Primary Color</label>
                            <div class="input-value">
                                <span class="color-preview" style="background-color: {{$userInput->color1}};"></span>
                                <span class="color-value" id="color1">{{$userInput->color1}}</span>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Secondary Color</label>
                            <div class="input-value">
                                <span class="color-preview" style="background-color: {{$userInput->color2}};"></span>
                                <span class="color-value" id="color2">{{$userInput->color2}}</span>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <label class="input-label">Text Color</label>
                            <div class="input-value">
                                <span class="color-preview" style="background-color: {{$userInput->color3}};"></span>
                                <span class="color-value" id="color3">{{$userInput->color1}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Second Column: Components -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-puzzle-piece"></i> Components
                    </div>
                    <div class="card-body">
                        <div class="component-list">
                            @foreach ($components as $component)
                                <div class="component-item">
                                    <img class="component-image" src="{{$component->img_path}}" alt="{{$component->component_name}}">
                                    <div class="component-name">{{ $component->component_name }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="btn-container">
        <a href="{{route('template.generate')}}" class="btn">
            <i class="fas fa-magic"></i> Generate Template
        </a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate progress bar
        setTimeout(() => {
            document.querySelector('.progress-bar').style.transform = 'scaleX(1)';
        }, 500);
        
        // Add active state to component items when clicked
        const componentItems = document.querySelectorAll('.component-item');
        componentItems.forEach(item => {
            item.addEventListener('click', function() {
                this.classList.toggle('active');
                if (this.classList.contains('active')) {
                    this.style.borderColor = 'var(--primary)';
                    this.style.backgroundColor = 'rgba(67, 97, 238, 0.05)';
                } else {
                    this.style.borderColor = 'var(--border)';
                    this.style.backgroundColor = 'var(--light)';
                }
            });
        });
    });
    </script>
</body>
</html>