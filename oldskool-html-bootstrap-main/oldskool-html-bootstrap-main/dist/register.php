<?php
session_start();
// Database connection settings
$servername = "localhost";
$username = "root"; // MySQL username
$password = "root"; // MySQL password
$dbname = "meqa.my"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['register_fname'];
    $lastname = $_POST['register_lname'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: login.html");
        $stmt->close();
        $conn->close();
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate a unique verification token
    $verification_token = bin2hex(random_bytes(16));

    // Insert the new user into the database
    $sql = "INSERT INTO users (email, password, role, created_at, verification_token, is_verified, firstname, lastname) VALUES (?, ?, 'customer', NOW(), ?, 0, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $hashed_password, $verification_token, $firstname, $lastname);

    if ($stmt->execute()) {
        // Generate the verification link
        
      
        // Set up email details
        $to = $email;
        $subject = "Email Verification";
        $message = "Your email is already verified";
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Set content type to HTML
    
        // Send the email
        mail($to, $subject, $message, $headers);
    
        // Display success message and redirect
        echo "<p>Sign-up successful! Please check your email to verify your account.</p>";
        header("Location: verified.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
    $conn->close();
}
?>