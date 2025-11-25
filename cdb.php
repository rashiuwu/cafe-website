<?php
$servername = "localhost"; // Change this if using a remote server
$username = "root"; // Default for XAMPP/WAMP, change if needed
$password = ""; // Default for XAMPP/WAMP, change if needed
$database = "contact_db"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
