<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Light Theme</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            min-height: 100vh;
            background-color: #f8fafc; /* Light slate background */
            color: #1e293b;
        }

        /* === Dashboard Header === */
        .dashboard-header-bar {
            background: white;
            padding: 2.25rem 2rem;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .dashboard-header-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 2.5rem;
        }

        .dashboard-header-info h1 {
            font-size: 2.4rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.6rem;
            line-height: 1.25;
        }

        .dashboard-header-info .dashboard-highlight {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dashboard-header-info p {
            color: #475569;
            font-size: 1.05rem;
            max-width: 600px;
            line-height: 1.6;
        }

        .dashboard-header-stats {
            display: flex;
            gap: 2rem;
            margin-top: 0.8rem;
        }

        .dashboard-stat-box {
            text-align: center;
            background: #f1f5f9;
            padding: 1.1rem 1.6rem;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            min-width: 110px;
        }

        .dashboard-stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: #3b82f6;
            line-height: 1.2;
        }

        .dashboard-stat-label {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-top: 0.25rem;
        }

        /* === Main Content === */
        .dashboard-main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3.5rem 2rem 4rem;
        }

        .dashboard-section-title {
            color: #0f172a;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            position: relative;
        }

        .dashboard-section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #3b82f6, #ec4899);
            margin: 0.75rem auto 0;
            border-radius: 2px;
        }

        /* === Cards Wrapper === */
        .dashboard-cards-wrapper {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2.5rem;
        }

        .dashboard-project-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: row;
            min-height: 320px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .dashboard-project-card:hover {
            transform: translateY(-6px);
            border-color: #cbd5e1;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        /* Image Side */
        .dashboard-card-image-side {
            flex: 0 0 46%;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card-image-side.scratch {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .dashboard-card-image-side.template {
            background: linear-gradient(135deg, #ec4899, #be185d);
        }

        .dashboard-card-bg-image {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0.15;
        }

        .dashboard-card-image-side.scratch .dashboard-card-bg-image {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-code.png");
        }

        .dashboard-card-image-side.template .dashboard-card-bg-image {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-post-its.png");
        }

        .dashboard-card-icon-large {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }

        .dashboard-card-icon-large svg {
            width: 100px;
            height: 100px;
            stroke: white;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.25));
        }

        .dashboard-card-tag {
            position: absolute;
            top: 1.25rem;
            left: 1.25rem;
            background: white;
            padding: 0.55rem 1.2rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            z-index: 3;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card-image-side.scratch .dashboard-card-tag {
            color: #3b82f6;
        }

        .dashboard-card-image-side.template .dashboard-card-tag {
            color: #ec4899;
        }

        /* Content Side */
        .dashboard-card-content-side {
            flex: 1;
            padding: 2.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dashboard-content-top h3 {
            font-size: 1.85rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1.1rem;
        }

        .dashboard-content-top p {
            color: #475569;
            line-height: 1.65;
            margin-bottom: 1.6rem;
            font-size: 1.02rem;
        }

        .dashboard-content-features {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
            margin-bottom: 1.75rem;
        }

        .dashboard-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 0.9rem;
            color: #334155;
            font-size: 0.95rem;
        }

        .dashboard-feature-icon {
            width: 26px;
            height: 26px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            color: white;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .dashboard-project-card:nth-child(1) .dashboard-feature-icon {
            background: #3b82f6;
        }

        .dashboard-project-card:nth-child(2) .dashboard-feature-icon {
            background: #ec4899;
        }

        .dashboard-action-button {
            width: 100%;
            padding: 1.1rem;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            color: white;
            letter-spacing: 0.3px;
        }

        .dashboard-project-card:nth-child(1) .dashboard-action-button {
            background: #3b82f6;
        }

        .dashboard-project-card:nth-child(2) .dashboard-action-button {
            background: #ec4899;
        }

        .dashboard-action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .dashboard-action-button:active {
            transform: translateY(-1px);
        }

        .dashboard-action-button svg {
            width: 22px;
            height: 22px;
            stroke: white;
        }

        /* === Responsive === */
        @media (max-width: 1200px) {
            .dashboard-cards-wrapper {
                grid-template-columns: 1fr;
                max-width: 720px;
                margin: 0 auto;
            }

            .dashboard-header-wrapper {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .dashboard-header-stats {
                width: 100%;
                justify-content: center;
                margin-top: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-header-bar {
                padding: 1.75rem 1.25rem;
            }

            .dashboard-header-info h1 {
                font-size: 1.9rem;
            }

            .dashboard-header-info p {
                font-size: 1rem;
            }

            .dashboard-header-stats {
                flex-direction: column;
                gap: 1.2rem;
            }

            .dashboard-stat-box {
                width: 100%;
                max-width: 200px;
            }

            .dashboard-main-content {
                padding: 2.5rem 1.25rem 3rem;
            }

            .dashboard-project-card {
                flex-direction: column;
                min-height: auto;
            }

            .dashboard-card-image-side {
                flex: 0 0 220px;
            }

            .dashboard-card-icon-large svg {
                width: 75px;
                height: 75px;
            }

            .dashboard-card-content-side {
                padding: 1.75rem;
            }

            .dashboard-content-top h3 {
                font-size: 1.65rem;
            }
        }

        @media (max-width: 480px) {
            .dashboard-header-info h1 {
                font-size: 1.6rem;
            }

            .dashboard-stat-value {
                font-size: 1.75rem;
            }

            .dashboard-card-image-side {
                flex: 0 0 190px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Bar -->
    <header class="dashboard-header-bar">
        <div class="dashboard-header-wrapper">
            <div class="dashboard-header-info">
                <h1>Welcome to <span class="dashboard-highlight">Your Website Builder</span></h1>
                <p>Create beautiful websites in minutes. Choose your preferred way to get started below.</p>
            </div>
            <div class="dashboard-header-stats">
                <div class="dashboard-stat-box">
                    <div class="dashboard-stat-value">24</div>
                    <div class="dashboard-stat-label">Projects</div>
                </div>
                <div class="dashboard-stat-box">
                    <div class="dashboard-stat-value">8</div>
                    <div class="dashboard-stat-label">Templates</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="dashboard-main-content">
        <h2 class="dashboard-section-title">Choose Your Starting Point</h2>
        
        <div class="dashboard-cards-wrapper">
            <!-- Build from Scratch Card -->
            <div class="dashboard-project-card">
                <div class="dashboard-card-image-side scratch">
                    <div class="dashboard-card-bg-image"></div>
                    <span class="dashboard-card-tag">Most Flexible</span>
                    <div class="dashboard-card-icon-large">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </div>
                </div>
                <div class="dashboard-card-content-side">
                    <div class="dashboard-content-top">
                        <h3>Build from Scratch</h3>
                        <p>Start with a blank canvas and create your website exactly how you want it, with complete creative freedom.</p>
                        <ul class="dashboard-content-features">
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>Drag & drop components library</span>
                            </li>
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>Complete customization control</span>
                            </li>
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>No coding skills required</span>
                            </li>
                        </ul>
                    </div>
                    <button class="dashboard-action-button" onclick="window.location.href='/inputUser'">
                        <span>Start Building</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Template Card -->
            <div class="dashboard-project-card">
                <div class="dashboard-card-image-side template">
                    <div class="dashboard-card-bg-image"></div>
                    <span class="dashboard-card-tag">Fastest Way</span>
                    <div class="dashboard-card-icon-large">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                </div>
                <div class="dashboard-card-content-side">
                    <div class="dashboard-content-top">
                        <h3>Edit Template</h3>
                        <p>Choose from our professionally designed templates and customize them to match your brand and needs.</p>
                        <ul class="dashboard-content-features">
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>500+ premium ready templates</span>
                            </li>
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>Industry-specific designs</span>
                            </li>
                            <li class="dashboard-feature-item">
                                <div class="dashboard-feature-icon">✓</div>
                                <span>One-click customization</span>
                            </li>
                        </ul>
                    </div>
                    <button class="dashboard-action-button" onclick="window.location.href='/templateso'">
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