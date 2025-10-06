<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Hero Section</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: #1e293b;
            overflow: hidden;
            padding: 2rem 0;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hero-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .hero-content-wrapper {
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            width: 100%;
        }

        /* Left Side */
        .hero-left {
            color: white;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(59, 130, 246, 0.12);
            color: #60a5fa;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 2rem;
            border: 1px solid rgba(59, 130, 246, 0.25);
        }

        .hero-badge i {
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-heading {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: #f1f5f9;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .hero-heading .highlight {
            color: #60a5fa;
        }

        .hero-description {
            font-size: 1.1rem;
            color: #cbd5e1;
            margin-bottom: 2rem;
            line-height: 1.6;
            max-width: 550px;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            gap: 0.6rem;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.35);
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(59, 130, 246, 0.45);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.25);
            color: white;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #cbd5e1;
            font-size: 0.85rem;
        }

        .hero-note i {
            color: #4ade80;
        }

        /* Right Side - AI Website Builder Visualization */
        .hero-right {
            position: relative;
        }

        /* Main Builder Canvas */
        .builder-canvas {
            position: relative;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        /* AI Processing Bar */
        .ai-bar {
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .ai-icon {
            width: 40px;
            height: 40px;
            background: #3b82f6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .ai-text {
            flex: 1;
        }

        .ai-label {
            color: #60a5fa;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ai-status {
            color: #cbd5e1;
            font-size: 0.85rem;
            margin-top: 0.2rem;
        }

        @keyframes rotate {
            to { transform: rotate(360deg); }
        }

        /* Website Preview Grid */
        .preview-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .preview-block {
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 8px;
            padding: 1rem;
            aspect-ratio: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .preview-block:hover {
            transform: scale(1.05);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.2);
        }

        .block-icon {
            color: #60a5fa;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .block-bars {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .block-bar {
            height: 4px;
            background: rgba(148, 163, 184, 0.3);
            border-radius: 2px;
        }

        .block-bar.active {
            background: #60a5fa;
            animation: glow 2s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        /* Generated Elements */
        .generated-elements {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 1.2rem;
        }

        .elements-header {
            color: #60a5fa;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        .element-list {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .element-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(15, 23, 42, 0.6);
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .element-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.7rem;
        }

        .element-name {
            flex: 1;
            color: #cbd5e1;
            font-size: 0.85rem;
        }

        .element-badge {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Floating AI Indicators */
        .ai-indicator {
            position: absolute;
            background: rgba(30, 41, 59, 0.9);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .indicator-2 {
            bottom: -10px;
            left: -40px;
            animation-delay: 2s;
        }

        .indicator-dot {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.4); }
            50% { box-shadow: 0 0 0 8px rgba(74, 222, 128, 0); }
        }

        .indicator-text {
            color: #cbd5e1;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(8px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            position: relative;
            background: #1e293b;
            padding: 2.5rem;
            border-radius: 16px;
            max-width: 900px;
            width: 90%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .close-modal {
            position: absolute;
            top: 1.25rem;
            right: 1.25rem;
            color: #cbd5e1;
            font-size: 1.8rem;
            cursor: pointer;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.08);
            transition: all 0.3s;
            border: none;
        }

        .close-modal:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            border-radius: 12px;
            overflow: hidden;
            background: #000;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content-wrapper {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .hero-left {
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .btn-group {
                justify-content: center;
            }

            .hero-note {
                justify-content: center;
            }

            .ai-indicator {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 6rem 0 4rem;
            }

            .hero-heading {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .btn-group {
                flex-direction: column;
                width: 100%;
                max-width: 320px;
                margin: 0 auto 1.5rem;
            }

            .btn {
                width: 100%;
            }

            .preview-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <section class="hero">
        <div class="hero-pattern"></div>
        <div class="hero-grid"></div>

        <div class="container">
            <div class="hero-content-wrapper">
                <!-- Left Side -->
                <div class="hero-left">
                    <div class="hero-badge">
                        <i class="fas fa-magic"></i>
                        AI-Powered Website Builder
                    </div>
                    
                    <h1 class="hero-heading">
                        Build stunning websites with <span class="highlight">next-gen tools</span>
                    </h1>
                    
                    <p class="hero-description">
                        Create professional websites without code using our drag-and-drop builder, AI-powered tools, and stunning templates. Launch your online presence in minutes.
                    </p>
                    
                    <div class="btn-group">
                        <button class="btn btn-primary">
                            <i class="fas fa-bolt"></i>
                            Start Building Now
                        </button>
                        <button class="btn btn-outline" id="show-video-btn">
                            <i class="fas fa-play"></i>
                            See How It Works
                        </button>
                    </div>

                    <div class="hero-note">
                        <i class="fas fa-check-circle"></i>
                        <span>No credit card required • Free forever plan</span>
                    </div>
                </div>

                <!-- Right Side - AI Builder Visualization -->
                <div class="hero-right">
                    <div class="builder-canvas">
                        <!-- AI Processing Bar -->
                        <div class="ai-bar">
                            <div class="ai-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <div class="ai-text">
                                <div class="ai-label">AI Generating</div>
                                <div class="ai-status">Creating your website...</div>
                            </div>
                        </div>

                        <!-- Website Components Preview -->
                        <div class="preview-grid">
                            <div class="preview-block">
                                <div class="block-icon"><i class="fas fa-heading"></i></div>
                                <div class="block-bars">
                                    <div class="block-bar active" style="width: 80%;"></div>
                                    <div class="block-bar" style="width: 60%;"></div>
                                </div>
                            </div>
                            <div class="preview-block">
                                <div class="block-icon"><i class="fas fa-align-left"></i></div>
                                <div class="block-bars">
                                    <div class="block-bar active" style="width: 70%;"></div>
                                    <div class="block-bar" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="preview-block">
                                <div class="block-icon"><i class="fas fa-th-large"></i></div>
                                <div class="block-bars">
                                    <div class="block-bar active" style="width: 95%;"></div>
                                    <div class="block-bar" style="width: 55%;"></div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Generated Elements -->
                        <div class="generated-elements">
                            <div class="elements-header">Generated Components</div>
                            <div class="element-list">
                                <div class="element-item">
                                    <div class="element-check"><i class="fas fa-check"></i></div>
                                    <div class="element-name">Hero Section</div>
                                    <div class="element-badge">Done</div>
                                </div>
                                <div class="element-item">
                                    <div class="element-check"><i class="fas fa-check"></i></div>
                                    <div class="element-name">Navigation Menu</div>
                                    <div class="element-badge">Done</div>
                                </div>
                                <div class="element-item">
                                    <div class="element-check"><i class="fas fa-check"></i></div>
                                    <div class="element-name">Contact Form</div>
                                    <div class="element-badge">Done</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Indicators -->
                    
                    <div class="ai-indicator indicator-2">
                        <div class="indicator-dot"></div>
                        <span class="indicator-text">AI Active</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="video-modal" class="modal">
        <div class="modal-content">
            <button class="close-modal" id="close-modal">&times;</button>
            <div class="video-container">
                <video id="demo-video" controls>
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('video-modal');
        const showBtn = document.getElementById('show-video-btn');
        const closeBtn = document.getElementById('close-modal');
        const video = document.getElementById('demo-video');

        showBtn.addEventListener('click', () => {
            modal.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('active');
            video.pause();
            video.currentTime = 0;
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
                video.pause();
                video.currentTime = 0;
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                modal.classList.remove('active');
                video.pause();
                video.currentTime = 0;
            }
        });
    </script>
</body>
</html>