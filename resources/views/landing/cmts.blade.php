<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Testimonials Section</title>
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

        /* Testimonials Section */
        .testimonials {
            position: relative;
            padding: 5rem 0;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            overflow: hidden;
        }

        /* Background decoration */
        .testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.04) 0%, transparent 50%);
            pointer-events: none;
        }

        .testimonials-wrapper {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Section Header */
        .testimonials-heading {
            text-align: center;
            margin-bottom: 3rem;
        }

        .testimonials-main-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .testimonials-highlight {
            color: #60a5fa;
        }

        .testimonials-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* Bento Grid Layout */
        .testimonials-bento {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        /* Testimonial Card */
        .testimonial-item {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid #e2e8f0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .testimonial-item::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, var(--testimonial-color-start), var(--testimonial-color-end));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .testimonial-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: transparent;
        }

        .testimonial-item:hover::before {
            opacity: 1;
        }

        /* Bento sizes */
        .testimonial-large {
            grid-column: span 6;
        }

        .testimonial-medium {
            grid-column: span 6;
        }

        .testimonial-small {
            grid-column: span 4;
        }

        /* Colors per card */
        .testimonial-item:nth-child(1) {
            --testimonial-color-start: #3b82f6;
            --testimonial-color-end: #60a5fa;
        }

        .testimonial-item:nth-child(2) {
            --testimonial-color-start: #ec4899;
            --testimonial-color-end: #f472b6;
        }

        .testimonial-item:nth-child(3) {
            --testimonial-color-start: #10b981;
            --testimonial-color-end: #34d399;
        }

        .testimonial-item:nth-child(4) {
            --testimonial-color-start: #f59e0b;
            --testimonial-color-end: #fbbf24;
        }

        .testimonial-item:nth-child(5) {
            --testimonial-color-start: #8b5cf6;
            --testimonial-color-end: #a78bfa;
        }

        /* Quote Icon */
        .testimonial-quote-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--testimonial-color-start), var(--testimonial-color-end));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        /* Rating Stars */
        .testimonial-rating {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1rem;
        }

        .testimonial-rating i {
            color: #fbbf24;
            font-size: 0.9rem;
        }

        /* Content */
        .testimonial-text {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex: 1;
        }

        /* Author Section */
        .testimonial-author-section {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .testimonial-avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--testimonial-color-start), var(--testimonial-color-end));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .testimonial-author-details {
            flex: 1;
        }

        .testimonial-author-name {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
            margin-bottom: 0.2rem;
        }

        .testimonial-author-role {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 500;
        }

        /* Verification Badge */
        .testimonial-verified {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.7rem;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #059669;
        }

        .testimonial-verified i {
            font-size: 0.7rem;
        }

        /* Stats Badge (optional) */
        .testimonial-stat {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            padding: 0.4rem 0.8rem;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #3b82f6;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .testimonial-large,
            .testimonial-medium,
            .testimonial-small {
                grid-column: span 6;
            }
        }

        @media (max-width: 768px) {
            .testimonials {
                padding: 3.5rem 0;
            }

            .testimonials-main-title {
                font-size: 2rem;
            }

            .testimonials-bento {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .testimonial-large,
            .testimonial-medium,
            .testimonial-small {
                grid-column: span 1;
            }

            .testimonial-item {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <section class="testimonials">
        <div class="testimonials-wrapper">
            <div class="testimonials-heading">
                <h2 class="testimonials-main-title">
                    What our <span class="testimonials-highlight">customers say</span>
                </h2>
                <p class="testimonials-subtitle">
                    Join thousands of satisfied users building their online presence with WebTorch.
                </p>
            </div>

            <div class="testimonials-bento">
                <!-- Testimonial 1 - Large -->
                <div class="testimonial-item testimonial-large">
                    <div class="testimonial-quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        WebTorch made it so easy to build my restaurant website. The AI tools helped me create content quickly, and the editor was intuitive. Launched in just a few hours!
                    </p>
                    <div class="testimonial-author-section">
                        <div class="testimonial-avatar">JD</div>
                        <div class="testimonial-author-details">
                            <div class="testimonial-author-name">Jane Doe</div>
                            <div class="testimonial-author-role">Restaurant Owner</div>
                        </div>
                        <div class="testimonial-verified">
                            <i class="fas fa-check-circle"></i>
                            Verified
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 - Large -->
                <div class="testimonial-item testimonial-large">
                    <div class="testimonial-quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        As a freelancer, I needed a portfolio that stood out. The templates were perfect as a starting point, and I could customize everything to match my style. Very impressed!
                    </p>
                    <div class="testimonial-author-section">
                        <div class="testimonial-avatar">MS</div>
                        <div class="testimonial-author-details">
                            <div class="testimonial-author-name">Michael Smith</div>
                            <div class="testimonial-author-role">Graphic Designer</div>
                        </div>
                        <div class="testimonial-verified">
                            <i class="fas fa-check-circle"></i>
                            Verified
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 - Small -->
                <div class="testimonial-item testimonial-small">
                    <div class="testimonial-quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        Our e-commerce store looks professional and converts well. The built-in analytics help us understand our customers better.
                    </p>
                    <div class="testimonial-author-section">
                        <div class="testimonial-avatar">AL</div>
                        <div class="testimonial-author-details">
                            <div class="testimonial-author-name">Amanda Lee</div>
                            <div class="testimonial-author-role">E-commerce Owner</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 - Small -->
                <div class="testimonial-item testimonial-small">
                    <div class="testimonial-quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        Super fast and reliable. My blog is now live and getting great engagement. Best decision I made!
                    </p>
                    <div class="testimonial-author-section">
                        <div class="testimonial-avatar">TC</div>
                        <div class="testimonial-author-details">
                            <div class="testimonial-author-name">Tom Chen</div>
                            <div class="testimonial-author-role">Blogger</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 5 - Small -->
                <div class="testimonial-item testimonial-small">
                    <div class="testimonial-quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        The AI builder saved me so much time. From idea to launch in under an hour. Incredible!
                    </p>
                    <div class="testimonial-author-section">
                        <div class="testimonial-avatar">SK</div>
                        <div class="testimonial-author-details">
                            <div class="testimonial-author-name">Sarah Kim</div>
                            <div class="testimonial-author-role">Startup Founder</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>