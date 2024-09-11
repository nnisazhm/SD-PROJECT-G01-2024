<?php
session_start();

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meqa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $job_title = $_POST['job_title'];
    $website = $_POST['website'];
    $role = $_POST['role'];

    // Validate form data
    if (empty($name) || empty($location) || empty($job_title) || empty($website) || empty($role)) {
        die("Please fill in all fields.");
    }

    // SQL query to update user information
    $sql = "UPDATE users SET name=?, location=?, job_title=?, website=?, role=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute query
    $stmt->bind_param("sssssi", $name, $location, $job_title, $website, $role, $id);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        header("Location: profile.html"); // Redirect to profile page after update
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
