<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            min-height: 100vh;
        }

        /* Full Width Header Bar */
        .header-bar {
            background: #1e293b;
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .header-info h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .header-info .highlight {
            color: #60a5fa;
        }

        .header-info p {
            color: #94a3b8;
            font-size: 1rem;
        }

        .header-stats {
            display: flex;
            gap: 2rem;
        }

        .stat-box {
            text-align: center;
            background: rgba(59, 130, 246, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #60a5fa;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
        }

        /* Main Content Area */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .section-title {
            color: #000000;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Horizontal Cards Layout */
        .cards-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .project-card {
            background: #1e293b;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: row;
            min-height: 300px;
        }

        .project-card:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        /* Image Side */
        .card-image-side {
            flex: 0 0 45%;
            position: relative;
            overflow: hidden;
        }

        .card-image-side.scratch {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.9), rgba(58, 12, 163, 0.9));
        }

        .card-image-side.template {
            background: linear-gradient(135deg, rgba(247, 37, 133, 0.9), rgba(114, 9, 183, 0.9));
        }

        .card-bg-image {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0.2;
        }

        .card-image-side.scratch .card-bg-image {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-code.png");
        }

        .card-image-side.template .card-bg-image {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-post-its.png");
        }

        .card-icon-large {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .card-icon-large svg {
            width: 100px;
            height: 100px;
            stroke: white;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
        }

        .card-tag {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 3;
        }

        .card-image-side.scratch .card-tag {
            color: #4361ee;
        }

        .card-image-side.template .card-tag {
            color: #f72585;
        }

        /* Content Side */
        .card-content-side {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .content-top h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 1rem;
        }

        .content-top p {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .content-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #cbd5e1;
            font-size: 0.9rem;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            color: white;
            flex-shrink: 0;
        }

        .project-card:nth-child(1) .feature-icon {
            background: #4361ee;
        }

        .project-card:nth-child(2) .feature-icon {
            background: #f72585;
        }

        .action-button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            color: white;
        }

        .project-card:nth-child(1) .action-button {
            background: #4361ee;
        }

        .project-card:nth-child(2) .action-button {
            background: #f72585;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .action-button svg {
            width: 20px;
            height: 20px;
            stroke: white;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .cards-wrapper {
                grid-template-columns: 1fr;
                max-width: 700px;
                margin: 0 auto;
            }

            .header-wrapper {
                flex-direction: column;
                text-align: center;
            }

            .header-stats {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .header-bar {
                padding: 1.5rem 1rem;
            }

            .header-info h1 {
                font-size: 1.75rem;
            }

            .header-stats {
                flex-direction: column;
                gap: 1rem;
                width: 100%;
            }

            .stat-box {
                width: 100%;
            }

            .main-content {
                padding: 2rem 1rem;
            }

            .project-card {
                flex-direction: column;
                min-height: auto;
            }

            .card-image-side {
                flex: 0 0 200px;
            }

            .card-icon-large svg {
                width: 70px;
                height: 70px;
            }

            .card-content-side {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Bar -->
    <header class="header-bar">
        <div class="header-wrapper">
            <div class="header-info">
                <h1>Welcome to <span class="highlight">Your Website Builder</span></h1>
                <p>Create beautiful websites in minutes. Choose your preferred way to get started below.</p>
            </div>
            <div class="header-stats">
                <div class="stat-box">
                    <div class="stat-value">24</div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value">8</div>
                    <div class="stat-label">Templates</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <h2 class="section-title">Choose Your Starting Point</h2>
        
        <div class="cards-wrapper">
            <!-- Build from Scratch Card -->
            <div class="project-card">
                <div class="card-image-side scratch">
                    <div class="card-bg-image"></div>
                    <span class="card-tag">Most Flexible</span>
                    <div class="card-icon-large">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-content-side">
                    <div class="content-top">
                        <h3>Build from Scratch</h3>
                        <p>Start with a blank canvas and create your website exactly how you want it, with complete creative freedom.</p>
                        <ul class="content-features">
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>Drag & drop components library</span>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>Complete customization control</span>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>No coding skills required</span>
                            </li>
                        </ul>
                    </div>
                    <button class="action-button" onclick="window.location.href='#'">
                        <span>Start Building</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Template Card -->
            <div class="project-card">
                <div class="card-image-side template">
                    <div class="card-bg-image"></div>
                    <span class="card-tag">Fastest Way</span>
                    <div class="card-icon-large">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                </div>
                <div class="card-content-side">
                    <div class="content-top">
                        <h3>Edit Template</h3>
                        <p>Choose from our professionally designed templates and customize them to match your brand and needs.</p>
                        <ul class="content-features">
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>500+ premium ready templates</span>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>Industry-specific designs</span>
                            </li>
                            <li class="feature-item">
                                <div class="feature-icon">✓</div>
                                <span>One-click customization</span>
                            </li>
                        </ul>
                    </div>
                    <button class="action-button" onclick="window.location.href='#'">
                        <span>Browse Templates</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>