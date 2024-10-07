<?php
// Include UniServer's mail function
use UniServer\Mailer; // Assume you have set up UniServer's PHP mailer correctly

// Database connection (example)
$conn = new mysqli("localhost", "root", "root", "meqa.my");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // Generate a secure random token

    // Check if email exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Store the token in the database
        $update = "UPDATE users SET reset_token='$token', reset_token_expiry=DATE_ADD(NOW(), INTERVAL 30 MINUTE) WHERE email='$email'";
        $conn->query($update);

        // Construct reset link
        $resetLink = "http://localhost/reset_password.php?token=$token";

        // Send email using UniServer mailer
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $resetLink";
        $headers = "From: your-email@domain.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Failed to send the reset link. Please try again.";
        }
    } else {
        echo "No account found with that email.";
    }
}
?>
