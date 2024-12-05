<?php
// Include database connection
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['register_fname'];
    $last_name = $_POST['register_lname'];
    $email = $_POST['register_email'];
    $password = password_hash($_POST['register_password'], PASSWORD_BCRYPT); // Hash the password for security
    $verification_token = md5(uniqid(rand(), true)); // Generate a random token

    // Insert user data into the database
    $sql = "INSERT INTO users (email, password, role, verification_token, is_verified, firstname, lastname)
            VALUES ('$email', '$password', 'customer', '$verification_token', 0, '$first_name', '$last_name')";

    if (mysqli_query($conn, $sql)) {
        // Send email for verification
        $subject = "Verify your email for MEQA.MY";
        $message = "Please click the following link to verify your email: ";
        $message .= "http://localhost/verify.php?token=" . $verification_token;
        $headers = "From: no-reply@meqa.my";

        if (mail($email, $subject, $message, $headers)) {
            echo "A verification email has been sent to your email address.";
        } else {
            echo "Failed to send verification email.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>