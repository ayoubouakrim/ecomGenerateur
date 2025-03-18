<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Generator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #06b6d4;
            --accent: #f472b6;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --bg-dark: #111827;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-light);
        }

        /* Navigation */
        nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-login {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-signup {
            background: var(--primary);
            border: 2px solid var(--primary);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-light) 0%, #eef2ff 100%);
            display: flex;
            align-items: center;
            padding: 4rem 1rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('/path/to/pattern.svg');
            opacity: 0.1;
        }

        .hero-content {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .cta-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .cta-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Features Section */
        .features {
            padding: 2rem 2rem;
            background: white;
        }

        .section-title {
            text-align: center;
            margin: 0 auto 4rem auto;
            max-width: 800px;
            padding: 0 1rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .section-title p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            padding: 2rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .feature-card p {
            color: var(--text-light);
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


        /* Contact Section */
        .contact {
            padding: 2rem 2rem;
            background: var(--bg-light);
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .submit-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            width: 100%;
        }

        .submit-button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            background: var(--bg-dark);
            color: white;
            padding: 4rem 2rem 1rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.75rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding: 4rem 1rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .features {
                padding: 4rem 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .contact {
                padding: 4rem 1rem;
            }

            .contact-form {
                padding: 2rem;
            }

            .footer {
                padding: 3rem 1rem 1rem;
            }

            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content,
        .feature-card,
        .contact-form {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="logo">WebGen</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#templates">Templates</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ route('login.show') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-signup">Sign Up</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1>Create Your Website in Minutes</h1>
            <p>No coding required. Just drag, drop, and publish!</p>
            <button class="cta-button">Start Building Free</button>
        </div>
    </header>

    <div class="pricing_1">
        <div class="responsive-container-block big-container">
            <div class="responsive-container-block container">
                <p class="text-blk head">
                    Pricing
                </p>
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
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card card-selected">
                            <p class="text-blk">
                                Penatibus massa diam.
                            </p>
                            <h1 class="monthly-price">
                                $5
                            </h1>
                            <h1 class="d-nones yearly-price">
                                $100
                            </h1>
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">
                                        In enim etiam aliquet.
                                    </p>
                                    <p class="text-blk card-points">
                                        Ultricies diam arcu.
                                    </p>
                                    <p class="text-blk card-points">
                                        Pellentesque elementum.
                                    </p>
                                    <p class="text-blk card-points">
                                        Leo adipiscing adipiscing.
                                    </p>
                                    <p class="text-blk card-points">
                                        Mattis diam amet.
                                    </p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">
                                        Risus donec magna turpis.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lorem nibh odio montes.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lacus volutpat nunc leo at.
                                    </p>
                                    <p class="text-blk card-points">
                                        Arcu in augue nunc risus.
                                    </p>
                                    <p class="text-blk card-points">
                                        Ornare vestibulum.
                                    </p>
                                </span>
                            </div>
                            <span class="buy-button">
                                <form action="/session" method="POST">
                                   
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="plan" value="monthly">
                                    <input type="hidden" name="price" value="5">

                                    <button class="btns" type="submit">
                                        Buy
                                    </button>
                                </form>
                                
                            </span>
                        </div>
                    </div>
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card">
                            <p class="text-blk">
                                Penatibus massa diam.
                            </p>
                            <h1 class="monthly-price">
                                $10
                            </h1>
                            <h1 class="d-nones yearly-price">
                                $500
                            </h1>
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">
                                        Risus donec magna turpis.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lorem nibh odio montes.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lacus volutpat nunc leo at.
                                    </p>
                                    <p class="text-blk card-points">
                                        Arcu in augue nunc risus.
                                    </p>
                                    <p class="text-blk card-points">
                                        Ornare vestibulum.
                                    </p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">
                                        Vulputate sem venenatis.
                                    </p>
                                    <p class="text-blk card-points">
                                        Vulputate sem venenatis.
                                    </p>
                                    <p class="text-blk card-points">
                                        Aliquam enim habitant.
                                    </p>
                                    <p class="text-blk card-points">
                                        Nunc eu eu dolor ac arcu.
                                    </p>
                                    <p class="text-blk card-points">
                                        Id viverra hac sed semper.
                                    </p>
                                </span>
                            </div>
                            <span class="buy-button">
                                <button class="btns" type="button">
                                    Buy
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="responsive-cell-block wk-desk-4 wk-ipadp-4 wk-tab-6 wk-mobile-12">
                        <div class="card">
                            <p class="text-blk">
                                Penatibus massa diam.
                            </p>
                            <h1 class="monthly-price">
                                $20
                            </h1>
                            <h1 class="d-nones yearly-price">
                                $800
                            </h1>
                            <div class="card-description">
                                <span class="monthly-plan">
                                    <p class="text-blk card-points">
                                        In enim etiam aliquet.
                                    </p>
                                    <p class="text-blk card-points">
                                        Ultricies diam arcu.
                                    </p>
                                    <p class="text-blk card-points">
                                        Pellentesque elementum.
                                    </p>
                                    <p class="text-blk card-points">
                                        Leo adipiscing adipiscing.
                                    </p>
                                    <p class="text-blk card-points">
                                        Mattis diam amet.
                                    </p>
                                </span>
                                <span class="yearly-plan d-nones">
                                    <p class="text-blk card-points">
                                        Risus donec magna turpis.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lorem nibh odio montes.
                                    </p>
                                    <p class="text-blk card-points">
                                        Lacus volutpat nunc leo at.
                                    </p>
                                    <p class="text-blk card-points">
                                        Arcu in augue nunc risus.
                                    </p>
                                    <p class="text-blk card-points">
                                        Ornare vestibulum.
                                    </p>
                                </span>
                            </div>
                            <span class="buy-button">
                                <button class="btns" type="button">
                                    Buy
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="features" class="features">
        <div class="section-title">
            <h2>Why Choose Us</h2>
            <p>Transform your ideas into reality with our powerful website builder</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-pencil-ruler fa-2x"></i>
                <h3>Drag & Drop Builder</h3>
                <p>Build your website visually with our intuitive interface.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-mobile-alt fa-2x"></i>
                <h3>Responsive Design</h3>
                <p>Your website looks great on all devices.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-globe fa-2x"></i>
                <h3>SEO Friendly</h3>
                <p>Optimize your site for search engines easily.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-code fa-2x"></i>
                <h3>Clean Code</h3>
                <p>Generate well-structured, maintainable code that follows best practices.</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="contact-container">
            <div class="section-title">
                <h2>Get in Touch</h2>
                <p>Have questions? We'd love to hear from you.</p>
            </div>
            <form class="contact-form">
                <div class="form-group">
                    <input type="text" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-button">Send Message</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>WebGen</h3>
                <p>Create beautiful websites in minutes with our easy-to-use website generator.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#templates">Templates</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect</h3>
                <ul>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 WebGen. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
