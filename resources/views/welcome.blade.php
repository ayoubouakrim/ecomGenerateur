<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTorch</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            /* Core color palette */
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #ec4899;
            --secondary-dark: #db2777;
            --secondary-light: #f472b6;
            --accent-1: #10b981;
            --accent-2: #f59e0b;
            --accent-3: #3b82f6;
            --dark: #0f172a;
            --dark-2: #1e293b;
            --light: #f8fafc;
            --light-2: #f1f5f9;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;

            /* Functional colors */
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;

            /* Typography */
            --font-family: 'Inter', system-ui, -apple-system, sans-serif;
            --heading-line-height: 1.2;
            --body-line-height: 1.6;

            /* Spacing */
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            --space-3xl: 4rem;

            /* Animations */
            --transition-fast: 150ms ease;
            --transition-normal: 250ms ease;
            --transition-slow: 350ms ease;

            /* Border radius */
            --radius-sm: 0.25rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--light);
            color: var(--gray-800);
            line-height: var(--body-line-height);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: var(--heading-line-height);
            font-weight: 700;
            color: var(--gray-900);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
            color: var(--primary);
            transition: color var(--transition-fast);
        }

        a:hover {
            color: var(--primary-dark);
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 var(--space-lg);
        }

        /* Utility classes */
        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
        }

        .gap-sm {
            gap: var(--space-sm);
        }

        .gap-md {
            gap: var(--space-md);
        }

        .gap-lg {
            gap: var(--space-lg);
        }

        .gap-xl {
            gap: var(--space-xl);
        }

        .w-full {
            width: 100%;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .z-10 {
            z-index: 10;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .hidden {
            display: none;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 0.5rem 5%;
            position: relative;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-links {
            display: flex;
            list-style: none;
            margin: 0 auto;
        }

        .navbar .nav-links li {
            margin-left: 0.5rem;
            position: relative;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        /* Hover effect with background */
        .navbar .nav-links a:hover {
            color: #3498db;

        }

        /* Active link style */
        .navbar .nav-links a.active {
            color: #3498db;

            font-weight: 600;
        }

        /* Underline effect */
        .navbar .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #3498db;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .nav-links a:hover::after,
        .navbar .nav-links a.active::after {
            width: 80%;
        }

        /* Dropdown styles */
        .navbar .nav-links .dropdown {
            position: relative;
        }



        .navbar .nav-links .dropdown:hover .dropdown-content {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }





        .navbar .hamburger {
            display: none;
            cursor: pointer;
        }

        .navbar .hamburger div {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray-700);
            font-size: 1.5rem;
        }

        


        /* FAQ Section */
        .faq {
            padding: var(--space-3xl) 0;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: var(--space-md);
        }

        .faq-question {
            padding: var(--space-md) 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .question-text {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--gray-800);
        }

        .question-icon {
            color: var(--gray-500);
            font-size: 1.2rem;
            transition: transform var(--transition-fast);
        }

        .faq-item.active .question-icon {
            transform: rotate(180deg);
            color: var(--primary);
        }

        .faq-answer {
            padding-bottom: var(--space-lg);
            color: var(--gray-600);
            line-height: 1.6;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* CTA Section */
        .cta {
            padding: var(--space-3xl) 0;
            background: linear-gradient(135deg, #2E3148 0%, #0F1528 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .cta-container {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: var(--space-lg);
            background: linear-gradient(to right, #fff, #d1d5db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cta-description {
            font-size: 1.1rem;
            color: var(--gray-300);
            margin-bottom: var(--space-2xl);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        .footer {
            padding: var(--space-2xl) 0;
            background-color: var(--dark);
            color: var(--gray-300);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: var(--space-xl);
            margin-bottom: var(--space-2xl);
        }

        .footer-brand {
            margin-bottom: var(--space-lg);
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .footer-description {
            color: var(--gray-400);
            margin-bottom: var(--space-lg);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: var(--space-md);
        }

        .social-link {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--dark-2);
            color: var(--gray-300);
            transition: all var(--transition-fast);
        }

        .social-link:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            margin-bottom: var(--space-lg);
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: var(--space-md);
        }

        .footer-link a {
            color: var(--gray-400);
            transition: color var(--transition-fast);
            font-size: 0.95rem;
        }

        .footer-link a:hover {
            color: var(--primary-light);
        }

        .footer-divider {
            height: 1px;
            background-color: var(--dark-2);
            margin-bottom: var(--space-lg);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--gray-500);
        }

        .footer-legal a {
            color: var(--gray-400);
            margin-left: var(--space-md);
            transition: color var(--transition-fast);
        }

        .footer-legal a:hover {
            color: var(--primary-light);
        }

        /* Mobile Responsive Styles */
        @media (max-width: 1024px) {
            .hero-heading {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-heading {
                font-size: 2.5rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .options-container {
                flex-direction: column;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                padding: var(--space-lg);
                flex-direction: column;
                gap: var(--space-md);
                z-index: 99;
            }

            .nav-menu.show {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }

            .footer-bottom {
                flex-direction: column;
                gap: var(--space-md);
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .hero-heading {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .btn-group {
                flex-direction: column;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }

            .templates-header {
                flex-direction: column;
                gap: var(--space-md);
                align-items: flex-start;
            }

            .templates-filters {
                overflow-x: auto;
                width: 100%;
                padding-bottom: var(--space-sm);
            }

            .sites-header {
                flex-direction: column;
                gap: var(--space-md);
                align-items: flex-start;
            }

            .site-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-md);
            }

            .site-thumbnail {
                width: 100%;
                height: 100px;
                margin-right: 0;
            }

            .site-actions {
                width: 100%;
                justify-content: space-between;
            }
        }

        /* Mobile styles */
        @media screen and (max-width: 768px) {
            .navbar .hamburger {
                display: block;
            }

            .navbar .nav-links {
                position: fixed;
                right: -100%;
                top: 70px;
                flex-direction: column;
                background-color: #ffffff;
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
                padding: 20px 0;
            }

            .navbar .nav-links.active {
                right: 0;
            }

            .navbar .nav-links li {
                margin: 1rem 0;
            }



            .navbar .nav-links a::after {
                bottom: -3px;
            }
        }



        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .close-modal {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: #000;
            text-decoration: none;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            margin-top: 20px;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="http://127.0.0.1:8000/assets/components/logo.svg" alt="Company Logo">

        </div>

        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Contact</a>
            </li>
        </ul>
        <div class="nav-actions">
            <a href="{{ route('login.show') }}" class="nav-link">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
        </div>
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    @include('landing.hero')

    @include('landing.options')

    @include('landing.features')

    @include('landing.pricing')


    <!-- Templates Section -->
    @include('landing.templates')

    @include('landing.contact')

    <!-- Testimonials Section -->
    @include('landing.cmts')>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Find answers to common questions about WebTorch and our website builder
                    platform.</p>
            </div>
            <div class="faq-container">
                <div class="faq-item active">
                    <div class="faq-question">
                        <div class="question-text">Do I need coding knowledge to use WebTorch?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        No, you don't need any coding experience to build a website with WebTorch. Our visual editor and
                        AI tools make it easy for anyone to create professional websites. If you do know code, we also
                        provide options to add custom HTML, CSS, and JavaScript.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Can I use my own domain name?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, all plans allow you to connect your own custom domain name. We provide easy instructions
                        for connecting domains purchased from any registrar, or you can purchase a domain directly
                        through WebTorch for added convenience.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">How does the AI website builder work?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Our AI builder asks you a series of questions about your business, preferences, and goals. Based
                        on your answers, it generates a custom website with appropriate sections, content, and imagery.
                        You can then refine and customize the result using our visual editor.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Can I sell products on my website?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, our Professional and Business plans include e-commerce capabilities. You can set up an
                        online store, manage products, process payments, and handle shipping. The Professional plan
                        supports up to 100 products, while the Business plan offers unlimited products.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Is there a free trial available?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, we offer a 14-day free trial on all plans. You can explore all features and even publish
                        your site during the trial period. No credit card is required to start your trial, and you can
                        upgrade to a paid plan anytime.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-pattern"></div>
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Ready to build your website?</h2>
                <p class="cta-description">Start your free 14-day trial today. No credit card required. Cancel anytime.
                </p>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        Get Started Now
                    </a>
                    <a href="#" class="btn btn-light">
                        <i class="fas fa-headset"></i>
                        Talk to Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-brand">
                        <a href="#" class="footer-logo">
                            <i class="fas fa-fire"></i>
                            WebTorch
                        </a>
                        <p class="footer-description">Powerful website builder platform for businesses and
                            professionals. Create stunning websites with ease.</p>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Product</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Features</a></li>
                        <li class="footer-link"><a href="#">Templates</a></li>
                        <li class="footer-link"><a href="#">AI Builder</a></li>
                        <li class="footer-link"><a href="#">Pricing</a></li>
                        <li class="footer-link"><a href="#">Updates</a></li>
                        <li class="footer-link"><a href="#">Roadmap</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Resources</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Blog</a></li>
                        <li class="footer-link"><a href="#">Tutorials</a></li>
                        <li class="footer-link"><a href="#">Documentation</a></li>
                        <li class="footer-link"><a href="#">Community</a></li>
                        <li class="footer-link"><a href="#">Support Center</a></li>
                        <li class="footer-link"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3 class="footer-title">Company</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">About Us</a></li>
                        <li class="footer-link"><a href="#">Careers</a></li>
                        <li class="footer-link"><a href="#">Partners</a></li>
                        <li class="footer-link"><a href="#">Press Kit</a></li>
                        <li class="footer-link"><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-bottom">
                <div class="copyright">© 2025 WebTorch. All rights reserved.</div>
                <div class="footer-legal">
                    <a href="#">Terms of Service</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('show-video-btn').addEventListener('click', function() {
            document.getElementById('video-modal').style.display = 'flex'; // Show modal
            document.getElementById('demo-video').play(); // Play the video
        });

        document.querySelector('.close-modal').addEventListener('click', function() {
            document.getElementById('video-modal').style.display = 'none'; // Hide modal
            document.getElementById('demo-video').pause(); // Pause video
            document.getElementById('demo-video').currentTime = 0; // Reset video
        });

        // Close modal if clicked outside
        window.addEventListener('click', function(e) {
            if (e.target === document.getElementById('video-modal')) {
                document.getElementById('video-modal').style.display = 'none'; // Hide modal
                document.getElementById('demo-video').pause(); // Pause video
                document.getElementById('demo-video').currentTime = 0; // Reset video
            }
        });

        // JavaScript for toggle menu functionality
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('show');
        });

        // FAQ toggle
        document.querySelectorAll('.faq-question').forEach(item => {
            item.addEventListener('click', event => {
                const parent = item.parentNode;
                parent.classList.toggle('active');
            });
        });

        // Pricing toggle
        document.getElementById('billing-toggle').addEventListener('change', function() {
            const monthlyPrices = ['$12', '$29', '$79'];
            const annualPrices = ['$9.6', '$23.2', '$63.2'];
            const prices = document.querySelectorAll('.pricing-price');

            if (this.checked) {
                // Annual pricing
                prices.forEach((price, index) => {
                    price.innerHTML = annualPrices[index] + '<span class="pricing-period">/month</span>';
                });
            } else {
                // Monthly pricing
                prices.forEach((price, index) => {
                    price.innerHTML = monthlyPrices[index] + '<span class="pricing-period">/month</span>';
                });
            }
        });



    </script>
</body>

</html>
