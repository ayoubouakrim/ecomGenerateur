<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Welcome to Website Generator</title>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #38b000;
            --warning: #f77f00;
            --danger: #d62828;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary-dark: #db2777;
            --secondary-light: #f472b6;
            --accent-1: #10b981;
            --accent-2: #f59e0b;
            --accent-3: #3b82f6;
            --dark-2: #1e293b;
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
            --font-family: "Inter", system-ui, -apple-system, sans-serif;
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
            font-family: "Poppins", sans-serif;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--light);
            color: var(--gray-800);
            line-height: var(--body-line-height);
            overflow-x: hidden;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .hidden {
            display: none;
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
    </style>
</head>

<body>

    @include('layout.nav')

    @include('layout.actions')

    <!-- Templates Section -->
    @include('layout.templates')


    <!-- Pricing Section
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Simple, transparent pricing</h2>
                <p class="section-subtitle">Choose the plan that works best for you and your projects. No hidden fees
                    or surprise charges.</p>
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
                        <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="plan" value="basic_monthly">
                            <input type="hidden" name="price" value="12">
                            <button class="pricing-btn secondary" type="submit">Buy</button>
                        </form>
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
                        <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="plan" value="professional_monthly">
                            <input type="hidden" name="price" value="29">
                            <button class="pricing-btn primary" type="submit">Buy</button>
                        </form>
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
                        <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="plan" value="business_monthly">
                            <input type="hidden" name="price" value="79">
                            <button class="pricing-btn secondary" type="submit">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>  -->

    @include('layout.pricing')
    


    <!-- Previous Sites Section 
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Your Previous Sites</h2>
                <p class="section-subtitle">
                    Continue working on your existing websites or view their live
                    versions
                </p>
            </div>

            <div class="tabs">
                <div class="tab active">All Sites</div>
                <div class="tab">Recent</div>
                <div class="tab">Published</div>
                <div class="tab">Draft</div>
            </div>

            <div class="previous-sites">
                <div class="site-list">
                    @foreach ($sites as $site)
                        <div class="site-item">
                            <div class="site-thumbnail">Site</div>
                            <div class="site-info">
                                <div class="site-title">
                                    {{ $site->siteName }} <span class="site-tag">Published</span>
                                </div>
                                <div class="site-meta">
                                    <div class="site-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6">
                                            </line>
                                            <line x1="8" y1="2" x2="8" y2="6">
                                            </line>
                                            <line x1="3" y1="10" x2="21" y2="10">
                                            </line>
                                        </svg>
                                        Last edited: {{ $site->updated_at }}
                                    </div>
                                    <div class="site-pages">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13">
                                            </line>
                                            <line x1="16" y1="17" x2="8" y2="17">
                                            </line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                        5 Pages
                                    </div>
                                </div>
                            </div>
                            <div class="site-actions">
                                <button class="action-btn edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <button class="action-btn view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    View
                                </button>
                                <button class="action-btn delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                        @endforeach @if ($sites->isEmpty())
                            <div class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    style="
                  color: #dee2e6;
                  margin: 0 auto;
                  display: block;
                  margin-bottom: 20px;
                ">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                    </rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <p>
                                    You haven't created any websites yet. Choose an option above to
                                    get started!
                                </p>
                                <div class="actions">
                                    <button class="btn btn-primary">
                                        Create Your First Website
                                    </button>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </section>  -->
    @include('layout.your_works')

    

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
                        <p class="footer-description">
                            Powerful website builder platform for businesses and
                            professionals. Create stunning websites with ease.
                        </p>
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
        document.addEventListener("DOMContentLoaded", function() {
            const switchInput = document.querySelector(".switch input[type='checkbox']");
            const monthlyPrices = document.querySelectorAll(".monthly-price");
            const yearlyPrices = document.querySelectorAll(".yearly-price");
            const monthlyPlans = document.querySelectorAll(".monthly-plan");
            const yearlyPlans = document.querySelectorAll(".yearly-plan");

            switchInput.addEventListener("change", function() {
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
                    const price = input.closest("form").parentElement.previousElementSibling
                        .textContent.trim();
                    input.value = price.replace("$", "");
                });
            });
        });
    </script>

</body>

</html>
