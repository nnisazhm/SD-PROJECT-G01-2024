<?php
// Step 1: Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meqa.my";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if the email exists in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Query to check if email exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Step 3: Generate a unique reset token
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Step 4: Store the reset token and expiry time in the database
        $sql = "UPDATE users SET reset_token='$token', reset_token_expiry='$expiry' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            // Step 5: Send the reset link to the user's email
            $resetLink = "http://localhost/reset_password.php?token=$token"; // Change `localhost` to your server address

            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $resetLink";
            $headers = "From: no-reply@meqa.my";

            // Send email (use UniServer's mail function or other email libraries)
            if (mail($email, $subject, $message, $headers)) {
                echo "A password reset link has been sent to your email.";
            } else {
                echo "Failed to send the reset link. Please try again.";
            }
        } else {
            echo "Failed to store the reset token. Please try again.";
        }
    } else {
        echo "No account found with that email address.";
    }
}

$conn->close();
?>

