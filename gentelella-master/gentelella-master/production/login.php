<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // SQL query to check user
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verifying password
        if (password_verify($password, $row['password'])) {
            // Setting session variables for logged in user
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            ob_end_clean();
            if ($row['role'] == 'customer') {
                header("Location: index.html");
            } elseif ($row['role'] == 'staff') {
                header("Location: index.html");
            } elseif ($row['role'] == 'admin') {
                header("Location: index.html");
            }
            exit(); // Ensure that no further code is executed after redirection
        } else {
            // Invalid password
            echo "Invalid email or password.";
        }
    } else {
        // User does not exist
        echo "Invalid email or password.";
    }
    
    $stmt->close();
}

$conn->close();
?>