<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Features Section</title>
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
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Features Section - Complete Contrast */
        .features {
            position: relative;
            padding: 7rem 0;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            overflow: hidden;
        }

        /* Subtle Grid Pattern */
        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
        }

        .features-content {
            position: relative;
            z-index: 10;
        }

        /* Section Header */
        .section-heading {
            text-align: center;
            margin-bottom: 5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .section-title .gradient-text {
            color: #60a5fa;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 4rem;
        }

        /* Feature Card - Bright & Bold */
        .feature-card {
            position: relative;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
            border: 2px solid #f1f5f9;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 24px;
            padding: 2px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .feature-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
            border-color: transparent;
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        /* Icon with Gradient Background */
        .feature-icon-wrapper {
            position: relative;
            width: 70px;
            height: 70px;
            margin-bottom: 1.5rem;
        }

        .feature-icon {
            width: 100%;
            height: 100%;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .feature-card:hover .feature-icon {
            transform: rotate(10deg) scale(1.1);
            box-shadow: 0 15px 40px var(--shadow-color);
        }

        /* Card-specific gradients */
        .feature-card:nth-child(1) {
            --gradient-start: #3b82f6;
            --gradient-end: #2563eb;
            --shadow-color: rgba(59, 130, 246, 0.4);
        }

        .feature-card:nth-child(2) {
            --gradient-start: #ec4899;
            --gradient-end: #db2777;
            --shadow-color: rgba(236, 72, 153, 0.4);
        }

        .feature-card:nth-child(3) {
            --gradient-start: #10b981;
            --gradient-end: #059669;
            --shadow-color: rgba(16, 185, 129, 0.4);
        }

        .feature-card:nth-child(4) {
            --gradient-start: #f59e0b;
            --gradient-end: #d97706;
            --shadow-color: rgba(245, 158, 11, 0.4);
        }

        .feature-card:nth-child(5) {
            --gradient-start: #8b5cf6;
            --gradient-end: #7c3aed;
            --shadow-color: rgba(139, 92, 246, 0.4);
        }

        .feature-card:nth-child(6) {
            --gradient-start: #06b6d4;
            --gradient-end: #0891b2;
            --shadow-color: rgba(6, 182, 212, 0.4);
        }

        /* Feature Content */
        .feature-title {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #0f172a;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-title {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-description {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.7;
        }

        /* Floating badge */
        .feature-status {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.5s ease;
        }

        .feature-card:hover .feature-status {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            border-color: transparent;
            transform: scale(1.1);
        }

        /* Decorative circles */
        .feature-card::after {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--gradient-start), transparent);
            opacity: 0;
            transition: all 0.8s ease;
            pointer-events: none;
        }

        .feature-card:hover::after {
            opacity: 0.1;
            top: -50px;
            right: -50px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .features {
                padding: 4rem 0;
            }

            .section-title {
                font-size: 2rem;
            }

            .section-subtitle {
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .feature-card {
                padding: 2rem;
            }

            .feature-icon-wrapper {
                width: 70px;
                height: 70px;
            }

            .feature-icon {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <section class="features">
        <div class="container">
            <div class="features-content">
                <div class="section-heading">
                    <h2 class="section-title">
                        <span class="gradient-text">Powerful tools</span> for modern creators
                    </h2>
                    <p class="section-subtitle">
                        Everything you need to build stunning websites that convert. No coding required, just pure creativity.
                    </p>
                </div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-status">Pro</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Visual Editor</h3>
                        <p class="feature-description">
                            Drag and drop elements to build your site visually, with real-time previews and responsive design tools.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-status">Fast</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Lightning Fast</h3>
                        <p class="feature-description">
                            Optimized code and CDN delivery ensure your website loads quickly on all devices and browsers.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-status">AI</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-robot"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">AI Assistant</h3>
                        <p class="feature-description">
                            Generate content, optimize designs, and get personalized recommendations with our AI tools.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-status">Mobile</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Mobile First</h3>
                        <p class="feature-description">
                            Automatically responsive designs that look perfect on desktops, tablets, and smartphones.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-status">Custom</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Custom Components</h3>
                        <p class="feature-description">
                            Create reusable components to maintain consistency across your site and save time.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-status">Code</div>
                        <div class="feature-icon-wrapper">
                            <div class="feature-icon">
                                <i class="fas fa-code"></i>
                            </div>
                        </div>
                        <h3 class="feature-title">Code Export</h3>
                        <p class="feature-description">
                            Export clean, semantic code for your website or integrate with your existing development workflow.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>