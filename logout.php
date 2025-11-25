<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Unified Button Styling */
        .button, button {
            width: 150px;  /* Ensure all buttons have the same width */
            height: 45px;  /* Ensure all buttons have the same height */
            padding: 10px 20px;
            background-color: #ff8b94;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            text-align: center;
        }

        .button:hover, button:hover {
            background-color: #4b3832;
        }

        /* Ensure buttons are evenly spaced */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
     /* Navbar styling */
     .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            
            padding: 10px 20px;
        }
        
        /* Logo Styling */
        .logo img {
            height: 100px;
            width: auto;
        }
        
        /* Title Styling */
        .title {
            font-size: 30px;
            font-weight: bold;
            margin-left: 2px;
            flex-grow: 1;
            text-align: center;
        }
        
        /* Navigation Menu Styling */
        nav {
            display: flex;
            gap: 5px;
        }
        
        nav a {
            text-decoration: none;
            
            font-weight: bold;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }
        
        nav a:hover {
            
            border-radius: 5px;
        }
        
            </style>
            
        </head>
        <body>
            <header>
                <div class="navbar">
                    <a href="index.html" class="logo">
                        <img src="cafe.png" alt="Czyprotex Logo"/>
                    </a>
                    <h1 class="title">Czyprotex Sips & Snaps</h1>
                    <nav>
                        <a href="http://localhost/register.php">Register</a>
                        <a href="http://localhost/login.php">Login</a>
                        <a href="index.html">Home</a>
                        <a href="menu.html">Menu</a>
                        <a href="about.html">About Us</a>
                        <a href="gallery.html">Gallery</a>
                        <a href="events.html">Events</a>
                        <a href="blog.html">Blog</a>
                        <a href="http://localhost/contact.php">Contact</a>
                    </nav>
                </div>
            </header>
</head>
<body>
    <h2>Logout</h2>
    <p>You have been logged out successfully.</p>
    <a href="login.php"class="button">Login</a>
    <a href="index.html" class="button">Cancel</a>
</body>
</html>
