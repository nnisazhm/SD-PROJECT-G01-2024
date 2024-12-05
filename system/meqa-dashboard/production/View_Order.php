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

// Fetch orders
$sql = "SELECT * FROM orders";
$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - View Orders</title>
    <!-- Include your CSS here -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <h1>Admin Dashboard - View Orders</h1>
        </header>
        <div class="content">
            <div class="table-container">
                <h3>Customer Orders</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['order_id']) ?></td>
                            <td><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td><?= htmlspecialchars($order['email']) ?></td>
                            <td><?= htmlspecialchars($order['product_name']) ?></td>
                            <td><?= htmlspecialchars($order['quantity']) ?></td>
                            <td>$<?= htmlspecialchars($order['total_price']) ?></td>
                            <td><?= htmlspecialchars($order['order_date']) ?></td>
                            <td>
                                <form action="update_status.php" method="POST" class="d-inline">
                                    <select name="order_status" class="form-select form-select-sm">
                                        <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="Processing" <?= $order['status'] == 'Processing' ? 'selected' : '' ?>>Processing</option>
                                        <option value="Completed" <?= $order['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                    </select>
                                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-success mt-1"><i class="fas fa-sync-alt"></i> Update</button>
                                </form>
                            </td>
                            <td>
                                <!-- Action buttons -->
                                <a href="view_order_details.php?order_id=<?= $order['order_id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> View</a>
                                <form action="cancel_order.php" method="POST" class="d-inline">
                                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-times"></i> Cancel</button>
                                </form>
                                <a href="delete_order.php?order_id=<?= $order['order_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
