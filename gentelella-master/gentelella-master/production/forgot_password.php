<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'db_connection.php';

if (isset($_POST['submit_password'])) {
    $token = $_GET['token'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    // Check if the token and new password are provided
    if (empty($token) || empty($new_password)) {
        $_SESSION['error'] = 'Invalid token or password';
        header('Location: forgot_password.php?token=' . urlencode($token));
        exit();
    }

    // Validate the new password
    if (strlen($new_password) < 8 || !preg_match('/[A-Z]/', $new_password) || !preg_match('/[0-9]/', $new_password) || !preg_match('/[@$!%*?&#]/', $new_password)) {
        $_SESSION['error'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character.';
        header('Location: forgot_password.php?token=' . urlencode($token));
        exit();
    }

    // Check if the token is valid and not expired
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expiration > ?");
    if (!$stmt) {
        die("Database prepare error: " . $conn->error);
    }
    $current_time = date('Y-m-d H:i:s');
    $stmt->bind_param('ss', $token, $current_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Token is valid, update the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiration = NULL WHERE reset_token = ?");
        if (!$stmt) {
            die("Database prepare error: " . $conn->error);
        }
        $stmt->bind_param('ss', $hashed_password, $token);
        if ($stmt->execute()) {
            echo "<script>
                alert('Your password has been reset successfully.');
                window.location.href = 'login.html';
            </script>";
            exit();
        } else {
            $_SESSION['error'] = 'Failed to update password';
        }
    } else {
        $_SESSION['error'] = 'Invalid or expired token';
    }

    header('Location: forgot_password.php?token=' . urlencode($token));
    exit();
} else {
    $_SESSION['error'] = 'Invalid request. Please provide all required data.';
    header('Location: forgot_password.html');
    exit();
}
?>
