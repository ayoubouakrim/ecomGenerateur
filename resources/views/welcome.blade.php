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
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
            border-top: 1px solid rgba(255,255,255,0.1);
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-content, .feature-card, .contact-form {
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
                <a href="{{route('login.show')}}" class="btn btn-login">Login</a>
                <a href="{{route('register')}}" class="btn btn-signup">Sign Up</a>
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