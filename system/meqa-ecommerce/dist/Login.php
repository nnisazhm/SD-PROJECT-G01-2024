<?php
session_start();
// Database connection settings
$servername = "localhost"; // Typically "localhost" if your database is on the same server
$username = "root"; // Your MySQL username
$password = "root"; // Your MySQL password
$dbname = "meqa.my"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
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
            header("Location: login.html?error=1");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Invalid email or password.";
        header("Location: login.html?error=1");
        exit();
    }
    
    $stmt->close();
}

$conn->close();
?>