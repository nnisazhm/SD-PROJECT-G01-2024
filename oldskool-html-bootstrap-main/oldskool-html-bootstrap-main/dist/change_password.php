<?php
// Include your database connection file
require_once 'db_connection1.php';  // Replace with your own DB connection file

// Start session
session_start();

// Function to hash the password securely
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);  // BCRYPT is recommended
}

// Function to verify the password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Check if the user is logged in (assumed to have a session variable 'user_id')
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted form data
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the form
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        die("All fields are required.");
    }

    if ($new_password !== $confirm_password) {
        die("New passwords do not match.");
    }

    // Get the current user's data from the database
    $user_id = $_SESSION['user_id'];  // Assuming you store the logged-in user's ID in the session
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Fetch the hashed password from the database
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the old password
        if (!verifyPassword($old_password, $hashedPassword)) {
            die("Old password is incorrect.");
        }

        // Hash the new password
        $new_hashed_password = hashPassword($new_password);

        // Update the password in the database
        $update_sql = "UPDATE users SET password = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('si', $new_hashed_password, $user_id);

        if ($update_stmt->execute()) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password.";
        }

    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>