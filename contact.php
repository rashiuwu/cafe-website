<?php
include 'cdb.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $rating = intval($_POST['rating']); // Ensure it's an integer
    $message = htmlspecialchars($_POST['message']);

    // Prepare SQL statement to prevent SQL Injection
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, rating, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $message); // s = string, i = integer

    if ($stmt->execute()) {
        $success = "Message sent successfully!";
    } else {
        $error = "Failed to send message. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Cz Café</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>
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
    <style>
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
    <section>
        <h2>We'd Love to Hear From You!</h2>

        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form action="" method="POST">
            <label for="name"><strong>Name:</strong></label>
            <input type="text" id="name" name="name" required>

            <label for="email"><strong>Email:</strong></label>
            <input type="email" id="email" name="email" required>
            
            <label for="rating"><strong>Vibe check:</strong></label>
            <select id="rating" name="rating" required>
                <option value="5">10/10</option>
                <option value="4">lowkey fire</option>
                <option value="3">mid</option>
                <option value="2">cap</option>
                <option value="1">trash</option>
            </select>

            <label for="message"><strong>Message:</strong></label>
            <input id="message" name="message" required></input>

            <button type="submit"><strong>Send Message</strong></button>
        </form>
        <div class="map-container card">
            <h3><strong>LOCATION DROP</strong> <3</h3>
            <div class="map-embed">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.2943382175435!2d72.8553343!3d19.0760!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b7d9bc71d97d%3A0x585ecf8b34262fd5!2sMumbai%2C%20Maharashtra%2C%20India!5e0!3m2!1sen!2sus!4v1678291445619!5m2!1sen!2sus" width="30%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2005 Czyprotex Café</p>
        <h2>Contact Information</h2>
        <strong>Phone:</strong> +91 9969627075
        <strong>Email:</strong> <a href="mailto:czyprotex@gmail.com">czyprotex@gmail.com</a>
        <strong>Address:</strong> Mumbai, Maharashtra, 400001, India

        <p><a href="https://www.instagram.com/czyprotex/" target="_blank">
            <img src="https://thumbs.dreamstime.com/b/instagram-gradient-logo-color-design-symbol-vector-illustration-158659560.jpg" height="50">
        </a></p>
    </footer>
</body>
</html>
