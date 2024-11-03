<?php
// Connect to the database
include 'db_connection.php'; // Ensure you have a file with your DB connection

if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Update the order status to 'Cancelled'
    $query = "UPDATE orders SET status = 'Cancelled' WHERE order_id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Order has been cancelled successfully.";
        } else {
            echo "Failed to cancel the order. Please try again.";
        }

        $stmt->close();
    } else {
        echo "Database error.";
    }
} else {
    echo "Order ID not provided.";
}

$conn->close();
?>
