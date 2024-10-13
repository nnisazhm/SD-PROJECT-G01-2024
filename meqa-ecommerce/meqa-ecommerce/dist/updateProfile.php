<?php
session_start();

$servername = "localhost";
$username = "root";  // Your database username
$password = "root";      // Your database password
$dbname = "meqa.my";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized access!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Update user profile in the database
    $sql = "UPDATE users SET firstname = ?, lastname = ?, phone = ?, birthday = ?, gender = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $firstname, $lastname, $phone, $birthday, $gender, $address, $user_id);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
        header("Location: profile.php"); // Redirect to profile page after update
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>