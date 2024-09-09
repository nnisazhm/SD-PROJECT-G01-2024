<?php
// Start the session if needed
session_start();

// Database credentials
$servername = "localhost";
$username = "webs412024";
$password = "webs412024";
$dbname = "meqa";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the data from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $job = $_POST['job'];
    $website = $_POST['website'];
    $bio = $_POST['bio'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE admins SET name=?, gender=?, email=?, location=?, job=?, website=?, bio=? WHERE id=?");
    $stmt->bind_param("ssssssi", $name, $gender, $email, $location, $job, $website, $bio, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Update successful, now redirect to profileAdmin.html
        header("Location: profileAdmin.html");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
