<?php
// Include database connection
include('db_connection.php');

// Check if token is in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database
    $sql = "SELECT * FROM users WHERE verification_token='$token' AND is_verified=0";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the user's status to verified
        $sql_update = "UPDATE users SET is_verified=1 WHERE verification_token='$token'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Your email has been verified successfully!";
        } else {
            echo "Verification failed. Please try again.";
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}

// Close the connection
mysqli_close($conn);
?>
