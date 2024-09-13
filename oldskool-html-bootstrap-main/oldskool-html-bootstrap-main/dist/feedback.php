<?php
// Connect to the database
$servername = "localhost"; // Update with your server details
$username = "root";        // Update with your MySQL username
$password = "root";            // Update with your MySQL password
$dbname = "meqa.my";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Validate the inputs (add more validation as necessary)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Insert the feedback into the database
        $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
}

// Close the connection
$conn->close();
?>
