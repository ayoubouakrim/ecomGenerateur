<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Templates Section</title>
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Templates Section */
        .templates {
            position: relative;
            padding: 5rem 0;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .templates-content {
            position: relative;
            z-index: 10;
        }

        /* Section Header */
        .templates-heading {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .templates-main-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .templates-highlight {
            color: #60a5fa;
        }

        .templates-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* Templates Header with Filters */
        .templates-filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .templates-filter-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
        }

        .templates-filter-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .templates-filter-btn {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            background: #f1f5f9;
            color: #64748b;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .templates-filter-btn:hover {
            background: #e2e8f0;
            color: #475569;
        }

        .templates-filter-btn.active {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Modern Gallery Grid - Masonry Style */
        .templates-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        /* Template Item */
        .template-item {
            position: relative;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .template-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        /* Template Image Container */
        .template-image-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 140%;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            overflow: hidden;
        }

        .template-image-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 2;
        }

        .template-item:hover .template-image-wrapper::before {
            opacity: 1;
        }

        .template-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Template Overlay Info */
        .template-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.25rem;
            transform: translateY(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 3;
        }

        .template-item:hover .template-overlay {
            transform: translateY(0);
        }

        .template-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }

        .template-meta-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .template-category-tag {
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

        .template-category-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .dot-business { background: #60a5fa; }
        .dot-portfolio { background: #f472b6; }
        .dot-blog { background: #34d399; }
        .dot-ecommerce { background: #fb923c; }
        .dot-restaurant { background: #a78bfa; }

        .template-rating-display {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #fbbf24;
            font-size: 0.8rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            padding: 0.3rem 0.6rem;
            border-radius: 12px;
        }

        .template-rating-display i {
            font-size: 0.7rem;
        }

        /* Template Actions */
        .template-action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .template-action-btn {
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

        .template-use-btn {
            background: white;
            color: #3b82f6;
        }

        .template-use-btn:hover {
            background: #f8fafc;
            transform: scale(1.05);
        }

        .template-preview-btn {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .template-preview-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Badge on Image */
        .template-status-badge {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
            backdrop-filter: blur(8px);
        }

        .badge-new {
            background: rgba(59, 130, 246, 0.9);
            color: white;
        }

        .badge-popular {
            background: rgba(236, 72, 153, 0.9);
            color: white;
        }

        /* Quick Preview Icon */
        .template-quick-view {
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
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .template-item:hover .template-quick-view {
            opacity: 1;
        }

        .template-quick-view:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        /* View All Button */
        .templates-view-all {
            text-align: center;
            
        }

        .templates-view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.9rem 1.75rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            background: white;
            color: #475569;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .templates-view-all-btn:hover {
            background: #f8fafc;
            border-color: #3b82f6;
            color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .templates-view-all-btn i {
            transition: transform 0.3s ease;
        }

        .templates-view-all-btn:hover i {
            transform: translateX(4px);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .templates-gallery {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .templates {
                padding: 3.5rem 0;
            }

            .templates-main-title {
                font-size: 2rem;
            }

            .templates-filter-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .templates-filter-buttons {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .templates-gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .template-image-wrapper {
                padding-bottom: 130%;
            }
        }
    </style>
</head>
<body>
    <section class="templates">
        <div class="container">
            <div class="templates-content">
                <div class="templates-heading">
                    <h2 class="templates-main-title">
                        <span class="templates-highlight">Professionally designed</span> templates
                    </h2>
                    <p class="templates-subtitle">
                        Start with a template and customize it to create your unique website in minutes.
                    </p>
                </div>

                <div class="templates-filter-section">
                    <h3 class="templates-filter-title">Featured Templates</h3>
                    <div class="templates-filter-buttons">
                        <button class="templates-filter-btn active">All</button>
                        <button class="templates-filter-btn">Business</button>
                        <button class="templates-filter-btn">Portfolio</button>
                        <button class="templates-filter-btn">Blog</button>
                        <button class="templates-filter-btn">E-commerce</button>
                        <button class="templates-filter-btn">Restaurant</button>
                    </div>
                </div>

                <div class="templates-gallery">
                    <!-- Template 1 -->
                    <div class="template-item">
                        <div class="template-image-wrapper">
                            <div class="template-placeholder">[Template Preview]</div>
                            <span class="template-status-badge badge-new">New</span>
                            <button class="template-quick-view">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="template-overlay">
                            <h4 class="template-name">Apex Business</h4>
                            <div class="template-meta-info">
                                <span class="template-category-tag">
                                    <span class="template-category-dot dot-business"></span>
                                    Business
                                </span>
                                <div class="template-rating-display">
                                    <i class="fas fa-star"></i>
                                    4.9
                                </div>
                            </div>
                            <div class="template-action-buttons">
                                <button class="template-action-btn template-use-btn">
                                    <i class="fas fa-plus"></i> Use
                                </button>
                                <button class="template-action-btn template-preview-btn">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 2 -->
                    <div class="template-item">
                        <div class="template-image-wrapper">
                            <div class="template-placeholder">[Template Preview]</div>
                            <button class="template-quick-view">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="template-overlay">
                            <h4 class="template-name">Creative Portfolio</h4>
                            <div class="template-meta-info">
                                <span class="template-category-tag">
                                    <span class="template-category-dot dot-portfolio"></span>
                                    Portfolio
                                </span>
                                <div class="template-rating-display">
                                    <i class="fas fa-star"></i>
                                    4.8
                                </div>
                            </div>
                            <div class="template-action-buttons">
                                <button class="template-action-btn template-use-btn">
                                    <i class="fas fa-plus"></i> Use
                                </button>
                                <button class="template-action-btn template-preview-btn">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 3 -->
                    <div class="template-item">
                        <div class="template-image-wrapper">
                            <div class="template-placeholder">[Template Preview]</div>
                            <button class="template-quick-view">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="template-overlay">
                            <h4 class="template-name">Food Blog</h4>
                            <div class="template-meta-info">
                                <span class="template-category-tag">
                                    <span class="template-category-dot dot-blog"></span>
                                    Blog
                                </span>
                                <div class="template-rating-display">
                                    <i class="fas fa-star"></i>
                                    4.7
                                </div>
                            </div>
                            <div class="template-action-buttons">
                                <button class="template-action-btn template-use-btn">
                                    <i class="fas fa-plus"></i> Use
                                </button>
                                <button class="template-action-btn template-preview-btn">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="templates-view-all">
                    <a href="#" class="templates-view-all-btn">
                        View All Templates
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        const filterButtons = document.querySelectorAll('.templates-filter-btn');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>