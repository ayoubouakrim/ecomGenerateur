<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Build Options Section</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Build Options Section */
        .build-options {
            position: relative;
            padding: 7rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            overflow: hidden;
        }

        /* Background decorations */
        .build-options::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 40px;
            width: 96px;
            height: 96px;
            background: #dbeafe;
            border-radius: 50%;
            opacity: 0.4;
            filter: blur(40px);
        }

        .build-options::after {
            content: '';
            position: absolute;
            bottom: 40px;
            right: 40px;
            width: 128px;
            height: 128px;
            background: #e0e7ff;
            border-radius: 50%;
            opacity: 0.4;
            filter: blur(40px);
        }

        .build-options-content {
            position: relative;
            z-index: 10;
        }

        /* Section Header */
        .build-options-heading {
            text-align: center;
            max-width: 900px;
            margin: 0 auto 4rem;
        }

        .build-options-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .build-highlight {
            color: #60a5fa;
        }

        .build-options-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* Timeline container */
        .build-steps-timeline {
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Connection line */
        .build-timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, #dbeafe 0%, #bfdbfe 50%, #dbeafe 100%);
            transform: translateX(-50%);
            opacity: 0.6;
        }

        /* Animated dots */
        .build-timeline-dot {
            position: absolute;
            left: 50%;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transform: translateX(-50%);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        .build-timeline-dot:nth-child(2) {
            top: 20%;
            background: #a78bfa;
            animation-delay: 0s;
        }

        .build-timeline-dot:nth-child(3) {
            top: 50%;
            background: #60a5fa;
            animation-delay: 1s;
        }

        .build-timeline-dot:nth-child(4) {
            top: 80%;
            background: #a78bfa;
            animation-delay: 2s;
        }

        @keyframes pulse-dot {
            0%, 100% { transform: translateX(-50%) scale(1); opacity: 1; }
            50% { transform: translateX(-50%) scale(1.3); opacity: 0.7; }
        }

        /* Step container */
        .build-step-wrapper {
            margin-bottom: 5rem;
            position: relative;
        }

        .build-step-wrapper:last-child {
            margin-bottom: 0;
        }

        .build-step-container {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .build-step-container.reverse {
            flex-direction: row-reverse;
        }

        /* Content side */
        .build-step-content {
            flex: 1;
        }

        .build-step-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .build-step-number {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--step-color-start), var(--step-color-end));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            flex-shrink: 0;
        }

        .build-step-number span {
            color: white;
            font-weight: 800;
            font-size: 1.3rem;
        }

        .build-step-title-wrapper h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }

        .build-step-underline {
            width: 48px;
            height: 4px;
            background: var(--step-color-start);
            border-radius: 2px;
        }

        .build-step-description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .build-step-features {
            list-style: none;
            margin-bottom: 1rem;
        }

        .build-step-feature {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .build-step-feature i {
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            color: var(--step-color-start);
            font-size: 0.7rem;
            flex-shrink: 0;
        }

        .build-step-feature span {
            font-size: 0.875rem;
            color: #475569;
        }

        .build-step-time {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 1rem;
        }

        .build-step-time i {
            margin-right: 0.5rem;
        }

        /* Mockup side */
        .build-step-mockup {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .build-mockup-wrapper {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .build-mockup-glow {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--step-color-start), var(--step-color-end));
            border-radius: 24px;
            filter: blur(48px);
            opacity: 0.2;
            transform: scale(1.1);
            transition: opacity 0.3s ease;
        }

        .build-mockup-wrapper:hover .build-mockup-glow {
            opacity: 0.3;
        }

        .build-mockup-content {
            position: relative;
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .build-mockup-content:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        /* Step colors */
        .build-step-wrapper:nth-child(1) {
            --step-color-start: #8b5cf6;
            --step-color-end: #7c3aed;
        }

        .build-step-wrapper:nth-child(2) {
            --step-color-start: #3b82f6;
            --step-color-end: #2563eb;
        }

        .build-step-wrapper:nth-child(3) {
            --step-color-start: #8b5cf6;
            --step-color-end: #7c3aed;
        }

        /* Mockup 1: Upload */
        .build-upload-zone {
            border: 2px dashed #c7d2fe;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .build-upload-zone:hover {
            border-color: #a78bfa;
        }

        .build-upload-icon {
            width: 48px;
            height: 48px;
            color: #a78bfa;
            margin: 0 auto 1rem;
        }

        .build-upload-text {
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .build-upload-subtext {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .build-file-preview {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .build-upload-zone:hover .build-file-preview {
            opacity: 1;
        }

        .build-file-item {
            background: #f5f3ff;
            border: 1px solid #ddd6fe;
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            display: flex;
            align-items: center;
        }

        .build-file-item i {
            color: #7c3aed;
            margin-right: 0.5rem;
        }

        .build-file-name {
            font-size: 0.75rem;
            color: #7c3aed;
            font-weight: 600;
        }

        /* Mockup 2: Choose Tools */
        .build-tools-header {
            font-size: 0.875rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.75rem;
        }

        .build-tools-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .build-tool-option {
            padding: 0.75rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .build-tool-option.selected {
            border-color: #93c5fd;
            background: #eff6ff;
        }

        .build-tool-option:hover {
            border-color: #cbd5e1;
        }

        .build-tool-content {
            display: flex;
            align-items: center;
        }

        .build-tool-emoji {
            margin-right: 0.5rem;
        }

        .build-tool-name {
            font-size: 0.75rem;
            font-weight: 600;
            color: #0f172a;
        }

        .build-generate-btn {
            width: 100%;
            background: #3b82f6;
            color: white;
            padding: 0.625rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .build-generate-btn:hover {
            background: #2563eb;
        }

        /* Mockup 3: Export */
        .build-export-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .build-export-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #0f172a;
        }

        .build-export-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .build-status-dot {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse-dot 2s ease-in-out infinite;
        }

        .build-status-text {
            font-size: 0.75rem;
            color: #16a34a;
            font-weight: 600;
        }

        .build-materials-list {
            margin-bottom: 1rem;
        }

        .build-material-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem;
            background: #f8fafc;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }

        .build-material-info {
            display: flex;
            align-items: center;
        }

        .build-material-dot {
            width: 12px;
            height: 12px;
            border-radius: 2px;
            margin-right: 0.5rem;
        }

        .build-material-dot.violet {
            background: #a78bfa;
        }

        .build-material-dot.blue {
            background: #60a5fa;
        }

        .build-material-type {
            font-size: 0.75rem;
            font-weight: 600;
            color: #0f172a;
        }

        .build-material-count {
            font-size: 0.75rem;
            color: #64748b;
        }

        .build-action-buttons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }

        .build-action-btn {
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .build-action-btn.primary {
            background: #8b5cf6;
            color: white;
        }

        .build-action-btn.primary:hover {
            background: #7c3aed;
        }

        .build-action-btn.secondary {
            border: 1px solid #cbd5e1;
            background: white;
            color: #475569;
        }

        .build-action-btn.secondary:hover {
            background: #f8fafc;
        }

        .build-action-btn i {
            margin-right: 0.25rem;
            font-size: 0.7rem;
        }

        /* Bottom CTA */
        .build-bottom-cta {
            text-align: center;
            margin-top: 4rem;
        }

        .build-cta-card {
            display: inline-flex;
            align-items: center;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .build-cta-card:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .build-cta-icon {
            width: 20px;
            height: 20px;
            color: #7c3aed;
            margin-right: 0.5rem;
        }

        .build-cta-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: #475569;
            margin-right: 0.75rem;
        }

        .build-cta-value {
            font-size: 0.875rem;
            font-weight: 800;
            color: #7c3aed;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .build-timeline-line,
            .build-timeline-dot {
                display: none;
            }

            .build-step-container,
            .build-step-container.reverse {
                flex-direction: column;
            }

            .build-step-wrapper {
                margin-bottom: 3rem;
            }
        }

        @media (max-width: 768px) {
            .build-options {
                padding: 4rem 0;
            }

            .build-options-title {
                font-size: 2rem;
            }

            .build-options-subtitle {
                font-size: 0.9rem;
            }

            .build-mockup-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <section class="build-options">
        <div class="container">
            <div class="build-options-content">
                <div class="build-options-heading">
                    
                    <h2 class="build-options-title">
                        Choose <span class="build-highlight">How You Want</span> to Build
                    </h2>
                    <p class="build-options-subtitle">
                        Our intuitive platform makes website creation effortless, whether you start from scratch, use a template, or let AI do the work
                    </p>
                </div>

                <div class="build-steps-timeline">
                    <div class="build-timeline-line"></div>
                    <div class="build-timeline-dot"></div>
                    <div class="build-timeline-dot"></div>
                    <div class="build-timeline-dot"></div>

                    <!-- Step 1 -->
                    <div class="build-step-wrapper">
                        <div class="build-step-container reverse">
                            <div class="build-step-content">
                                <div class="build-step-header">
                                    <div class="build-step-number">
                                        <span><i class="fas fa-pencil-ruler"></i></span>
                                    </div>
                                    <div class="build-step-title-wrapper">
                                        <h3>Start from Scratch</h3>
                                        <div class="build-step-underline"></div>
                                    </div>
                                </div>
                                <p class="build-step-description">
                                    Select components from our library and customize them with your content. Choose a navbar, hero section, features, and more - then fill each with your text, images, and branding. No coding required.
                                </p>
                                <ul class="build-step-features">
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Pre-built component library</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Easy content customization</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Mix and match sections</span>
                                    </li>
                                </ul>
                                <div class="build-step-time">
                                    <i class="fas fa-clock"></i>
                                    <span>Build time: ~5 minutes</span>
                                </div>
                            </div>
                            <div class="build-step-mockup">
                                <div class="build-mockup-wrapper">
                                    <div class="build-mockup-glow"></div>
                                    <div class="build-mockup-content">
                                        <div class="build-upload-zone">
                                            <i class="fas fa-pencil-ruler build-upload-icon"></i>
                                            <div class="build-upload-text">Create New Website</div>
                                            <div class="build-upload-subtext">Start with a blank canvas</div>
                                            <div class="build-file-preview">
                                                <div class="build-file-item">
                                                    <i class="fas fa-file"></i>
                                                    <span class="build-file-name">my_new_site.html</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="build-step-wrapper">
                        <div class="build-step-container">
                            <div class="build-step-content">
                                <div class="build-step-header">
                                    <div class="build-step-number">
                                        <span><i class="fas fa-th-large"></i></span>
                                    </div>
                                    <div class="build-step-title-wrapper">
                                        <h3>Use a Template</h3>
                                        <div class="build-step-underline"></div>
                                    </div>
                                </div>
                                <p class="build-step-description">
                                    Choose from hundreds of professionally designed templates and customize them to match your brand. Perfect for getting started quickly with a polished design.
                                </p>
                                <ul class="build-step-features">
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>500+ professional templates</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Quick start solution</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Industry-specific designs</span>
                                    </li>
                                </ul>
                                <div class="build-step-time">
                                    <i class="fas fa-clock"></i>
                                    <span>Build time: ~3 minutes</span>
                                </div>
                            </div>
                            <div class="build-step-mockup">
                                <div class="build-mockup-wrapper">
                                    <div class="build-mockup-glow"></div>
                                    <div class="build-mockup-content">
                                        <div class="build-tools-header">Select Template Category:</div>
                                        <div class="build-tools-grid">
                                            <div class="build-tool-option selected">
                                                <div class="build-tool-content">
                                                    <span class="build-tool-emoji">🏢</span>
                                                    <span class="build-tool-name">Business</span>
                                                </div>
                                            </div>
                                            <div class="build-tool-option selected">
                                                <div class="build-tool-content">
                                                    <span class="build-tool-emoji">🎨</span>
                                                    <span class="build-tool-name">Portfolio</span>
                                                </div>
                                            </div>
                                            <div class="build-tool-option">
                                                <div class="build-tool-content">
                                                    <span class="build-tool-emoji">🛒</span>
                                                    <span class="build-tool-name">E-commerce</span>
                                                </div>
                                            </div>
                                            <div class="build-tool-option selected">
                                                <div class="build-tool-content">
                                                    <span class="build-tool-emoji">📝</span>
                                                    <span class="build-tool-name">Blog</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="build-generate-btn">Browse Templates</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="build-step-wrapper">
                        <div class="build-step-container reverse">
                            <div class="build-step-content">
                                <div class="build-step-header">
                                    <div class="build-step-number">
                                        <span><i class="fas fa-robot"></i></span>
                                    </div>
                                    <div class="build-step-title-wrapper">
                                        <h3>AI Website Builder</h3>
                                        <div class="build-step-underline"></div>
                                    </div>
                                </div>
                                <p class="build-step-description">
                                    Answer a few questions and let our AI create a custom website tailored to your specific needs. The fastest way to launch your online presence.
                                </p>
                                <ul class="build-step-features">
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Smart AI generation</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Personalized design</span>
                                    </li>
                                    <li class="build-step-feature">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Auto content creation</span>
                                    </li>
                                </ul>
                                <div class="build-step-time">
                                    <i class="fas fa-clock"></i>
                                    <span>Build time: ~1 minute</span>
                                </div>
                            </div>
                            <div class="build-step-mockup">
                                <div class="build-mockup-wrapper">
                                    <div class="build-mockup-glow"></div>
                                    <div class="build-mockup-content">
                                        <div class="build-export-header">
                                            <div class="build-export-title">Your Website is Ready!</div>
                                            <div class="build-export-status">
                                                <div class="build-status-dot"></div>
                                                <div class="build-status-text">Generated</div>
                                            </div>
                                        </div>

                                        <div class="build-materials-list">
                                            <div class="build-material-item">
                                                <div class="build-material-info">
                                                    <div class="build-material-dot violet"></div>
                                                    <span class="build-material-type">Hero Section</span>
                                                </div>
                                                <span class="build-material-count">Generated</span>
                                            </div>
                                            <div class="build-material-item">
                                                <div class="build-material-info">
                                                    <div class="build-material-dot blue"></div>
                                                    <span class="build-material-type">Features Section</span>
                                                </div>
                                                <span class="build-material-count">Generated</span>
                                            </div>
                                            <div class="build-material-item">
                                                <div class="build-material-info">
                                                    <div class="build-material-dot violet"></div>
                                                    <span class="build-material-type">Contact Form</span>
                                                </div>
                                                <span class="build-material-count">Ready</span>
                                            </div>
                                        </div>

                                        <div class="build-action-buttons">
                                            <button class="build-action-btn primary">
                                                <i class="fas fa-eye"></i>
                                                Preview Now
                                            </button>
                                            <button class="build-action-btn secondary">
                                                <i class="fas fa-rocket"></i>
                                                Publish
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom CTA -->
                <div class="build-bottom-cta">
                    <div class="build-cta-card">
                        <i class="fas fa-rocket build-cta-icon"></i>
                        <span class="build-cta-text">Pick your method and start building:</span>
                        <span class="build-cta-value">It's free to try</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>