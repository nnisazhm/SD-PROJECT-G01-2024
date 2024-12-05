<?php
include 'db_connection1.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['order_id'])) {
    $order_id = (int)$_POST['order_id'];
    $query = "UPDATE orders SET order_status = 'Cancelled' WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    header("Location: ViewOrder.php?message=" . urlencode("Order has been cancelled successfully."));
    exit();
}
?>