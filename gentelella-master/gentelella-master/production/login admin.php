<?php

// Database connection settings
$servername = "localhost"; // Typically "localhost" if your database is on the same server
$username = "web2"; // Your MySQL username
$password = "web2"; // Your MySQL password
$dbname = "meqa.my"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// Check if both login_email and login_password are set
if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $login_email = validate($_POST['login_email']);
    $login_password = validate($_POST['login_password']);
    
    // Check for empty input before executing SQL
    if (empty($login_email)) { 
        header("Location: admin_login.html?error=User Name is required");
        exit();
    } else if (empty($login_password)) {
        header("Location: admin_login.html?error=Password is required");
        exit();
    } else {
        // Prepared statement to check if user exists in admin table
        $sql = "SELECT * FROM admin WHERE email=? AND password=?";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters (s means string type)
        $stmt->bind_param("ss", $login_email, $login_password);
        
        // Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            echo "Login successful";
            // Redirect to admin dashboard or another page
            header("Location: admin_dashboard.html");
        } else {
            echo "Invalid email or password";
        }
        
        // Close the statement
        $stmt->close();
        exit();
    }
    
} else {
    header("Location: admin_login.html");
    exit();
}

// Close connection
$conn->close();

?>