<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTorch</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            /* Core color palette */
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #ec4899;
            --secondary-dark: #db2777;
            --secondary-light: #f472b6;
            --accent-1: #10b981;
            --accent-2: #f59e0b;
            --accent-3: #3b82f6;
            --dark: #0f172a;
            --dark-2: #1e293b;
            --light: #f8fafc;
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
            --font-family: 'Inter', system-ui, -apple-system, sans-serif;
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
        }

        body {
            font-family: var(--font-family);
            background-color: var(--light);
            color: var(--gray-800);
            line-height: var(--body-line-height);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: var(--heading-line-height);
            font-weight: 700;
            color: var(--gray-900);
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .hidden {
            display: none;
        }

        /* Navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 0.5rem 5%;
            position: relative;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-links {
            display: flex;
            list-style: none;
            margin: 0 auto;
        }

        .navbar .nav-links li {
            margin-left: 0.5rem;
            position: relative;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 1rem;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        /* Hover effect with background */
        .navbar .nav-links a:hover {
            color: #3498db;

        }

        /* Active link style */
        .navbar .nav-links a.active {
            color: #3498db;

            font-weight: 600;
        }

        /* Underline effect */
        .navbar .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #3498db;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .nav-links a:hover::after,
        .navbar .nav-links a.active::after {
            width: 80%;
        }

        /* Dropdown styles */
        .navbar .nav-links .dropdown {
            position: relative;
        }



        .navbar .nav-links .dropdown:hover .dropdown-content {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }





        .navbar .hamburger {
            display: none;
            cursor: pointer;
        }

        .navbar .hamburger div {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray-700);
            font-size: 1.5rem;
        }


        /* Hero Section */
        .hero {
            position: relative;
            padding: 8rem 0 6rem;
            background: linear-gradient(135deg, #2E3148 0%, #0F1528 100%);
            overflow: hidden;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hero-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 30px 30px;
            background-position: 0 0;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            color: white;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-subtitle {
            display: inline-block;
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--primary-light);
            padding: var(--space-sm) var(--space-lg);
            border-radius: var(--radius-full);
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: var(--space-lg);
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .hero-heading {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: var(--space-lg);
            background: linear-gradient(to right, #fff, #d1d5db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
        }

        .hero-description {
            font-size: 1.25rem;
            color: var(--gray-300);
            margin-bottom: var(--space-2xl);
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-group {
            display: flex;
            gap: var(--space-md);
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.95rem;
            transition: all var(--transition-normal);
            cursor: pointer;
            border: none;
            gap: 0.5rem;
            line-height: 1;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(to right, var(--secondary), var(--secondary-dark));
            color: white;
            box-shadow: 0 4px 14px rgba(236, 72, 153, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.6);
            color: white;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
        }

        /* Features Section */
        .features {
            padding: var(--space-3xl) 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: var(--space-2xl);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: var(--space-md);
            color: var(--gray-900);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--gray-600);
            max-width: 700px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--space-xl);
            margin-top: var(--space-2xl);
        }

        .feature-card {
            background-color: white;
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-100);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--gray-200);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-lg);
            color: white;
        }

        .feature-icon.blue {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        .feature-icon.pink {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        }

        .feature-icon.green {
            background: linear-gradient(135deg, var(--accent-1), #0d9488);
        }

        .feature-icon.orange {
            background: linear-gradient(135deg, var(--accent-2), #d97706);
        }

        .feature-icon.purple {
            background: linear-gradient(135deg, #a855f7, #7e22ce);
        }

        .feature-icon.cyan {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: var(--space-md);
            color: var(--gray-900);
        }

        .feature-description {
            color: var(--gray-600);
            font-size: 0.95rem;
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
            content: 'Most Popular';
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
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
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

        /* Build Options */
        .build-options {
            padding: var(--space-3xl) 0;
            background-color: var(--light-2);
            position: relative;
            overflow: hidden;
        }

        .build-options::before {
            content: '';
            position: absolute;
            width: 1000px;
            height: 1000px;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.03), rgba(236, 72, 153, 0.03));
            top: -400px;
            right: -300px;
            z-index: 0;
        }

        .build-options::after {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(16, 185, 129, 0.03), rgba(59, 130, 246, 0.03));
            bottom: -300px;
            left: -200px;
            z-index: 0;
        }

        .options-container {
            display: flex;
            gap: var(--space-2xl);
            position: relative;
            z-index: 1;
        }

        .option-card {
            flex: 1;
            background-color: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-200);
        }

        .option-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .option-header {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .option-header.scratch {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        .option-header.template {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        }

        .option-header.ai {
            background: linear-gradient(135deg, var(--accent-1), #0d9488);
        }

        .option-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            mix-blend-mode: soft-light;
        }

        .option-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px;
            height: 70px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
        }

        .option-body {
            padding: var(--space-2xl);
            text-align: center;
        }

        .option-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: var(--space-md);
            color: var(--gray-900);
        }

        .option-description {
            color: var(--gray-600);
            margin-bottom: var(--space-xl);
            font-size: 1rem;
        }

        /* Templates Section */
        .templates {
            padding: var(--space-3xl) 0;
        }

        .templates-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-xl);
        }

        .templates-filters {
            display: flex;
            gap: var(--space-sm);
        }

        .filter-btn {
            padding: var(--space-sm) var(--space-lg);
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 500;
            background-color: var(--gray-100);
            color: var(--gray-700);
            border: none;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .filter-btn:hover {
            background-color: var(--gray-200);
            color: var(--gray-800);
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
        }

        .templates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: var(--space-xl);
        }

        .template-card {
            background-color: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--gray-300);
        }

        .template-image {
            height: 180px;
            background-color: var(--gray-100);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            font-weight: 500;
        }

        .template-badge {
            position: absolute;
            top: var(--space-sm);
            left: var(--space-sm);
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-sm);
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
            background-color: var(--primary);
        }

        .template-preview {
            position: absolute;
            top: var(--space-sm);
            right: var(--space-sm);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .template-preview:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .template-content {
            padding: var(--space-lg);
        }

        .template-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: var(--space-sm);
            color: var(--gray-900);
        }

        .template-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
        }

        .template-category {
            color: var(--gray-600);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: var(--space-xs);
        }

        .template-category-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .dot-business {
            background-color: var(--primary);
        }

        .dot-portfolio {
            background-color: var(--secondary);
        }

        .dot-blog {
            background-color: var(--accent-1);
        }

        .dot-ecommerce {
            background-color: var(--accent-2);
        }

        .dot-restaurant {
            background-color: var(--accent-3);
        }

        .template-rating {
            display: flex;
            align-items: center;
            gap: 2px;
            color: var(--accent-2);
            font-size: 0.85rem;
        }

        .template-actions {
            display: flex;
            justify-content: space-between;
        }

        .template-btn {
            padding: var(--space-sm) var(--space-lg);
            border-radius: var(--radius-md);
            font-size: 0.85rem;
            font-weight: 500;
            background-color: var(--gray-100);
            color: var(--gray-700);
            border: none;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .template-btn:hover {
            background-color: var(--gray-200);
            color: var(--gray-800);
        }

        .template-btn.primary {
            background-color: var(--primary);
            color: white;
        }

        .template-btn.primary:hover {
            background-color: var(--primary-dark);
        }

        /* Testimonials Section */
        .testimonials {
            padding: var(--space-3xl) 0;
            background-color: white;
            position: relative;
            overflow: hidden;
        }

        .testimonials::before,
        .testimonials::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        .testimonials::before {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.05) 0%,
                    rgba(99, 102, 241, 0) 70%);
            top: -200px;
            left: -200px;
        }

        .testimonials::after {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.05) 0%, rgba(236, 72, 153, 0) 70%);
            bottom: -200px;
            right: -200px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: var(--space-xl);
            position: relative;
            z-index: 1;
        }

        .testimonial-card {
            background-color: white;
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-100);
            transition: all var(--transition-normal);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-color: var(--gray-200);
        }

        .testimonial-content {
            color: var(--gray-700);
            font-size: 1rem;
            margin-bottom: var(--space-lg);
            position: relative;
            line-height: 1.7;
        }

        .testimonial-content::before {
            content: '"';
            font-size: 4rem;
            position: absolute;
            top: -35px;
            left: -10px;
            color: var(--gray-200);
            font-family: serif;
            z-index: -1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: var(--space-md);
            background-color: var(--gray-200);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
        }

        .author-info {
            flex-grow: 1;
        }

        .author-name {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 2px;
            font-size: 1rem;
        }

        .author-title {
            color: var(--gray-600);
            font-size: 0.85rem;
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }



        /* FAQ Section */
        .faq {
            padding: var(--space-3xl) 0;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: var(--space-md);
        }

        .faq-question {
            padding: var(--space-md) 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .question-text {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--gray-800);
        }

        .question-icon {
            color: var(--gray-500);
            font-size: 1.2rem;
            transition: transform var(--transition-fast);
        }

        .faq-item.active .question-icon {
            transform: rotate(180deg);
            color: var(--primary);
        }

        .faq-answer {
            padding-bottom: var(--space-lg);
            color: var(--gray-600);
            line-height: 1.6;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* CTA Section */
        .cta {
            padding: var(--space-3xl) 0;
            background: linear-gradient(135deg, #2E3148 0%, #0F1528 100%);
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

        /* Mobile Responsive Styles */
        @media (max-width: 1024px) {
            .hero-heading {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-heading {
                font-size: 2.5rem;
            }

            .hero-description {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .options-container {
                flex-direction: column;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                padding: var(--space-lg);
                flex-direction: column;
                gap: var(--space-md);
                z-index: 99;
            }

            .nav-menu.show {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }

            .footer-bottom {
                flex-direction: column;
                gap: var(--space-md);
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .hero-heading {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .btn-group {
                flex-direction: column;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }

            .templates-header {
                flex-direction: column;
                gap: var(--space-md);
                align-items: flex-start;
            }

            .templates-filters {
                overflow-x: auto;
                width: 100%;
                padding-bottom: var(--space-sm);
            }

            .sites-header {
                flex-direction: column;
                gap: var(--space-md);
                align-items: flex-start;
            }

            .site-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-md);
            }

            .site-thumbnail {
                width: 100%;
                height: 100px;
                margin-right: 0;
            }

            .site-actions {
                width: 100%;
                justify-content: space-between;
            }
        }

        /* Mobile styles */
        @media screen and (max-width: 768px) {
            .navbar .hamburger {
                display: block;
            }

            .navbar .nav-links {
                position: fixed;
                right: -100%;
                top: 70px;
                flex-direction: column;
                background-color: #ffffff;
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
                padding: 20px 0;
            }

            .navbar .nav-links.active {
                right: 0;
            }

            .navbar .nav-links li {
                margin: 1rem 0;
            }



            .navbar .nav-links a::after {
                bottom: -3px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="http://127.0.0.1:8000/assets/components/logo.svg" alt="Company Logo">

        </div>

        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Contact</a>
            </li>
        </ul>
        <div class="nav-actions">
            <a href="{{ route('login.show') }}" class="nav-link" >Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
        </div>
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-pattern"></div>
        <div class="hero-grid"></div>
        <div class="container">
            <div class="hero-content">
                <span class="hero-subtitle">Website Builder Platform</span>
                <h1 class="hero-heading">Build stunning websites with next-gen tools</h1>
                <p class="hero-description">Create professional websites without code using our drag-and-drop builder,
                    AI-powered tools, and stunning templates. Launch your online presence in minutes.</p>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-bolt"></i>
                        Start Building Now
                    </a>
                    <a href="#" class="btn btn-outline">
                        <i class="fas fa-play"></i>
                        See How It Works
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">Everything you need to build amazing websites</h2>
                <p class="section-subtitle">WebTorch combines powerful features with ease of use to help you create
                    websites that stand out from the crowd.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon blue">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="feature-title">Visual Editor</h3>
                    <p class="feature-description">Drag and drop elements to build your site visually, with real-time
                        previews and responsive design tools.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon pink">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-description">Optimized code and CDN delivery ensure your website loads quickly on
                        all devices and browsers.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon green">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="feature-title">AI Assistant</h3>
                    <p class="feature-description">Generate content, optimize designs, and get personalized
                        recommendations with our AI tools.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon orange">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Mobile First</h3>
                    <p class="feature-description">Automatically responsive designs that look perfect on desktops,
                        tablets, and smartphones.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon purple">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 class="feature-title">Custom Components</h3>
                    <p class="feature-description">Create reusable components to maintain consistency across your site
                        and save time.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon cyan">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="feature-title">Code Export</h3>
                    <p class="feature-description">Export clean, semantic code for your website or integrate with your
                        existing development workflow.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-heading">
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


    <!-- Build Options Section -->
    <section class="build-options">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">Choose how you want to build</h2>
                <p class="section-subtitle">WebTorch offers multiple ways to create your perfect website, no matter
                    your skill level or needs.</p>
            </div>
            <div class="options-container">
                <div class="option-card">
                    <div class="option-header scratch">
                        <div class="option-overlay"></div>
                        <div class="option-icon">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                    </div>
                    <div class="option-body">
                        <h3 class="option-title">Start from Scratch</h3>
                        <p class="option-description">Build your website from the ground up with our intuitive
                            drag-and-drop editor. Complete creative freedom.</p>
                        <a href="#" class="btn btn-primary">Create New Site</a>
                    </div>
                </div>
                <div class="option-card">
                    <div class="option-header template">
                        <div class="option-overlay"></div>
                        <div class="option-icon">
                            <i class="fas fa-th-large"></i>
                        </div>
                    </div>
                    <div class="option-body">
                        <h3 class="option-title">Use a Template</h3>
                        <p class="option-description">Choose from hundreds of professionally designed templates and
                            customize them to match your brand.</p>
                        <a href="#" class="btn btn-secondary">Browse Templates</a>
                    </div>
                </div>
                <div class="option-card">
                    <div class="option-header ai">
                        <div class="option-overlay"></div>
                        <div class="option-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                    </div>
                    <div class="option-body">
                        <h3 class="option-title">AI Website Builder</h3>
                        <p class="option-description">Answer a few questions and let our AI create a custom website
                            tailored to your specific needs.</p>
                        <a href="#" class="btn btn-primary">Try AI Builder</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Templates Section -->
    <section class="templates">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">Professionally designed templates</h2>
                <p class="section-subtitle">Start with a template and customize it to create your unique website in
                    minutes.</p>
            </div>
            <div class="templates-header">
                <h3>Featured Templates</h3>
                <div class="templates-filters">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Business</button>
                    <button class="filter-btn">Portfolio</button>
                    <button class="filter-btn">Blog</button>
                    <button class="filter-btn">E-commerce</button>
                    <button class="filter-btn">Restaurant</button>
                </div>
            </div>
            <div class="templates-grid">
                <div class="template-card">
                    <div class="template-image">
                        <span class="template-badge">New</span>
                        <a href="#" class="template-preview">
                            <i class="fas fa-eye"></i>
                        </a>
                        [Template Thumbnail]
                    </div>
                    <div class="template-content">
                        <h4 class="template-name">Apex Business</h4>
                        <div class="template-meta">
                            <div class="template-category">
                                <span class="template-category-dot dot-business"></span>
                                Business
                            </div>
                            <div class="template-rating">
                                <i class="fas fa-star"></i>
                                4.9
                            </div>
                        </div>
                        <div class="template-actions">
                            <button class="template-btn primary">Use Template</button>
                            <button class="template-btn">Preview</button>
                        </div>
                    </div>
                </div>
                <div class="template-card">
                    <div class="template-image">
                        <a href="#" class="template-preview">
                            <i class="fas fa-eye"></i>
                        </a>
                        [Template Thumbnail]
                    </div>
                    <div class="template-content">
                        <h4 class="template-name">Creative Portfolio</h4>
                        <div class="template-meta">
                            <div class="template-category">
                                <span class="template-category-dot dot-portfolio"></span>
                                Portfolio
                            </div>
                            <div class="template-rating">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>
                        </div>
                        <div class="template-actions">
                            <button class="template-btn primary">Use Template</button>
                            <button class="template-btn">Preview</button>
                        </div>
                    </div>
                </div>
                <div class="template-card">
                    <div class="template-image">
                        <a href="#" class="template-preview">
                            <i class="fas fa-eye"></i>
                        </a>
                        [Template Thumbnail]
                    </div>
                    <div class="template-content">
                        <h4 class="template-name">Food Blog</h4>
                        <div class="template-meta">
                            <div class="template-category">
                                <span class="template-category-dot dot-blog"></span>
                                Blog
                            </div>
                            <div class="template-rating">
                                <i class="fas fa-star"></i>
                                4.7
                            </div>
                        </div>
                        <div class="template-actions">
                            <button class="template-btn primary">Use Template</button>
                            <button class="template-btn">Preview</button>
                        </div>
                    </div>
                </div>
                <div class="template-card">
                    <div class="template-image">
                        <span class="template-badge">Popular</span>
                        <a href="#" class="template-preview">
                            <i class="fas fa-eye"></i>
                        </a>
                        [Template Thumbnail]
                    </div>
                    <div class="template-content">
                        <h4 class="template-name">Shop Boutique</h4>
                        <div class="template-meta">
                            <div class="template-category">
                                <span class="template-category-dot dot-ecommerce"></span>
                                E-commerce
                            </div>
                            <div class="template-rating">
                                <i class="fas fa-star"></i>
                                4.9
                            </div>
                        </div>
                        <div class="template-actions">
                            <button class="template-btn primary">Use Template</button>
                            <button class="template-btn">Preview</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: var(--space-2xl);">
                <a href="#" class="btn btn-outline">View All Templates</a>
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

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">What our customers say</h2>
                <p class="section-subtitle">Join thousands of satisfied users building their online presence with
                    WebTorch.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        WebTorch made it so easy to build my restaurant website. The AI tools helped me create content
                        quickly, and the editor was intuitive. Launched in just a few hours!
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            JD
                        </div>
                        <div class="author-info">
                            <div class="author-name">Jane Doe</div>
                            <div class="author-title">Restaurant Owner</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        As a freelancer, I needed a portfolio that stood out. The templates were perfect as a starting
                        point, and I could customize everything to match my style. Very impressed!
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            MS
                        </div>
                        <div class="author-info">
                            <div class="author-name">Michael Smith</div>
                            <div class="author-title">Graphic Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        Our e-commerce store looks professional and converts well. The built-in analytics help us
                        understand our customers better. WebTorch has been a game-changer for our business.
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            AL
                        </div>
                        <div class="author-info">
                            <div class="author-name">Amanda Lee</div>
                            <div class="author-title">E-commerce Entrepreneur</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Find answers to common questions about WebTorch and our website builder
                    platform.</p>
            </div>
            <div class="faq-container">
                <div class="faq-item active">
                    <div class="faq-question">
                        <div class="question-text">Do I need coding knowledge to use WebTorch?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        No, you don't need any coding experience to build a website with WebTorch. Our visual editor and
                        AI tools make it easy for anyone to create professional websites. If you do know code, we also
                        provide options to add custom HTML, CSS, and JavaScript.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Can I use my own domain name?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, all plans allow you to connect your own custom domain name. We provide easy instructions
                        for connecting domains purchased from any registrar, or you can purchase a domain directly
                        through WebTorch for added convenience.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">How does the AI website builder work?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Our AI builder asks you a series of questions about your business, preferences, and goals. Based
                        on your answers, it generates a custom website with appropriate sections, content, and imagery.
                        You can then refine and customize the result using our visual editor.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Can I sell products on my website?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, our Professional and Business plans include e-commerce capabilities. You can set up an
                        online store, manage products, process payments, and handle shipping. The Professional plan
                        supports up to 100 products, while the Business plan offers unlimited products.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="question-text">Is there a free trial available?</div>
                        <div class="question-icon"><i class="fas fa-chevron-down"></i></div>
                    </div>
                    <div class="faq-answer">
                        Yes, we offer a 14-day free trial on all plans. You can explore all features and even publish
                        your site during the trial period. No credit card is required to start your trial, and you can
                        upgrade to a paid plan anytime.
                    </div>
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
                <p class="cta-description">Start your free 14-day trial today. No credit card required. Cancel anytime.
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
                        <p class="footer-description">Powerful website builder platform for businesses and
                            professionals. Create stunning websites with ease.</p>
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
        // JavaScript for toggle menu functionality
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('show');
        });

        // FAQ toggle
        document.querySelectorAll('.faq-question').forEach(item => {
            item.addEventListener('click', event => {
                const parent = item.parentNode;
                parent.classList.toggle('active');
            });
        });

        // Pricing toggle
        document.getElementById('billing-toggle').addEventListener('change', function() {
            const monthlyPrices = ['$12', '$29', '$79'];
            const annualPrices = ['$9.6', '$23.2', '$63.2'];
            const prices = document.querySelectorAll('.pricing-price');

            if (this.checked) {
                // Annual pricing
                prices.forEach((price, index) => {
                    price.innerHTML = annualPrices[index] + '<span class="pricing-period">/month</span>';
                });
            } else {
                // Monthly pricing
                prices.forEach((price, index) => {
                    price.innerHTML = monthlyPrices[index] + '<span class="pricing-period">/month</span>';
                });
            }
        });
    </script>
</body>
</html>
