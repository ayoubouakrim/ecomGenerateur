<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Website Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            margin: 0 auto;

        }

        .welcome-header {
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #2d3748;
        }

        .welcome-text {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: #4a5568;
        }

        /* New hero section styling */
        .hero-container {
            position: relative;
            height: 500px;
            margin-bottom: 30px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .hero-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(120deg, #becde9 50%, #373d5c 50%);
            z-index: 1;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            width: 50%;
            transition: transform 0.3s ease;
        }

        .hero-content.left {
            color: #333;
            text-align: left;
            
        }

        .hero-content.right {
            color: white;
            text-align: right;
            
        }

        .hero-content h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: bold;
            align-self: center

        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            max-width: 80%;
        }

        .hero-content.left p {
            align-self: center;
        }

        .hero-content.right p {
            align-self: center
        }

        .hero-btn {
            background-color: #4299e1;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            align-self: center;
        }

        .hero-content.right .hero-btn {
            align-self: center;
            background-color: white;
            color: #373d5c;

        }

        .hero-btn:hover {
            background-color: #3182ce;
            transform: translateY(-3px);
        }

        .hero-content.right .hero-btn:hover {
            background-color: #f0f0ff;
        }

        /* Rest of the styling */
        .section-title {
            margin: 40px 0 20px;
            font-size: 1.8rem;
            color: #2d3748;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        }

        .templates-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .template-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .template-card:hover {
            transform: translateY(-3px);
        }

        .template-img {
            width: 100%;
            height: 140px;
            background-color: #edf2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
        }

        .template-info {
            padding: 15px;
        }

        .template-name {
            font-size: 1rem;
            margin-bottom: 5px;
            color: #2d3748;
        }

        .template-category {
            font-size: 0.8rem;
            color: #718096;
        }

        .previous-sites-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }

        .site-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #edf2f7;
            transition: background-color 0.2s ease;
        }

        .site-item:hover {
            background-color: #f7fafc;
        }

        .site-item:last-child {
            border-bottom: none;
        }

        .site-thumbnail {
            width: 60px;
            height: 60px;
            background-color: #edf2f7;
            border-radius: 6px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
        }

        .site-info {
            flex-grow: 1;
        }

        .site-title {
            font-weight: 600;
            margin-bottom: 4px;
            color: #2d3748;
        }

        .site-date {
            font-size: 0.8rem;
            color: #718096;
        }

        .site-actions {
            display: flex;
            gap: 10px;
        }

        .site-action-btn {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #4a5568;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .site-action-btn:hover {
            background-color: #f7fafc;
            border-color: #cbd5e0;
        }

        .site-action-btn.edit {
            color: #4299e1;
            border-color: #bee3f8;
        }

        .site-action-btn.edit:hover {
            background-color: #ebf8ff;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #718096;
        }

        @media (max-width: 768px) {
            .hero-container {
                flex-direction: column;
                height: auto;
            }

            .hero-container::before {
                background: linear-gradient(180deg, #becde9 50%, #373d5c 50%);
            }

            .hero-content {
                width: 100%;
                padding: 30px;
            }

            .hero-content.left {
                text-align: center;
            }

            .hero-content.right {
                text-align: center;
            }

            .hero-content p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-content.right .hero-btn,
            .hero-content.left .hero-btn {
                align-self: center;
            }

            .templates-container {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="welcome-header">
            <h1>Welcome to Your Website Builder</h1>
            <p class="welcome-text">Create beautiful websites in minutes. Choose your preferred way to get started below.
            </p>
        </div>

        <!-- New Two-Column Hero Section -->
        <!-- Hero Section HTML -->
        <div class="hero-container">
            <div class="hero-content left">
                <h2>Build from Scratch</h2>
                <p>Start with a blank canvas and create your website exactly how you want it, with complete creative
                    freedom.</p>
                <button class="hero-btn">Start Building</button>
            </div>
            <div class="hero-content right">
                <h2>Edit Template</h2>
                <p>Choose from our professionally designed templates and customize them to match your brand and needs.
                </p>
                <button class="hero-btn">Browse Templates</button>
            </div>
        </div>

        <h2 class="section-title">Available Templates</h2>
        <div class="templates-container">
            <!-- Template 1 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Business Pro</h3>
                    <div class="template-category">Business</div>
                </div>
            </div>

            <!-- Template 2 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Portfolio Plus</h3>
                    <div class="template-category">Portfolio</div>
                </div>
            </div>

            <!-- Template 3 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Blog Standard</h3>
                    <div class="template-category">Blog</div>
                </div>
            </div>

            <!-- Template 4 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">E-Commerce Shop</h3>
                    <div class="template-category">E-Commerce</div>
                </div>
            </div>

            <!-- Template 5 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Restaurant Menu</h3>
                    <div class="template-category">Restaurant</div>
                </div>
            </div>
        </div>

        <h2 class="section-title">Your Previous Sites</h2>
        <div class="previous-sites-container">
            <!-- Site 1 -->
            <div class="site-item">
                <div class="site-thumbnail">Site</div>
                <div class="site-info">
                    <div class="site-title">My Business Website</div>
                    <div class="site-date">Last edited: March 12, 2025</div>
                </div>
                <div class="site-actions">
                    <button class="site-action-btn edit">Edit</button>
                    <button class="site-action-btn">View</button>
                </div>
            </div>

            <!-- Site 2 -->
            <div class="site-item">
                <div class="site-thumbnail">Site</div>
                <div class="site-info">
                    <div class="site-title">Personal Blog</div>
                    <div class="site-date">Last edited: February 25, 2025</div>
                </div>
                <div class="site-actions">
                    <button class="site-action-btn edit">Edit</button>
                    <button class="site-action-btn">View</button>
                </div>
            </div>

            <!-- Empty state (alternative) -->
            <!--
            <div class="empty-state">
                <p>You haven't created any websites yet. Choose an option above to get started!</p>
            </div>
            -->
        </div>
    </div>
</body>

</html>
