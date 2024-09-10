<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database credentials
$servername = "localhost";
$username = "webs412024";
$password = "webs412024";
$dbname = "meqa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is received
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Print the received POST data for debugging
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Escape user inputs for security
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $location = $conn->real_escape_string($_POST['location']);
    $job = $conn->real_escape_string($_POST['job']);
    $work_status = $conn->real_escape_string($_POST['work_status']);
    $website = $conn->real_escape_string($_POST['website']);
    $bio = $conn->real_escape_string($_POST['bio']);
    $birthday = $conn->real_escape_string($_POST['birthday']);

    // Prepare SQL statement with placeholders
    $stmt = $conn->prepare("UPDATE admin_profile 
                            SET name=?, gender=?, email=?, location=?, job=?, website=?, bio=?, birthday=? 
                            WHERE id=?");
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssssi", $name, $gender, $email, $location, $job, $website, $bio, $birthday, $id);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Redirect to profileStaff.html after successful update
        header("Location: profileStaff.html");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
