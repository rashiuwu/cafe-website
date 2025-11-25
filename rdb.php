<?php
$host = "localhost";
$user = "root";  // Change this if your MySQL username is different
$pass = "";      // Set your password if applicable
$dbname = "czyprotex_cafe";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
