<?php
// update_status.php
include 'db_connection1.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Sanitize and validate inputs
        $order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : 0;
        $order_status = isset($_POST['order_status']) ? $_POST['order_status'] : '';

        // Validate data
        if ($order_id > 0 && in_array($order_status, ['Pending', 'Processing', 'Completed'])) {
            // Prepare and execute the SQL statement
            $sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $order_status, $order_id);
            $stmt->execute();

            // Redirect to admin dashboard with a success message
            header("Location: admin_dashboard.php?message=" . urlencode("Order status updated successfully"));
            exit();
        } else {
            // Handle invalid input
            header("Location: admin_dashboard.php?error=" . urlencode("Invalid order data provided."));
            exit();
        }
    } else {
        // Not a POST request, redirect with an error
        header("Location: admin_dashboard.php?error=" . urlencode("Invalid request method."));
        exit();
    }
} catch (Exception $e) {
    // Log the error and show a user-friendly message
    error_log("Error updating order status: " . $e->getMessage());
    header("Location: admin_dashboard.php?error=" . urlencode("An error occurred while updating the order status."));
    exit();
} finally {
    // Always close the database connection at the end of the script
    if (isset($conn)) {
        $conn->close();
    }
}
?>
