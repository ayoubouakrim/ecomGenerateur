<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Website Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            margin: 0 auto;

        }

        .welcome-header {
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #2d3748;
        }

        .welcome-text {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: #4a5568;
        }
        

        /* Rest of the styling */
        .section-title {
            margin: 40px 0 20px;
            font-size: 1.8rem;
            color: #2d3748;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        }

        .templates-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .template-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .template-card:hover {
            transform: translateY(-3px);
        }

        .template-img {
            width: 100%;
            height: 140px;
            background-color: #edf2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
        }

        .template-info {
            padding: 15px;
        }

        .template-name {
            font-size: 1rem;
            margin-bottom: 5px;
            color: #2d3748;
        }

        .template-category {
            font-size: 0.8rem;
            color: #718096;
        }

        .previous-sites-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }

        .site-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #edf2f7;
            transition: background-color 0.2s ease;
        }

        .site-item:hover {
            background-color: #f7fafc;
        }

        .site-item:last-child {
            border-bottom: none;
        }

        .site-thumbnail {
            width: 60px;
            height: 60px;
            background-color: #edf2f7;
            border-radius: 6px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
        }

        .site-info {
            flex-grow: 1;
        }

        .site-title {
            font-weight: 600;
            margin-bottom: 4px;
            color: #2d3748;
        }

        .site-date {
            font-size: 0.8rem;
            color: #718096;
        }

        .site-actions {
            display: flex;
            gap: 10px;
        }

        .site-action-btn {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #4a5568;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .site-action-btn:hover {
            background-color: #f7fafc;
            border-color: #cbd5e0;
        }

        .site-action-btn.edit {
            color: #4299e1;
            border-color: #bee3f8;
        }

        .site-action-btn.edit:hover {
            background-color: #ebf8ff;
        }

        .empty-state {
            text-align: center;
            padding: 30px;
            color: #718096;
        }

        @media (max-width: 768px) {

            .templates-container {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }

       /* Hero section base styles */
/* Hero section base styles */
.hero-container {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 90vh;
  min-height: 500px;
  position: relative;
  overflow: hidden;
}

/* Hero content styling */
.hero-content {
  padding: 3em 2em;
  height: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  font-family: 'Open Sans', sans-serif;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

/* Left and right section backgrounds */
.hero-content.left {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), 
                    url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-code.png");
}

.hero-content.right {
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), 
                    url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/74452/website-post-its.png");
}

/* Typography */
.hero-content h2 {
  margin-top: 2em
  font-size: 2.5em;
  font-weight: 700;
  margin-bottom: 0.5em;
}

.hero-content p {
  font-size: 1.2em;
  line-height: 1.2;
  margin-bottom: 1.5em;
  max-width: 400px;
}

/* Button styling */
.hero-btn {
  font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  background: none;
  border: 2px solid white;
  border-radius: 5px;
  padding: 0.8em 1.5em;
  font-size: 1em;
  transition: all 0.3s ease;
  color: white;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.hero-content.left .hero-btn:hover {
  background-color: white;
  color: #4576a7;
}

.hero-content.right .hero-btn:hover {
  background-color: white;
  color: #ac47a9;
}

/* Center divider - optional, remove if not needed */
.hero-divider {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 10;
  width: 50px;
  height: 50px;
  background-color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

.hero-divider span {
  color: #333;
  font-weight: bold;
  font-size: 1.2em;
}

/* Responsive layouts */
@media (min-width: 768px) {
  .hero-container {
    flex-direction: row;
  }
  
  .hero-content {
    height: 100%;
    width: 50%;
  }
  
  .hero-content h2 {
    font-size: 2.8em;
  }
  
  .hero-content p {
    font-size: 1.3em;
  }
}

/* Small screen adjustments */
@media (max-width: 767px) {
  .hero-container {
    height: auto;
    min-height: 100vh;
  }
  
  .hero-content {
    padding: 4em 2em;
  }
  
  .hero-divider {
    top: 50%;
    width: 40px;
    height: 40px;
  }
}
    </style>
</head>

<body>

    @include('layout.nav')

    <div class="container">
        <div class="welcome-header">
            <h1>Welcome to Your Website Builder</h1>
            <p class="welcome-text">Create beautiful websites in minutes. Choose your preferred way to get started below.
            </p>
        </div>

        <!-- New Two-Column Hero Section -->
        <div class="hero-container">
            <div class="hero-content left">
                <h2>Build from Scratch</h2>
                <p>Start with a blank canvas and create your website exactly how you want it, with complete creative freedom.</p>
                <button class="hero-btn" onclick="window.location.href='{{ route('index') }}'">Start Building</button>
            </div>
            <div class="hero-content right">
                <h2>Edit Template</h2>
                <p>Choose from our professionally designed templates and customize them to match your brand and needs.</p>
                <button class="hero-btn">Browse Templates</button>
            </div>
            
            <!-- Optional divider - add this if you want a divider between sections -->
             <div class="hero-divider">
                <span>OR</span>
            </div> 
        </div>

        <h2 class="section-title">Available Templates</h2>
        <div class="templates-container">
            <!-- Template 1 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Business Pro</h3>
                    <div class="template-category">Business</div>
                </div>
            </div>

            <!-- Template 2 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Portfolio Plus</h3>
                    <div class="template-category">Portfolio</div>
                </div>
            </div>

            <!-- Template 3 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Blog Standard</h3>
                    <div class="template-category">Blog</div>
                </div>
            </div>

            <!-- Template 4 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">E-Commerce Shop</h3>
                    <div class="template-category">E-Commerce</div>
                </div>
            </div>

            <!-- Template 5 -->
            <div class="template-card">
                <div class="template-img">Template Preview</div>
                <div class="template-info">
                    <h3 class="template-name">Restaurant Menu</h3>
                    <div class="template-category">Restaurant</div>
                </div>
            </div>
        </div>

        <h2 class="section-title">Your Previous Sites</h2>
        <div class="previous-sites-container">
            @foreach ( $sites as $site )
                
            
            <div class="site-item">
                <div class="site-thumbnail">Site</div>
                <div class="site-info">
                    <div class="site-title">{{$site->siteName}}</div>
                    <div class="site-date">Last edited: {{$site->updated_at}}</div>
                </div>
                <div class="site-actions">
                    <button class="site-action-btn edit">Edit</button>
                    <button class="site-action-btn">View</button>
                </div>
            </div>
            @endforeach


            <!-- Empty state (alternative) -->
            <!--
            <div class="empty-state">
                <p>You haven't created any websites yet. Choose an option above to get started!</p>
            </div>
            -->
        </div>
    </div>
</body>

</html>
