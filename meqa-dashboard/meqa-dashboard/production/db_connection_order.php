<?php
// Database connection details
$servername = "localhost";  // Change this if you're using a different server
$username = "root";         // Your database username
$password = "root";             // Your database password
$dbname = "meqa.my";    // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
