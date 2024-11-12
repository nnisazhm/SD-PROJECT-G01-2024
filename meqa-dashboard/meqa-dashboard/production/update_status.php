<?php
include 'db_connection1.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['order_id']) && isset($_POST['order_status'])) {
    $order_id = (int)$_POST['order_id'];
    $order_status = $_POST['order_status'];

    $query = "UPDATE orders SET order_status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $order_status, $order_id);
    $stmt->execute();

    header("Location: ViewOrder.php?message=" . urlencode("Order status updated successfully."));
    exit();
}
?>