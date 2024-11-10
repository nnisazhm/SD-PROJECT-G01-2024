<?php
// cancel_order.php

// Database connection
$servername = "localhost"; // Adjust as needed
$username = "root"; // Database username
$password = "root"; // Database password
$dbname = "meqa.my"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the order ID and user ID from the request (usually from a POST request)
$order_id = $_POST['order_id'];
$user_id = $_POST['user_id'];

// Check if the order exists and belongs to the user
$sql = "SELECT * FROM orders WHERE order_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update the order status to 'Canceled'
    $update_sql = "UPDATE orders SET status = 'Canceled' WHERE order_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("i", $order_id);
    
    if ($update_stmt->execute()) {
        echo "Order has been successfully canceled.";
    } else {
        echo "Failed to cancel the order. Please try again.";
    }
} else {
    echo "Order not found or does not belong to the user.";
}

// Close connections
$stmt->close();
$update_stmt->close();
$conn->close();
?>
