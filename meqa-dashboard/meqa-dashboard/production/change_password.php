<?php
session_start();
require 'db_connection.php'; // Assuming db_connection.php establishes database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from session
$user_id = $_SESSION['user_id'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if POST variables are set
    if (isset($_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
        // Get user input from form
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate form input
        if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
            echo "<script>alert('All fields are required!');</script>";
            exit();
        }

        if ($new_password !== $confirm_password) {
            echo "<script>alert('New password and confirm password do not match!');</script>";
            exit();
        }

        // Fetch the user from the database
        $query = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        // Verify old password
        if (!password_verify($old_password, $hashed_password)) {
            echo "<script>alert('Incorrect old password!');</script>";
            exit();
        }

        // Hash new password
        $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password in the database
        $update_query = "UPDATE users SET password = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $new_hashed_password, $user_id);
        
        if ($update_stmt->execute()) {
            echo "<script>
                    alert('Password successfully changed!');
                    window.location.href = 'profile.php';
                  </script>";
        } else {
            echo "<script>alert('Failed to change password. Please try again later.');</script>";
        }

        $update_stmt->close();
    } else {
        echo "<script>alert('Form not submitted properly.');</script>";
        exit();
    }
}