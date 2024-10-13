<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

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
        echo "Email already registered.";
        $stmt->close();
        $conn->close();
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Generate a unique verification token
    $verification_token = bin2hex(random_bytes(16));

    // Insert the new user into the database
    $sql = "INSERT INTO users (email, password, role, created_at, verification_token, is_verified) VALUES (?, ?, 'staff', NOW(), ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $hashed_password, $verification_token);

    if ($stmt->execute()) {
        // Send verification email
        $verification_link = "http://yourdomain.com/verify_email.php?token=" . $verification_token;

        $to = $email;
        $subject = "Email Verification";
        $message = "Please verify your email by clicking on this link: " . $verification_link;
        $headers = "From: no-reply@yourdomain.com";

        mail($to, $subject, $message, $headers);

        // Display success message and redirect
        echo "<p>Sign-up successful! Please log in again.</p>";

        ob_end_clean();
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
