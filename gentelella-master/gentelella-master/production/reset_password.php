<?php
session_start();
include 'db_connection.php';

// Get the reset_token from the URL
if (isset($_GET['reset_token'])) {
    $reset_token = $_GET['reset_token'];
    echo "Debug: Reset token received: " . $reset_token . "<br>";
} else {
    echo "Debug: No reset token in the URL. Redirecting to login.html.<br>";
    header('Location: login.html');
    exit;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Debug: Form submitted.<br>";

    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate new passwords
    if ($new_password !== $confirm_password) {
        echo "Debug: Passwords do not match.<br>";
        header('Location: reset_password.html?reset_token=' . $reset_token);
        exit;
    }

    // Check if reset_token exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $reset_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo "Debug: Valid reset token.<br>";

        // Update the password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
        $update_stmt->bind_param("ss", $hashed_password, $reset_token);
        $update_stmt->execute();

        if ($update_stmt->affected_rows == 1) {
            echo "Debug: Password successfully updated.<br>";
            header('Location: login.html');
            exit;
        } else {
            echo "Debug: Failed to update password.<br>";
        }
    } else {
        echo "Debug: Invalid or expired reset token.<br>";
        header('Location: login.html');
        exit;
    }
}
?>