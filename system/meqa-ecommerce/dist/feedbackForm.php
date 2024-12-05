<?php
// Include database connection
include 'db.php'; // Update with your actual database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate fields
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Prepare SQL statement to insert feedback
        $sql = "INSERT INTO feedback (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            // Bind parameters and execute
            $stmt->bind_param("ssss", $name, $email, $subject, $message);
            if ($stmt->execute()) {
                echo "<script>
                        alert('Feedback submitted successfully!');
                        window.location.href = 'index.html';
                      </script>";
            } else {
                echo "<script>alert('Failed to submit feedback.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>
