<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f5;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ffffff;
        padding: 0.5rem 5%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
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


<nav class="navbar">
    <div class="logo">
        <img src="http://127.0.0.1:8000/assets/components/logo.svg" alt="Company Logo">
        
    </div>
    
    <ul class="nav-links">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a>
        </li>
    </ul>
    
    <div class="hamburger">
        <div>ouhiu</div>
        <div></div>
        <div></div>
    </div>
</nav>