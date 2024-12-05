<?php
// db_connection1.php

$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "root";        // Replace with your database password
$dbname = "meqa.my";       // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>