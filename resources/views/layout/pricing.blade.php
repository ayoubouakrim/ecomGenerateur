<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Section</title>
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
            color: #1e293b;
        }

        /* Shared container style */
        .pricing-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Section with background */
        .pricing-section {
            padding: 2rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        /* Header styled like action button (matches templates section) */
        .pricing-header-wrapper {
            margin-bottom: 3rem;
        }

        .pricing-btn-section-title {
            background: white;
            color: #3b82f6;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 0.65rem 1rem;
            border-radius: 8px;
            cursor: default;
            pointer-events: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: fit-content;
        }

        .pricing-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.5;
            margin-top: 1rem;
            text-align: left;
            max-width: 600px;
        }

        /* Billing Toggle */
        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2.5rem;
            gap: 1rem;
        }

        .toggle-label {
            font-weight: 500;
            font-size: 1rem;
            color: #475569;
        }

        .save-badge {
            background: #dcfce7;
            color: #16a34a;
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.4rem;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #3b82f6;
            transition: 0.3s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.3s;
            border-radius: 50%;
        }

        .toggle-switch input:checked + .toggle-slider:before {
            transform: translateX(22px);
        }

        /* Pricing Grid */
        .pricing-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .pricing-card {
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .pricing-card.popular {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border-color: #bfdbfe;
        }

        .pricing-card.popular::before {
            content: "Most Popular";
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #3b82f6;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .pricing-card.popular:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .pricing-header {
            padding: 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            text-align: center;
        }

        .pricing-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #0f172a;
        }

        .pricing-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .pricing-period {
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .pricing-features {
            padding: 1.5rem;
            list-style: none;
        }

        .pricing-feature {
            display: flex;
            align-items: center;
            margin-bottom: 0.85rem;
            color: #475569;
            font-size: 0.95rem;
        }

        .pricing-feature i {
            color: #3b82f6;
            margin-right: 0.75rem;
            width: 16px;
            text-align: center;
        }

        .pricing-feature.disabled {
            color: #cbd5e1;
        }

        .pricing-feature.disabled i {
            color: #e2e8f0;
        }

        .pricing-action {
            padding: 0 1.5rem 1.5rem;
            text-align: center;
        }

        /* Action Buttons — matching template buttons */
        .pricing-btn {
            width: 100%;
            padding: 0.65rem;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .pricing-btn.primary {
            background: white;
            color: #3b82f6;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .pricing-btn.primary:hover {
            background: #f8fafc;
            transform: scale(1.03);
        }

        .pricing-btn.secondary {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .pricing-btn.secondary:hover {
            background: #e2e8f0;
            color: #334155;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .pricing-grid {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .pricing-section {
                padding: 3.5rem 0;
            }

            .pricing-grid {
                flex-direction: column;
                align-items: center;
            }

            .pricing-card {
                max-width: 100%;
                min-width: auto;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }

            .pricing-toggle {
                flex-direction: column;
                gap: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <section class="pricing-section" id="pricing">
        <div class="pricing-container">
            <!-- Header styled like action button (matches templates section) -->
            <div class="pricing-header-wrapper">
                <h2 class="dashboard-section-title">Simple, transparent pricing</h2>
                <p class="pricing-subtitle">
                    Choose the plan that works best for you and your projects. No hidden fees or surprise charges.
                </p>
            </div>

            <div class="pricing-toggle">
                <span class="toggle-label">Monthly</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="billing-toggle">
                    <span class="toggle-slider"></span>
                </label>
                <span class="toggle-label">Annual <span class="save-badge">Save 20%</span></span>
            </div>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <div class="pricing-name">Basic</div>
                        <div class="pricing-description">Perfect for beginners and small projects</div>
                        <div class="pricing-price">$12<span class="pricing-period">/month</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> 1 website</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> 5GB storage</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Free SSL certificate</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Custom domain</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Basic analytics</li>
                        <li class="pricing-feature disabled"><i class="fas fa-times"></i> AI content assistant</li>
                        <li class="pricing-feature disabled"><i class="fas fa-times"></i> E-commerce features</li>
                        <li class="pricing-feature disabled"><i class="fas fa-times"></i> Priority support</li>
                    </ul>
                    <div class="pricing-action">
                        <button class="pricing-btn secondary">
                            <i class="fas fa-shopping-cart"></i> Buy
                        </button>
                    </div>
                </div>

                <div class="pricing-card popular">
                    <div class="pricing-header">
                        <div class="pricing-name">Professional</div>
                        <div class="pricing-description">For growing businesses and creatives</div>
                        <div class="pricing-price">$29<span class="pricing-period">/month</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> 5 websites</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> 20GB storage</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Free SSL certificate</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Custom domain</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Advanced analytics</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> AI content assistant</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Basic e-commerce (100 products)</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Email support</li>
                    </ul>
                    <div class="pricing-action">
                        <button class="pricing-btn primary">
                            <i class="fas fa-shopping-cart"></i> Buy
                        </button>
                    </div>
                </div>

                <div class="pricing-card">
                    <div class="pricing-header">
                        <div class="pricing-name">Business</div>
                        <div class="pricing-description">For established businesses and agencies</div>
                        <div class="pricing-price">$79<span class="pricing-period">/month</span></div>
                    </div>
                    <ul class="pricing-features">
                        <li class="pricing-feature"><i class="fas fa-check"></i> Unlimited websites</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> 100GB storage</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Free SSL certificate</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Custom domain</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Enterprise analytics</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Advanced AI tools</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> Full e-commerce suite</li>
                        <li class="pricing-feature"><i class="fas fa-check"></i> 24/7 priority support</li>
                    </ul>
                    <div class="pricing-action">
                        <button class="pricing-btn secondary">
                            <i class="fas fa-shopping-cart"></i> Buy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>