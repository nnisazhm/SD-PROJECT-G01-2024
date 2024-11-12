<?php
// cancel_order.php
include 'db_connection1.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['order_id'])) {
        $order_id = (int)$_POST['order_id']; // Sanitize the input

        if ($order_id > 0) {
            // Prepare the query to cancel the order
            $query = "UPDATE orders SET order_status = 'Cancelled' WHERE order_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Success
                header("Location: admin_dashboard.php?message=" . urlencode("Order has been cancelled successfully."));
                exit(); // Ensure to exit after the header redirection
            } else {
                // Failed to cancel (e.g., no order found or already cancelled)
                header("Location: admin_dashboard.php?error=" . urlencode("Failed to cancel the order."));
                exit(); // Ensure to exit after the header redirection
            }
        } else {
            // Invalid order_id
            header("Location: admin_dashboard.php?error=" . urlencode("Invalid order ID."));
            exit(); // Ensure to exit after the header redirection
        }
    } else {
        // Missing order_id
        header("Location: admin_dashboard.php?error=" . urlencode("Order ID not provided."));
        exit(); // Ensure to exit after the header redirection
    }
} catch (Exception $e) {
    // Log the error
    error_log("Error cancelling order: " . $e->getMessage());
    header("Location: admin_dashboard.php?error=" . urlencode("An error occurred while cancelling the order."));
    exit(); // Ensure to exit after the header redirection
} finally {
    // Always close the database connection at the end of the script
    if (isset($conn)) {
        $conn->close();
    }
}
?>
