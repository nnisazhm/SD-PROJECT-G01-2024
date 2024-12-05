<?php
// Database connection
$host = 'localhost';
$dbname = 'meqa.my';
$username = 'web2';
$password = 'web2';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Update order status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['status' => $order_status, 'order_id' => $order_id]);

    // Redirect back to view orders
    header("Location: view_orders.php");
    exit();
}
?>
