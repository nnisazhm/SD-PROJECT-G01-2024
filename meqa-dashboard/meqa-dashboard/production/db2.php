<?php
// Database configuration
$hostname = "localhost"; // Replace with your hostname if needed
$username = "database2024"; // Replace with your database username
$password = "database24"; // Replace with your database password
$database = "meqa.my"; // Replace with your database name

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
