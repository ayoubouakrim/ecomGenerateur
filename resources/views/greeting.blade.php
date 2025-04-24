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

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 80px 0 120px;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI3BhdHRlcm4pIi8+PC9zdmc+");
            opacity: 0.6;
        }

        .header-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .welcome-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(45deg, #ffffff, var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-text {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto 40px;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Action Card Styles */
        .action-cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: -60px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .action-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            width: 340px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .action-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .card-header.scratch {
            background: linear-gradient(45deg, #4361ee, #3a0ca3);
        }

        .card-header.template {
            background: linear-gradient(45deg, #f72585, #7209b7);
        }

        .card-header:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            opacity: 0.2;
        }

        .card-header.scratch:before {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-code.png");
        }

        .card-header.template:before {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-post-its.png");
        }

        .card-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 48px;
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--gray-800);
        }

        .card-text {
            color: var(--gray-600);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #f72585, #7209b7);
            color: white;
            box-shadow: 0 4px 15px rgba(247, 37, 133, 0.3);
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #7209b7, #f72585);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(247, 37, 133, 0.4);
        }

        /* Section Styles */
        .section {
            padding: 60px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--gray-800);
            position: relative;
            display: inline-block;
            padding-bottom: 12px;
        }

        .section-title:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 30%;
            right: 30%;
            height: 4px;
            background: linear-gradient(to right,
                    var(--primary),
                    var(--accent),
                    var(--primary));
            border-radius: 2px;
        }

        .section-subtitle {
            color: var(--gray-600);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 20px auto 0;
        }

        /* Templates Grid */
        .templates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .template-item {
            background: white;
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .template-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .template-image {
            height: 180px;
            background-color: var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
            font-weight: 500;
            border-bottom: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
        }

        .template-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--primary);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            z-index: 2;
        }

        .template-image:after {
            content: "Preview";
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .template-details {
            padding: 20px;
        }

        .template-name {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .template-category {
            color: var(--gray-600);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .template-category:before {
            content: "";
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--accent);
            border-radius: 50%;
            margin-right: 8px;
        }

        .template-actions {
            display: flex;
            gap: 10px;
        }

        .template-btn {
            flex: 1;
            padding: 8px 0;
            border-radius: var(--border-radius-sm);
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .template-btn.preview {
            background-color: var(--gray-200);
            color: var(--gray-800);
        }

        .template-btn.preview:hover {
            background-color: var(--gray-300);
        }

        .template-btn.use {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .template-btn.use:hover {
            background-color: var(--primary);
            color: white;
        }

        /* Pricing Section */
        .pricing {
            padding: var(--space-3xl) 0;
            background-color: var(--light-2);
        }

        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-2xl);
            gap: var(--space-md);
        }

        .toggle-label {
            font-weight: 500;
            font-size: 1rem;
            color: var(--gray-700);
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
            background-color: var(--primary);
            transition: var(--transition-normal);
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
            transition: var(--transition-normal);
            border-radius: 50%;
        }

        .toggle-switch input:checked+.toggle-slider:before {
            transform: translateX(22px);
        }

        .pricing-grid {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xl);
            justify-content: center;
        }

        .pricing-card {
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            background-color: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .pricing-card.popular {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-light);
        }

        .pricing-card.popular::before {
            content: "Most Popular";
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-sm);
            font-weight: 500;
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
            padding: var(--space-xl);
            border-bottom: 1px solid var(--gray-100);
            text-align: center;
        }

        .pricing-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: var(--space-sm);
            color: var(--gray-900);
        }

        .pricing-description {
            color: var(--gray-600);
            font-size: 0.9rem;
            margin-bottom: var(--space-md);
        }

        .pricing-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: var(--space-sm);
            line-height: 1;
        }

        .pricing-period {
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .pricing-features {
            padding: var(--space-xl);
            list-style: none;
        }

        .pricing-feature {
            display: flex;
            align-items: center;
            margin-bottom: var(--space-md);
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        .pricing-feature i {
            color: var(--primary);
            margin-right: var(--space-sm);
        }

        .pricing-feature.disabled {
            color: var(--gray-400);
        }

        .pricing-feature.disabled i {
            color: var(--gray-300);
        }

        .pricing-action {
            padding: 0 var(--space-xl) var(--space-xl);
            text-align: center;
        }

        .pricing-btn {
            width: 100%;
            padding: var(--space-md);
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-normal);
            border: none;
        }

        .pricing-btn.primary {
            background: linear-gradient(to right,
                    var(--primary),
                    var(--primary-dark));
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .pricing-btn.primary:hover {
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
            transform: translateY(-2px);
        }

        .pricing-btn.secondary {
            background-color: var(--gray-100);
            color: var(--gray-700);
        }

        .pricing-btn.secondary:hover {
            background-color: var(--gray-200);
            color: var(--gray-800);
        }

        /* Previous Sites Section */
        .tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--gray-200);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            /* Firefox */
        }

        .tabs::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .tab {
            padding: 15px 25px;
            font-weight: 600;
            color: var(--gray-600);
            cursor: pointer;
            transition: all var(--transition-fast);
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            white-space: nowrap;
        }

        .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab:hover:not(.active) {
            color: var(--gray-800);
            border-bottom-color: var(--gray-300);
        }

        .previous-sites {
            background: white;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            margin-bottom: 60px;
            border: 1px solid var(--gray-200);
        }

        .site-list {
            max-height: 450px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--gray-400) transparent;
        }

        .site-list::-webkit-scrollbar {
            width: 6px;
        }

        .site-list::-webkit-scrollbar-track {
            background: transparent;
        }

        .site-list::-webkit-scrollbar-thumb {
            background-color: var(--gray-400);
            border-radius: 20px;
        }

        .site-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid var(--gray-200);
            transition: background-color var(--transition-fast);
        }

        .site-item:hover {
            background-color: rgba(67, 97, 238, 0.03);
        }

        .site-item:last-child {
            border-bottom: none;
        }

        .site-thumbnail {
            width: 80px;
            height: 80px;
            border-radius: var(--border-radius-sm);
            background-color: var(--gray-200);
            margin-right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid var(--gray-300);
            overflow: hidden;
        }

        .site-info {
            flex-grow: 1;
        }

        .site-title {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 5px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .site-tag {
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 20px;
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--accent);
            font-weight: 600;
        }

        .site-meta {
            display: flex;
            gap: 20px;
            margin-top: 8px;
        }

        .site-date,
        .site-pages {
            color: var(--gray-600);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .site-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 16px;
            border-radius: var(--border-radius-sm);
            font-size: 0.85rem;
            font-weight: 600;
            transition: all var(--transition-fast);
            cursor: pointer;
            border: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-btn.edit {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .action-btn.edit:hover {
            background-color: var(--primary);
            color: white;
        }

        .action-btn.view {
            background-color: var(--gray-200);
            color: var(--gray-700);
        }

        .action-btn.view:hover {
            background-color: var(--gray-300);
            color: var(--gray-800);
        }

        .action-btn.delete {
            background-color: rgba(214, 40, 40, 0.1);
            color: var(--danger);
        }

        .action-btn.delete:hover {
            background-color: var(--danger);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px 30px;
            color: var(--gray-600);
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .empty-state .actions {
            margin-top: 30px;
        }

        /* CTA Section */
        .cta {
            padding: var(--space-3xl) 0;
            background: linear-gradient(135deg, #2e3148 0%, #0f1528 100%);
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
    </style>
</head>

<body>

    @include('layout.nav')

    <!-- Header Section -->
    <header class="header">
        <div class="container header-content">
            <div class="welcome-header">
                <h1>Welcome to Your Website Builder</h1>
                <p class="welcome-text">
                    Create beautiful websites in minutes. Choose your preferred way to
                    get started below.
                </p>
            </div>
        </div>
    </header>

    <!-- Action Cards -->
    <div class="container">
        <div class="action-cards">
            <!-- Scratch Card -->
            <div class="action-card">
                <div class="card-header scratch">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Build from Scratch</h3>
                    <p class="card-text">
                        Start with a blank canvas and create your website exactly how you
                        want it, with complete creative freedom.
                    </p>
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('index') }}'">
                        Start Building
                    </button>
                </div>
            </div>

            <!-- Template Card -->
            <div class="action-card">
                <div class="card-header template">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Edit Template</h3>
                    <p class="card-text">
                        Choose from our professionally designed templates and customize
                        them to match your brand and needs.
                    </p>
                    <button class="btn btn-secondary" onclick="window.location.href='{{ route('templateso.index') }}'">
                        Browse Templates
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Templates Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Popular Templates</h2>
                <p class="section-subtitle">
                    Start with a professionally designed template and customize it to
                    fit your needs
                </p>
            </div>

            <div class="templates-grid">
                <!-- Template 1 -->
                <div class="template-item">
                    <div class="template-badge">Popular</div>
                    <div class="template-image">Template Preview</div>
                    <div class="template-details">
                        <h3 class="template-name">Business Pro</h3>
                        <div class="template-category">Business</div>
                        <div class="template-actions">
                            <div class="template-btn preview">Preview</div>
                            <div class="template-btn use">Use Template</div>
                        </div>
                    </div>
                </div>

                <!-- Template 2 -->
                <div class="template-item">
                    <div class="template-image">Template Preview</div>
                    <div class="template-details">
                        <h3 class="template-name">Portfolio Plus</h3>
                        <div class="template-category">Portfolio</div>
                        <div class="template-actions">
                            <div class="template-btn preview">Preview</div>
                            <div class="template-btn use">Use Template</div>
                        </div>
                    </div>
                </div>

                <!-- Template 3 -->
                <div class="template-item">
                    <div class="template-badge">New</div>
                    <div class="template-image">Template Preview</div>
                    <div class="template-details">
                        <h3 class="template-name">Blog Standard</h3>
                        <div class="template-category">Blog</div>
                        <div class="template-actions">
                            <div class="template-btn preview">Preview</div>
                            <div class="template-btn use">Use Template</div>
                        </div>
                    </div>
                </div>

                <!-- Template 4 -->
                <div class="template-item">
                    <div class="template-image">Template Preview</div>
                    <div class="template-details">
                        <h3 class="template-name">E-Commerce Shop</h3>
                        <div class="template-category">E-Commerce</div>
                        <div class="template-actions">
                            <div class="template-btn preview">Preview</div>
                            <div class="template-btn use">Use Template</div>
                        </div>
                    </div>
                </div>

                <!-- Template 5 -->
                <div class="template-item">
                    <div class="template-image">Template Preview</div>
                    <div class="template-details">
                        <h3 class="template-name">Restaurant Menu</h3>
                        <div class="template-category">Restaurant</div>
                        <div class="template-actions">
                            <div class="template-btn preview">Preview</div>
                            <div class="template-btn use">Use Template</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Pricing Section -->
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
    </section>


    <!-- Previous Sites Section -->
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
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-pattern"></div>
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Ready to build your website?</h2>
                <p class="cta-description">
                    Start your free 14-day trial today. No credit card required. Cancel
                    anytime.
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
