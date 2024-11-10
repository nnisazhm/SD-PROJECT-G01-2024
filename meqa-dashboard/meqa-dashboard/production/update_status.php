<?php
// update_status.php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve order_id and order_status from the POST data
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Update order status in the database
    $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $order_status, $order_id);

    if ($stmt->execute()) {
        // Redirect back with a success message
        header("Location: admin_dashboard.php?message=Order+status+updated+successfully");
    } else {
        // Redirect back with an error message
        header("Location: admin_dashboard.php?error=Failed+to+update+order+status");
    }

    $stmt->close();
}

$conn->close();
?>
