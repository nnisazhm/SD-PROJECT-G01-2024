<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'db_connection.php'; // Include your database connection

if (isset($_POST['login_email'])) {
    $email = $_POST['login_email'];

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$stmt) {
        die("Database prepare error: " . $conn->error);
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Email exists, generate a reset token
        $reset_token = bin2hex(random_bytes(16)); // Generate a random token
        $expiration_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token valid for 1 hour

        // Update the user's reset token and expiration time in the database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiration = ? WHERE email = ?");
        if (!$stmt) {
            die("Database prepare error: " . $conn->error);
        }
        $stmt->bind_param('sss', $reset_token, $expiration_time, $email);

        if ($stmt->execute()) {
            // Send the reset link to the user's email
            $reset_link = "http://localhost/SD-PROJECT-G01-2024/oldskool-html-bootstrap-main/oldskool-html-bootstrap-main/dist/reset-password.html?token=" . urlencode($reset_token);
            $subject = "Password Reset Request";
            $message = "Hi,\n\nPlease click the following link to reset your password:\n" . $reset_link . "\n\nThis link will expire in 1 hour.";
            $headers = "From: no-reply@meqa.my\r\n";

            if (mail($email, $subject, $message, $headers)) {
                echo "<script>
                    alert('Password reset link has been sent to your email.');
                    window.location.href = 'login.html';
                </script>";
                exit();
            } else {
                $_SESSION['error'] = 'Failed to send the reset link. Please try again.';
            }
        } else {
            $_SESSION['error'] = 'Failed to store reset token.';
        }
    } else {
        $_SESSION['error'] = 'Invalid email. Please try again.';
    }

    header('Location: forgotten-password.html');
    exit();
} else {
    $_SESSION['error'] = 'Please provide a valid email.';
    header('Location: forgotten-password.html');
    exit();
}
?>