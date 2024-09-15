<?php
$servername = "localhost";
$username = "root"; // Update with your phpMyAdmin username
$password = "root"; // Update with your phpMyAdmin password
$dbname = "meqa.my";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>