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


        /* Rest of the styling */
        .section-title {
            margin: 40px 20px 20px 20px;
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

            .templates-container {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }

        /* Hero section base styles */
        /* Hero section base styles */
        .hero-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 90vh;
            min-height: 500px;
            position: relative;
            overflow: hidden;
        }

        /* Hero content styling */
        .hero-content {
            padding: 3em 2em;
            height: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-family: 'Open Sans', sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        /* Left and right section backgrounds */
        .hero-content.left {
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
                url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-code.png");
        }

        .hero-content.right {
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
                url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-post-its.png");
        }

        /* Typography */
        .hero-content h2 {
            margin-top: 2em font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 0.5em;
        }

        .hero-content p {
            font-size: 1.2em;
            line-height: 1.2;
            margin-bottom: 1.5em;
            max-width: 400px;
        }

        /* Button styling */
        .hero-btn {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            background: none;
            border: 2px solid white;
            border-radius: 5px;
            padding: 0.8em 1.5em;
            font-size: 1em;
            transition: all 0.3s ease;
            color: white;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-content.left .hero-btn:hover {
            background-color: white;
            color: #4576a7;
        }

        .hero-content.right .hero-btn:hover {
            background-color: white;
            color: #ac47a9;
        }

        /* Center divider - optional, remove if not needed */
        .hero-divider {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .hero-divider span {
            color: #333;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Responsive layouts */
        @media (min-width: 768px) {
            .hero-container {
                flex-direction: row;
            }

            .hero-content {
                height: 100%;
                width: 50%;
            }

            .hero-content h2 {
                font-size: 2.8em;
            }

            .hero-content p {
                font-size: 1.3em;
            }
        }

        /* Small screen adjustments */
        @media (max-width: 767px) {
            .hero-container {
                height: auto;
                min-height: 100vh;
            }

            .hero-content {
                padding: 4em 2em;
            }

            .hero-divider {
                top: 50%;
                width: 40px;
                height: 40px;
            }
        }

        /* Plan Section */
        .pricing_1 * {
            font-family: Nunito, sans-serif;
        }

        .pricing_1 .responsive-cell-block {
            min-height: 75px;
        }

        .pricing_1 .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        .pricing_1 .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
        }

        .pricing_1 .responsive-container-block.big-container {
            padding-top: 10px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 30px;
        }

        .pricing_1 .responsive-container-block.container {
            max-width: 1320px;
            padding-top: 10px;
            padding-right: 0px;
            padding-bottom: 10px;
            padding-left: 0px;
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
        }

        .pricing_1 .text-blk.head {
            width: 100%;
            text-align: center;
            font-size: 36px;
            font-weight: 900;
            line-height: 52px;
        }

        .pricing_1 input {
            z-index: 5;
            height: 1.8rem;
            opacity: 0;
            width: 6rem;
            position: absolute;
            cursor: pointer;
            margin-left: -1.5rem;
        }

        .pricing_1 .switch {
            position: relative;
            display: inline-flex;
            width: 51px;
            height: 24px;
            text-align: center;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .pricing_1 .switch-text {
            display: flex;
            align-items: center;
        }

        .pricing_1 .slider {
            z-index: 0;
            position: absolute;
            cursor: pointer;
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            background-color: white;
            border-top-width: 0.5px;
            border-right-width: 0.5px;
            border-bottom-width: 0.5px;
            border-left-width: 0.5px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: #dbdee7;
            border-right-color: #dbdee7;
            border-bottom-color: #dbdee7;
            border-left-color: #dbdee7;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            transition-duration: 0.4s;
            transition-timing-function: ease;
            transition-delay: 0s;
            transition-property: all;
        }

        .pricing_1 .slider::before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: black;
            transition-duration: 0.4s;
            transition-timing-function: ease;
            transition-delay: 0s;
            transition-property: all;
        }

        .pricing_1 input:checked+.slider {
            background-color: white;
        }

        .pricing_1 input:checked+.slider::before {
            transform: translateX(26px);
        }

        .pricing_1 .slider.round {
            border-top-left-radius: 34px;
            border-top-right-radius: 34px;
            border-bottom-right-radius: 34px;
            border-bottom-left-radius: 34px;
        }

        .pricing_1 .slider.round::before {
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .pricing_1 .responsive-container-block.swiping-box {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            min-height: 50px;
            margin-top: 5px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .pricing_1 .d-nones {
            display: none;
        }

        .pricing_1 .card {
            text-align: center;
            width: 350px;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: #dbdee7;
            border-right-color: #dbdee7;
            border-bottom-color: #dbdee7;
            border-left-color: #dbdee7;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            display: flex;
            flex-direction: column;
            position: relative;
            align-items: center;
            min-height: 500px;
            margin-top: 16px;
            margin-bottom: 24px;
            font-size: 18px;
            color: #212529;
            padding-top: 25px;
            padding-right: 25px;
            padding-bottom: 25px;
            padding-left: 25px;
        }

        .pricing_1 .card-selected {
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            color: white;
            border-top-width: initial;
            border-right-width: initial;
            border-bottom-width: initial;
            border-left-width: initial;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            border-left-style: none;
            border-top-color: initial;
            border-right-color: initial;
            border-bottom-color: initial;
            border-left-color: initial;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            background-color: #03a9f4;
            box-shadow: rgba(0, 0, 0, 0.54) 1px 2px 13px -1px;
        }

        .pricing_1 .card-selected .card-text,
        .pricing_1 .card-selected .card-description {
            color: white;
        }

        .pricing_1 .card-description {
            margin-bottom: 8rem;
            color: #686868;
        }

        .pricing_1 .card h1 {
            font-size: 46px;
            line-height: 64px;
            font-weight: 900;
            margin-top: 1rem;
            margin-right: 0px;
            margin-bottom: 1rem;
            margin-left: 0px;
        }

        .pricing_1 .card li {
            line-height: 35px;
            list-style-position: initial;
            list-style-image: initial;
            list-style-type: none;
        }

        .pricing_1 .buy-button {
            bottom: 37px;
            left: 0px;
            position: absolute;
            width: 100%;
            padding-left: 36px;
            padding-right: 36px;
        }

        .pricing_1 .btns {
            background-color: white;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: #dbdee7;
            border-right-color: #dbdee7;
            border-bottom-color: #dbdee7;
            border-left-color: #dbdee7;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 65px;
            border-top-right-radius: 65px;
            border-bottom-right-radius: 65px;
            border-bottom-left-radius: 65px;
            transition-duration: 0.2s;
            transition-timing-function: ease;
            transition-delay: 0s;
            transition-property: transform;
            width: 100%;
            height: 60px;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .pricing_1 .btns:hover {
            text-decoration-line: none;
            text-decoration-thickness: initial;
            text-decoration-style: initial;
            text-decoration-color: initial;
            background-color: white;
            border-top-left-radius: 65px;
            border-top-right-radius: 65px;
            border-bottom-right-radius: 65px;
            border-bottom-left-radius: 65px;
            transform: scale(1.05);
        }

        .pricing_1 .responsive-cell-block.wk-desk-4.wk-ipadp-4.wk-tab-6.wk-mobile-12 {
            display: flex;
            justify-content: center;
            width: auto;
            margin-top: 0px;
            margin-right: 10px;
            margin-bottom: 0px;
            margin-left: 10px;
            max-width: 360px;
        }

        .pricing_1 .text-center.witch.switch-text {
            width: 100%;
            justify-content: center;
            margin-top: 20px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .pricing_1 .responsive-container-block.card-container {
            margin-top: 40px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            justify-content: center;
        }

        .pricing_1 .text-blk.card-points {
            line-height: 35px;
        }

        @media (max-width: 768px) {
            .pricing_1 .text-blk.head {
                font-size: 32px;
                line-height: 40px;
            }
        }

        @media (max-width: 500px) {
            .pricing_1 .card {
                width: 306px;
            }

            .pricing_1 .card.card-selected {
                padding-top: 25px;
                padding-right: 15px;
                padding-bottom: 25px;
                padding-left: 15px;
            }

            .pricing_1 .text-blk.card-points {
                font-size: 15px;
                line-height: 35px;
            }

            .pricing_1 .text-blk {
                font-size: 16px;
            }

            .pricing_1 .text-blk.head {
                font-size: 28px;
                line-height: 34px;
            }

            .pricing_1 .btns {
                font-size: 18px;
                height: 50px;
            }

            .pricing_1 .card.card-selected {
                min-height: 470px;
            }
        }
    </style>
</head>

<body>

    @include('layout.nav')

    <div class="container">
        <div class="welcome-header">
            <h1>Welcome to Your Website Builder</h1>
            <p class="welcome-text">Create beautiful websites in minutes. Choose your preferred way to get started below.
            </p>
        </div>

        <!-- New Two-Column Hero Section -->
        <div class="hero-container">
            <div class="hero-content left">
                <h2>Build from Scratch</h2>
                <p>Start with a blank canvas and create your website exactly how you want it, with complete creative
                    freedom.</p>
                <button class="hero-btn" onclick="window.location.href='{{ route('index') }}'">Start Building</button>
            </div>
            <div class="hero-content right">
                <h2>Edit Template</h2>
                <p>Choose from our professionally designed templates and customize them to match your brand and needs.
                </p>
                <button class="hero-btn" onclick="window.location.href='{{ route('templateso.index') }}'">Browse
                    Templates</button>
            </div>

            <!-- Optional divider - add this if you want a divider between sections -->
            <div class="hero-divider">
                <span>OR</span>
            </div>
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

    
    <h2 class="section-title">Pricing</h2>
    <div class="pricing_1">
        <div class="responsive-container-block big-container">
            <div class="responsive-container-block container">
                <div class="responsive-container-block swiping-box">
                    <div class="text-center witch switch-text">
                        <span>
                            Monthly
                        </span>
                        <div class="switch">
                            <input type="checkbox">
                            <span class="slider round">
                            </span>
                        </div>
                        <span>
                            Yearly
                        </span>
                    </div>
                </div>
                <div class="responsive-container-block card-container">

                    <!-- Starter Plan -->
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card card-selected">
                            <p class="text-blk">Starter</p>
                            <h1 class="monthly-price">$5</h1>
                            <h1 class="d-nones yearly-price">$50</h1>
                
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">5 website templates</p>
                                    <p class="text-blk card-points">Access to basic UI components</p>
                                    <p class="text-blk card-points">Single user</p>
                                    <p class="text-blk card-points">Basic support</p>
                                    <p class="text-blk card-points">Community access</p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">60 templates/year</p>
                                    <p class="text-blk card-points">Priority email support</p>
                                    <p class="text-blk card-points">New component each month</p>
                                    <p class="text-blk card-points">Limited Figma access</p>
                                    <p class="text-blk card-points">Access to changelogs</p>
                                </span>
                            </div>
                
                            <span class="buy-button">
                                <form action="/session" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="plan" value="starter">
                                    <input type="hidden" name="price" value="5">
                                    <button class="btns" type="submit">Buy</button>
                                </form>
                            </span>
                        </div>
                    </div>
                
                    <!-- Pro Plan -->
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card">
                            <p class="text-blk">Pro</p>
                            <h1 class="monthly-price">$10</h1>
                            <h1 class="d-nones yearly-price">$100</h1>
                
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">25 website templates</p>
                                    <p class="text-blk card-points">Full access to all UI kits</p>
                                    <p class="text-blk card-points">Figma components</p>
                                    <p class="text-blk card-points">Unlimited projects</p>
                                    <p class="text-blk card-points">Priority support</p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">300 templates/year</p>
                                    <p class="text-blk card-points">Exclusive component updates</p>
                                    <p class="text-blk card-points">Figma + TailwindCSS files</p>
                                    <p class="text-blk card-points">Early access to features</p>
                                    <p class="text-blk card-points">Slack support channel</p>
                                </span>
                            </div>
                
                            <span class="buy-button">
                                <form action="/session" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="plan" value="pro">
                                    <input type="hidden" name="price" value="10">
                                    <button class="btns" type="submit">Buy</button>
                                </form>
                            </span>
                        </div>
                    </div>
                
                    <!-- Enterprise Plan -->
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card">
                            <p class="text-blk">Enterprise</p>
                            <h1 class="monthly-price">$20</h1>
                            <h1 class="d-nones yearly-price">$200</h1>
                
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">Unlimited templates</p>
                                    <p class="text-blk card-points">All premium UI & UX kits</p>
                                    <p class="text-blk card-points">Design-to-code integrations</p>
                                    <p class="text-blk card-points">Team collaboration</p>
                                    <p class="text-blk card-points">1-on-1 onboarding</p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">All features unlocked</p>
                                    <p class="text-blk card-points">Full license for commercial use</p>
                                    <p class="text-blk card-points">Dedicated account manager</p>
                                    <p class="text-blk card-points">White-label options</p>
                                    <p class="text-blk card-points">Custom component requests</p>
                                </span>
                            </div>
                
                            <span class="buy-button">
                                <form action="/session" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="plan" value="enterprise">
                                    <input type="hidden" name="price" value="20">
                                    <button class="btns" type="submit">Buy</button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <h2 class="section-title">Your Previous Sites</h2>
    <div class="previous-sites-container">
        @foreach ($sites as $site)
            <div class="site-item">
                <div class="site-thumbnail">Site</div>
                <div class="site-info">
                    <div class="site-title">{{ $site->siteName }}</div>
                    <div class="site-date">Last edited: {{ $site->updated_at }}</div>
                </div>
                <div class="site-actions">
                    <button class="site-action-btn edit">Edit</button>
                    <button class="site-action-btn">View</button>
                </div>
            </div>
        @endforeach


        <!-- Empty state (alternative) -->
        @if ($sites->isEmpty())
            <div class="empty-state">
                <p>You haven't created any websites yet. Choose an option above to get started!</p>
            </div>
        @endif
            
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const switchInput = document.querySelector(".switch input[type='checkbox']");
            const monthlyPrices = document.querySelectorAll(".monthly-price");
            const yearlyPrices = document.querySelectorAll(".yearly-price");
            const monthlyPlans = document.querySelectorAll(".monthly-plan");
            const yearlyPlans = document.querySelectorAll(".yearly-plan");
    
            switchInput.addEventListener("change", function () {
                const showYearly = switchInput.checked;
    
                monthlyPrices.forEach(el => el.style.display = showYearly ? "none" : "block");
                yearlyPrices.forEach(el => el.style.display = showYearly ? "block" : "none");
    
                monthlyPlans.forEach(el => el.classList.toggle("d-nones", showYearly));
                yearlyPlans.forEach(el => el.classList.toggle("d-nones", !showYearly));
    
                // Also update the plan input field if needed
                document.querySelectorAll("input[name='plan']").forEach(input => {
                    input.value = showYearly ? "yearly" : "monthly";
                });
    
                // Update the price inputs accordingly
                document.querySelectorAll("input[name='price']").forEach(input => {
                    const price = input.closest("form").parentElement.previousElementSibling.textContent.trim();
                    input.value = price.replace("$", "");
                });
            });
        });
    </script>
    
</body>

</html>
