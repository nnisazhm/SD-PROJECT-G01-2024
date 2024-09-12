<?php
session_start();
require_once 'db_connection.php'; // Your database connection

// Assuming the user is already logged in
$user_id = $_SESSION['user_id']; // Correctly fetch user ID from session

// Get form data
$firstname = $_POST['firstname'];
$location = $_POST['location'];
$job_title = $_POST['job_title'];
$website = $_POST['website'];

// Update user profile in the database
$sql = "UPDATE users SET firstname = ?, location = ?, job_title = ?, website = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

// Check if the prepare statement succeeded
if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

// Bind parameters to the statement
$stmt->bind_param("ssssi", $firstname, $location, $job_title, $website, $user_id);

// Execute the query
if ($stmt->execute()) {
    $_SESSION['success'] = "Profile updated successfully!";
} else {
    $_SESSION['error'] = "Failed to update profile: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect back to profile page
header("Location: profile.php");
exit();
?>