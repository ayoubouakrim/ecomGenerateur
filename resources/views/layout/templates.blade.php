<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Popular Templates Section</title>
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

        /* Popular Templates Section */
        .popular-templates {
            position: relative;
            padding: 2rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .popular-templates-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Section Header - Now Styled Like Action Buttons */
        .popular-templates-header {
            margin-bottom: 3rem;
        }

        /* New: Section title styled as a button */
        .popular-template-btn-section-title {
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

        .popular-templates-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.5;
            margin-top: 1rem;
            text-align: left;
            max-width: 600px;
        }

        /* Templates Gallery Grid */
        .popular-templates-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        /* Template Item */
        .popular-template-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .popular-template-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        /* Template Image */
        .popular-template-image {
            position: relative;
            width: 100%;
            padding-bottom: 140%;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            overflow: hidden;
        }

        .popular-template-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 2;
        }

        .popular-template-item:hover .popular-template-image::before {
            opacity: 1;
        }

        .popular-template-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Status Badge */
        .popular-template-badge {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 3;
            backdrop-filter: blur(8px);
        }

        .popular-template-badge.new {
            background: rgba(59, 130, 246, 0.9);
            color: white;
        }

        .popular-template-badge.popular {
            background: rgba(236, 72, 153, 0.9);
            color: white;
        }

        /* Quick Preview Icon */
        .popular-template-preview-icon {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 3;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .popular-template-item:hover .popular-template-preview-icon {
            opacity: 1;
        }

        .popular-template-preview-icon:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        /* Overlay Info */
        .popular-template-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.25rem;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 3;
        }

        .popular-template-item:hover .popular-template-overlay {
            transform: translateY(0);
        }

        .popular-template-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }

        .popular-template-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .popular-template-category {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.3rem 0.7rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        .popular-template-category-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .dot-business { background: #60a5fa; }
        .dot-portfolio { background: #f472b6; }
        .dot-blog { background: #34d399; }
        .dot-ecommerce { background: #fb923c; }
        .dot-restaurant { background: #a78bfa; }

        /* Action Buttons */
        .popular-template-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .popular-template-btn {
            padding: 0.6rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
        }

        .popular-template-btn-use {
            background: white;
            color: #3b82f6;
        }

        .popular-template-btn-use:hover {
            background: #f8fafc;
            transform: scale(1.05);
        }

        .popular-template-btn-preview {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .popular-template-btn-preview:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .popular-templates-gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .popular-templates {
                padding: 3.5rem 0;
            }

            .popular-templates-gallery {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 1rem;
            }

            .popular-template-image {
                padding-bottom: 130%;
            }

            .popular-templates-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <section class="popular-templates">
        <div class="popular-templates-container">
            <!-- Updated Header Styled Like Action Buttons -->
            <div class="popular-templates-header">
                <h2 class="dashboard-section-title">Choose The template you like</h2>
                <p class="popular-templates-subtitle">
                    Start with a professionally designed template and customize it to fit your needs
                </p>
            </div>

            <div class="popular-templates-gallery">
                <!-- Template 1 -->
                <div class="popular-template-item">
                    <div class="popular-template-image">
                        <div class="popular-template-placeholder">Template Preview</div>
                        <span class="popular-template-badge popular">Popular</span>
                        <button class="popular-template-preview-icon">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="popular-template-overlay">
                        <h3 class="popular-template-name">Business Pro</h3>
                        <div class="popular-template-meta">
                            <span class="popular-template-category">
                                <span class="popular-template-category-dot dot-business"></span>
                                Business
                            </span>
                        </div>
                        <div class="popular-template-actions">
                            <button class="popular-template-btn popular-template-btn-use">
                                <i class="fas fa-plus"></i> Use
                            </button>
                            <button class="popular-template-btn popular-template-btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Template 2 -->
                <div class="popular-template-item">
                    <div class="popular-template-image">
                        <div class="popular-template-placeholder">Template Preview</div>
                        <button class="popular-template-preview-icon">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="popular-template-overlay">
                        <h3 class="popular-template-name">Portfolio Plus</h3>
                        <div class="popular-template-meta">
                            <span class="popular-template-category">
                                <span class="popular-template-category-dot dot-portfolio"></span>
                                Portfolio
                            </span>
                        </div>
                        <div class="popular-template-actions">
                            <button class="popular-template-btn popular-template-btn-use">
                                <i class="fas fa-plus"></i> Use
                            </button>
                            <button class="popular-template-btn popular-template-btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Template 3 -->
                <div class="popular-template-item">
                    <div class="popular-template-image">
                        <div class="popular-template-placeholder">Template Preview</div>
                        <span class="popular-template-badge new">New</span>
                        <button class="popular-template-preview-icon">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="popular-template-overlay">
                        <h3 class="popular-template-name">Blog Standard</h3>
                        <div class="popular-template-meta">
                            <span class="popular-template-category">
                                <span class="popular-template-category-dot dot-blog"></span>
                                Blog
                            </span>
                        </div>
                        <div class="popular-template-actions">
                            <button class="popular-template-btn popular-template-btn-use">
                                <i class="fas fa-plus"></i> Use
                            </button>
                            <button class="popular-template-btn popular-template-btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Template 4 -->
                <div class="popular-template-item">
                    <div class="popular-template-image">
                        <div class="popular-template-placeholder">Template Preview</div>
                        <button class="popular-template-preview-icon">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="popular-template-overlay">
                        <h3 class="popular-template-name">E-Commerce Shop</h3>
                        <div class="popular-template-meta">
                            <span class="popular-template-category">
                                <span class="popular-template-category-dot dot-ecommerce"></span>
                                E-Commerce
                            </span>
                        </div>
                        <div class="popular-template-actions">
                            <button class="popular-template-btn popular-template-btn-use">
                                <i class="fas fa-plus"></i> Use
                            </button>
                            <button class="popular-template-btn popular-template-btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>