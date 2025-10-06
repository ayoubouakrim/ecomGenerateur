<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Pricing Section</title>
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

        /* Pricing Section */
        .pricing {
            position: relative;
            padding: 1rem 0 3rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
            overflow: hidden;
        }

        /* Subtle decorative elements */
        .pricing::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .pricing-content {
            position: relative;
            z-index: 10;
        }

        /* Pricing Section Header */
        .pricing-heading {
            text-align: center;
            margin-bottom: 3rem;
        }

        .pricing-main-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .pricing-main-title .pricing-highlight {
            color: #60a5fa;
        }

        .pricing-subtitle {
            font-size: 1.15rem;
            color: #64748b;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Pricing Toggle */
        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 4rem;
        }

        .pricing-toggle-label {
            font-weight: 600;
            font-size: 1rem;
            color: #64748b;
            transition: color 0.3s ease;
        }

        .pricing-toggle-label.active {
            color: #0f172a;
        }

        .pricing-save-badge {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 0.35rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-left: 0.5rem;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25);
        }

        .pricing-toggle-switch {
            position: relative;
            width: 56px;
            height: 32px;
        }

        .pricing-toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .pricing-toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #e2e8f0;
            transition: all 0.3s ease;
            border-radius: 34px;
        }

        .pricing-toggle-slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 24px;
            left: 4px;
            bottom: 4px;
            background: white;
            transition: all 0.3s ease;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .pricing-toggle-switch input:checked + .pricing-toggle-slider {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .pricing-toggle-switch input:checked + .pricing-toggle-slider:before {
            transform: translateX(24px);
        }

        /* Pricing Grid */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Pricing Card */
        .pricing-card {
            position: relative;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: visible;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 24px;
            padding: 2px;
            background: linear-gradient(135deg, var(--pricing-gradient-start), var(--pricing-gradient-end));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .pricing-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border-color: transparent;
        }

        .pricing-card:hover::before {
            opacity: 1;
        }

        /* Popular Card */
        .pricing-card-popular {
            border-color: #60a5fa;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
            transform: scale(1.05);
        }

        .pricing-card-popular::before {
            opacity: 1;
        }

        .pricing-card-popular:hover {
            transform: translateY(-12px) scale(1.05);
            box-shadow: 0 25px 50px rgba(59, 130, 246, 0.2);
        }

        .pricing-popular-badge {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            color: white;
            padding: 0.5rem 1.3rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.35);
        }

        /* Card Colors */
        .pricing-card:nth-child(1) { 
            --pricing-gradient-start: #3b82f6; 
            --pricing-gradient-end: #60a5fa;
        }
        .pricing-card:nth-child(2) { 
            --pricing-gradient-start: #8b5cf6; 
            --pricing-gradient-end: #a78bfa;
        }
        .pricing-card:nth-child(3) { 
            --pricing-gradient-start: #ec4899; 
            --pricing-gradient-end: #f472b6;
        }

        /* Pricing Header */
        .pricing-card-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .pricing-plan-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #0f172a;
        }

        .pricing-plan-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .pricing-plan-price {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--pricing-gradient-start), var(--pricing-gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .pricing-plan-period {
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Features List */
        .pricing-features-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .pricing-feature-item {
            display: flex;
            align-items: center;
            padding: 0.85rem 0;
            color: #334155;
            font-size: 0.95rem;
        }

        .pricing-feature-item i {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        .pricing-feature-item i.fa-check {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.25);
        }

        .pricing-feature-item.pricing-feature-disabled {
            color: #cbd5e1;
        }

        .pricing-feature-item.pricing-feature-disabled i {
            background: #f1f5f9;
            color: #cbd5e1;
        }

        /* Pricing Button */
        .pricing-card-action {
            text-align: center;
        }

        .pricing-cta-btn {
            width: 100%;
            padding: 1.1rem;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            background: linear-gradient(135deg, var(--pricing-gradient-start), var(--pricing-gradient-end));
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .pricing-cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .pricing-card-popular .pricing-cta-btn {
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.35);
        }

        .pricing-card-popular .pricing-cta-btn:hover {
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.45);
        }

        /* Decorative glow effect */
        .pricing-card::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 80px;
            background: radial-gradient(ellipse, var(--pricing-gradient-start), transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            filter: blur(20px);
        }

        .pricing-card:hover::after {
            opacity: 0.3;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 450px;
            }

            .pricing-card-popular {
                transform: scale(1);
            }

            .pricing-card-popular:hover {
                transform: translateY(-12px);
            }
        }

        @media (max-width: 768px) {
            .pricing {
                padding: 4rem 0;
            }

            .pricing-main-title {
                font-size: 2rem;
            }

            .pricing-subtitle {
                font-size: 1rem;
            }

            .pricing-plan-price {
                font-size: 2.8rem;
            }

            .pricing-card {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="pricing-content">
                <div class="pricing-heading">
                    <h2 class="pricing-main-title">
                        Simple, <span class="pricing-highlight">transparent pricing</span>
                    </h2>
                    <p class="pricing-subtitle">
                        Choose the plan that works best for you and your projects. No hidden fees or surprise charges.
                    </p>
                </div>

                <div class="pricing-toggle">
                    <span class="pricing-toggle-label active">Monthly</span>
                    <label class="pricing-toggle-switch">
                        <input type="checkbox" id="billing-toggle">
                        <span class="pricing-toggle-slider"></span>
                    </label>
                    <span class="pricing-toggle-label">Annual <span class="pricing-save-badge">Save 20%</span></span>
                </div>

                <div class="pricing-grid">
                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <div class="pricing-plan-name">Basic</div>
                            <div class="pricing-plan-description">Perfect for beginners and small projects</div>
                            <div class="pricing-plan-price">$12<span class="pricing-plan-period">/month</span></div>
                        </div>
                        <ul class="pricing-features-list">
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 1 website</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 5GB storage</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Free SSL certificate</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Custom domain</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Basic analytics</li>
                            <li class="pricing-feature-item pricing-feature-disabled"><i class="fas fa-times"></i> AI content assistant</li>
                            <li class="pricing-feature-item pricing-feature-disabled"><i class="fas fa-times"></i> E-commerce features</li>
                            <li class="pricing-feature-item pricing-feature-disabled"><i class="fas fa-times"></i> Priority support</li>
                        </ul>
                        <div class="pricing-card-action">
                            <button class="pricing-cta-btn">Get Started</button>
                        </div>
                    </div>

                    <div class="pricing-card pricing-card-popular">
                        <div class="pricing-popular-badge">Most Popular</div>
                        <div class="pricing-card-header">
                            <div class="pricing-plan-name">Professional</div>
                            <div class="pricing-plan-description">For growing businesses and creatives</div>
                            <div class="pricing-plan-price">$29<span class="pricing-plan-period">/month</span></div>
                        </div>
                        <ul class="pricing-features-list">
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 5 websites</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 20GB storage</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Free SSL certificate</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Custom domain</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Advanced analytics</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> AI content assistant</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Basic e-commerce (100 products)</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Email support</li>
                        </ul>
                        <div class="pricing-card-action">
                            <button class="pricing-cta-btn">Get Started</button>
                        </div>
                    </div>

                    <div class="pricing-card">
                        <div class="pricing-card-header">
                            <div class="pricing-plan-name">Business</div>
                            <div class="pricing-plan-description">For established businesses and agencies</div>
                            <div class="pricing-plan-price">$79<span class="pricing-plan-period">/month</span></div>
                        </div>
                        <ul class="pricing-features-list">
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Unlimited websites</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 100GB storage</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Free SSL certificate</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Custom domain</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Enterprise analytics</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Advanced AI tools</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> Full e-commerce suite</li>
                            <li class="pricing-feature-item"><i class="fas fa-check"></i> 24/7 priority support</li>
                        </ul>
                        <div class="pricing-card-action">
                            <button class="pricing-cta-btn">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const toggle = document.getElementById('billing-toggle');
        const labels = document.querySelectorAll('.pricing-toggle-label');
        
        toggle.addEventListener('change', function() {
            labels.forEach(label => label.classList.toggle('active'));
        });
    </script>
</body>
</html>