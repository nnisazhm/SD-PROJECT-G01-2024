
<?php 
// Database connection settings
$servername = "localhost"; // Typically "localhost" if your database is on the same server
$username = "web2"; // Your MySQL username
$password = "web2"; // Your MySQL password
$dbname = "meqa.my"; // The name of your database

// Create connection $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } echo "Connected successfully";

// Check if all registration fields are set if (isset($_POST['register_email']) && isset($_POST['register_password']) && isset($_POST['register_name'])) {function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$register_email = validate($_POST['register_email']);
$register_password = validate($_POST['register_password']);
$register_name = validate($_POST['register_name']);

// Check for empty input before executing SQL
if (empty($register_email)) { 
    header("Location: register.html?error=Email is required");
    exit();
} else if (empty($register_password)) {
    header("Location: register.html?error=Password is required");
    exit();
} else if (empty($register_name)) {
    header("Location: register.html?error=Name is required");
    exit();
} else {
    // Prepared statement to insert new customer into user table
    $sql = "INSERT INTO user (email, password, name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters (s means string type)
    $stmt->bind_param("sss", $register_email, $register_password, $register_name);
    
    // Execute statement
    $stmt->execute();
    
    if ($stmt->affected_rows === 1) {
        echo "Registration successful";
        // Redirect to login page or another page
        header("Location: login.php");
    } else {
        echo "Registration failed";
    }
    
    // Close the statement
    $stmt->close();
    exit();
}