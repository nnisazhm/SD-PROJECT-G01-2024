<?php
$conn = new mysqli('localhost', 'root', '', 'your_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify the token and activate the account
    $query = "SELECT * FROM users WHERE token='$token' AND status=0 LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $query = "UPDATE users SET status=1 WHERE token='$token'";
        if ($conn->query($query)) {
            // Redirect to the 'verified.html' page after successful verification
            header('Location: verified.html');
            exit(); // Stop further execution
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<h3>Invalid or expired token</h3>";
    }
} else {
    echo "<h3>No token provided</h3>";
}

$conn->close();
?>
