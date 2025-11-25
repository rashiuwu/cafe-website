<?php
include 'rdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure Password

    try {
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();

        echo "<h1>Registration successful! </h1> 
              <br>
              <a href='login.php' class='button'>Login</a>
              <br><br>";

    } catch (mysqli_sql_exception $e) {
        // Check for duplicate entry error (MySQL error code 1062)
        if (strpos($e->getMessage(), "Duplicate entry") !== false) {
            if (strpos($e->getMessage(), "'$username' for key 'username'") !== false) {
                echo "<h2 style='color:red;'>Error: Username already exists. Please choose another.</h2>";
            } elseif (strpos($e->getMessage(), "'$email' for key 'email'") !== false) {
                echo "<h2 style='color:red;'>Error: Email already registered. Try logging in.</h2>";
            } else {
                echo "<h2 style='color:red;'>Error: Duplicate entry detected.</h2>";
            }
        } else {
            echo "<h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
        }
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
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
    <h2>Register</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>

        <div class="button-container">
            <button type="submit">Register</button>
            <a href="index.html" class="button">Cancel</a>
        </div>
    </form>
</body>
</html>
