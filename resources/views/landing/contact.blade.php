<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Contact Section</title>
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

        /* Contact Section */
        .contact {
            position: relative;
            padding: 5rem 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            overflow: hidden;
        }

        /* Animated background */
        .contact::before {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.15), transparent 70%);
            border-radius: 50%;
            animation: float-slow 20s ease-in-out infinite;
        }

        .contact::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.12), transparent 70%);
            border-radius: 50%;
            animation: float-slow 25s ease-in-out infinite reverse;
        }

        @keyframes float-slow {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, -30px); }
        }

        .contact-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Two Column Layout */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        /* Left Side - Info */
        .contact-info-side {
            color: white;
        }

        .contact-main-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #f1f5f9;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .contact-title-highlight {
            color: #60a5fa;
        }

        .contact-description {
            font-size: 1.05rem;
            color: #cbd5e1;
            line-height: 1.6;
            margin-bottom: 2.5rem;
        }

        /* Contact Details */
        .contact-details-list {
            list-style: none;
        }

        .contact-detail-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .contact-detail-item:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(8px);
        }

        .contact-detail-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .contact-detail-content {
            flex: 1;
        }

        .contact-detail-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: #f1f5f9;
        }

        /* Social Links */
        .contact-social {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .contact-social-link {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e1;
            font-size: 1.1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .contact-social-link:hover {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
        }

        /* Right Side - Form */
        .contact-form-side {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .contact-form-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 1.75rem;
        }

        .contact-form-group {
            margin-bottom: 1.25rem;
        }

        .contact-form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
        }

        .contact-form-input,
        .contact-form-textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            color: #f1f5f9;
            transition: all 0.3s ease;
            background: rgba(15, 23, 42, 0.5);
        }

        .contact-form-input:focus,
        .contact-form-textarea:focus {
            outline: none;
            border-color: #60a5fa;
            background: rgba(15, 23, 42, 0.7);
            box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.1);
        }

        .contact-form-input::placeholder,
        .contact-form-textarea::placeholder {
            color: #64748b;
        }

        .contact-form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .contact-submit-btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            margin-top: 0.5rem;
        }

        .contact-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }

        .contact-submit-btn:active {
            transform: translateY(0);
        }

        /* Response message */
        .contact-response-note {
            margin-top: 1rem;
            padding: 0.75rem 1rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 8px;
            font-size: 0.875rem;
            color: #34d399;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .contact-response-note i {
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .contact-info-side {
                text-align: center;
            }

            .contact-details-list {
                max-width: 500px;
                margin: 0 auto;
            }

            .contact-social {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .contact {
                padding: 3.5rem 0;
            }

            .contact-main-title {
                font-size: 2rem;
            }

            .contact-form-side {
                padding: 2rem;
            }

            .contact-detail-item:hover {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <section id="contact" class="contact">
        <div class="contact-wrapper">
            <div class="contact-grid">
                <!-- Left Side - Contact Info -->
                <div class="contact-info-side">
                    <h2 class="contact-main-title">
                        Let's <span class="contact-title-highlight">Start Building</span> Together
                    </h2>
                    <p class="contact-description">
                        Have questions about our platform? Want to discuss a custom solution? Our team is here to help you create something amazing.
                    </p>

                    <ul class="contact-details-list">
                        <li class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-detail-content">
                                <div class="contact-detail-label">Email Us</div>
                                <div class="contact-detail-value">hello@webtorch.com</div>
                            </div>
                        </li>
                        <li class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-detail-content">
                                <div class="contact-detail-label">Call Us</div>
                                <div class="contact-detail-value">+1 (555) 123-4567</div>
                            </div>
                        </li>
                        <li class="contact-detail-item">
                            <div class="contact-detail-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-detail-content">
                                <div class="contact-detail-label">Visit Us</div>
                                <div class="contact-detail-value">San Francisco, CA 94102</div>
                            </div>
                        </li>
                    </ul>

                    <div class="contact-social">
                        <a href="#" class="contact-social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="contact-social-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="contact-social-link">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="contact-social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="contact-social-link">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Side - Contact Form -->
                <div class="contact-form-side">
                    <h3 class="contact-form-title">Send us a message</h3>
                    <form>
                        <div class="contact-form-group">
                            <label class="contact-form-label">Your Name</label>
                            <input type="text" class="contact-form-input" placeholder="John Doe" required>
                        </div>
                        <div class="contact-form-group">
                            <label class="contact-form-label">Your Email</label>
                            <input type="email" class="contact-form-input" placeholder="john@example.com" required>
                        </div>
                        <div class="contact-form-group">
                            <label class="contact-form-label">Your Message</label>
                            <textarea class="contact-form-textarea" placeholder="Tell us what's on your mind..." rows="5" required></textarea>
                        </div>
                        <button type="submit" class="contact-submit-btn">
                            Send Message
                        </button>
                        <div class="contact-response-note">
                            <i class="fas fa-clock"></i>
                            <span>We typically respond within 24 hours</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>