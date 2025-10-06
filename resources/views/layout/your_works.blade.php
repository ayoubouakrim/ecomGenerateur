<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Sites Section</title>
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

        /* Section container */
        .previous-sites-section {
            padding: 2rem 0;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .previous-sites-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Header styled like action button */
        .previous-sites-header {
            margin-bottom: 2.5rem;
        }

        .previous-sites-btn-section-title {
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

        .previous-sites-subtitle {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.5;
            margin-top: 1rem;
            text-align: left;
            max-width: 600px;
        }

        /* Tabs */
        .previous-sites-tabs {
            display: flex;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e2e8f0;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .previous-sites-tabs::-webkit-scrollbar {
            display: none;
        }

        .previous-sites-tab {
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            white-space: nowrap;
            font-size: 0.95rem;
        }

        .previous-sites-tab.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }

        .previous-sites-tab:hover:not(.active) {
            color: #334155;
            border-bottom-color: #cbd5e1;
        }

        /* Sites List Container */
        .previous-sites-list-wrapper {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e2e8f0;
            max-height: 480px;
            overflow-y: auto;
        }

        .previous-sites-list {
            list-style: none;
        }

        .previous-site-item {
            display: flex;
            align-items: center;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        .previous-site-item:last-child {
            border-bottom: none;
        }

        .previous-site-item:hover {
            background-color: #f8fafc;
        }

        .previous-site-thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            margin-right: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.85rem;
            border: 1px solid #e2e8f0;
        }

        .previous-site-info {
            flex: 1;
        }

        .previous-site-title {
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 0.25rem;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .previous-site-tag {
            font-size: 0.7rem;
            padding: 0.15rem 0.6rem;
            border-radius: 50px;
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            font-weight: 600;
        }

        .previous-site-meta {
            display: flex;
            gap: 1.25rem;
            margin-top: 0.5rem;
            color: #64748b;
            font-size: 0.85rem;
        }

        .previous-site-meta svg {
            width: 14px;
            height: 14px;
            color: #94a3b8;
        }

        /* Action Buttons — matching template buttons */
        .previous-site-actions {
            display: flex;
            gap: 0.6rem;
            flex-shrink: 0;
        }

        .previous-site-btn {
            padding: 0.5rem 0.85rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 0.35rem;
            border: 1px solid transparent;
        }

        .previous-site-btn.edit {
            background: white;
            color: #3b82f6;
            border-color: #e2e8f0;
        }

        .previous-site-btn.edit:hover {
            background: #f8fafc;
            transform: translateY(-1px);
        }

        .previous-site-btn.view {
            background: #f1f5f9;
            color: #475569;
            border-color: #e2e8f0;
        }

        .previous-site-btn.view:hover {
            background: #e2e8f0;
            color: #334155;
        }

        .previous-site-btn.delete {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }

        .previous-site-btn.delete:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        /* Empty State */
        .previous-sites-empty {
            text-align: center;
            padding: 3rem 2rem;
            color: #64748b;
        }

        .previous-sites-empty svg {
            color: #cbd5e1;
            margin: 0 auto 1.25rem;
            display: block;
            width: 60px;
            height: 60px;
        }

        .previous-sites-empty p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.5;
        }

        .previous-sites-empty .btn {
            background: white;
            color: #3b82f6;
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        .previous-sites-empty .btn:hover {
            background: #f8fafc;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .previous-sites-section {
                padding: 3.5rem 0;
            }

            .previous-site-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .previous-site-thumbnail {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }

            .previous-site-actions {
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <section class="previous-sites-section">
        <div class="previous-sites-container">
            <!-- Header styled like action button -->
            <div class="previous-sites-header">
                <h2 class="dashboard-section-title">Your Previous Sites</h2>
                
                <p class="previous-sites-subtitle">
                    Continue working on your existing websites or view their live versions
                </p>
            </div>

            <!-- Tabs -->
            <div class="previous-sites-tabs">
                <div class="previous-sites-tab active">All Sites</div>
                <div class="previous-sites-tab">Recent</div>
                <div class="previous-sites-tab">Published</div>
                <div class="previous-sites-tab">Draft</div>
            </div>

            <!-- Sites List or Empty State -->
            <div class="previous-sites-list-wrapper">
                <ul class="previous-sites-list">
                    <!-- Example Site Item -->
                    <li class="previous-site-item">
                        <div class="previous-site-thumbnail">Site</div>
                        <div class="previous-site-info">
                            <div class="previous-site-title">
                                My Business Website
                                <span class="previous-site-tag">Published</span>
                            </div>
                            <div class="previous-site-meta">
                                <div class="previous-site-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    Last edited: Oct 5, 2025
                                </div>
                                <div class="previous-site-pages">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    5 Pages
                                </div>
                            </div>
                        </div>
                        <div class="previous-site-actions">
                            <button class="previous-site-btn edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Edit
                            </button>
                            <button class="previous-site-btn view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View
                            </button>
                            <button class="previous-site-btn delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </li>

                    <!-- Add more items or use empty state -->
                </ul>

                <!-- Uncomment this if no sites -->
                <!--
                <div class="previous-sites-empty">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <p>You haven't created any websites yet. Choose an option above to get started!</p>
                    <button class="btn">
                        <i class="fas fa-plus"></i> Create Your First Website
                    </button>
                </div>
                -->
            </div>
        </div>
    </section>
</body>
</html>