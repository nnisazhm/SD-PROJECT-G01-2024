<?php
// Include the database connection
include('db_connection.php');

// Check if the status update form was submitted
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Validate order_status value
    $allowed_statuses = ['Pending', 'Processing', 'Completed'];
    if (!in_array($order_status, $allowed_statuses)) {
        echo "<script>alert('Invalid order status.');</script>";
    } else {
        // Update the order status in the database
        $update_query = "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id'";

        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Order status updated successfully.');</script>";
        } else {
            // Log the error
            $error = mysqli_error($conn);
            echo "<script>alert('Failed to update order status. Error: $error');</script>";
        }
    }
}

// Fetch orders from the database
$query = "SELECT * FROM orders"; // Adjust this query based on your actual table structure
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MEQA.MY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .dashboard-container { display: flex; flex-direction: column; min-height: 100vh; }
        .header { padding: 10px; background-color: #343a40; color: white; text-align: center; }
        .content { padding: 20px; flex-grow: 1; }
        .table-container { background-color: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Admin Dashboard - MEQA.MY</h1>
        </div>

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
                        <?php while ($order = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $order['order_id'] ?></td>
                                <td><?= htmlspecialchars($order['customer_name']) ?></td>
                                <td><?= htmlspecialchars($order['email']) ?></td>
                                <td><?= htmlspecialchars($order['product_name']) ?></td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['total_amount'] ?></td>
                                <td><?= $order['order_date'] ?></td>
                                <td><?= htmlspecialchars($order['order_status']) ?></td>
                                <td>
                                    <!-- Update Status Form -->
                                    <form action="update_status.php" method="POST" class="d-inline">
                                        <select name="order_status" class="form-select form-select-sm" style="width: 120px;">
                                            <option value="Pending" <?= ($order['order_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                                            <option value="Processing" <?= ($order['order_status'] == 'Processing') ? 'selected' : '' ?>>Processing</option>
                                            <option value="Completed" <?= ($order['order_status'] == 'Completed') ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                        <button type="submit" name="update_status" class="btn btn-sm btn-success mt-1"><i class="fas fa-sync-alt"></i> Update</button>
                                    </form>

                                    <!-- View button to trigger modal -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#orderModal<?= $order['order_id'] ?>">
                                        <i class="fas fa-eye"></i> View
                                    </button>

                                    <form action="cancel_order.php" method="POST" class="d-inline">
                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-times"></i> Cancel</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for viewing order details -->
                            <div class="modal fade" id="orderModal<?= $order['order_id'] ?>" tabindex="-1" aria-labelledby="orderModalLabel<?= $order['order_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderModalLabel<?= $order['order_id'] ?>">Order Details - Order #<?= $order['order_id'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Order ID:</strong> <?= $order['order_id'] ?></p>
                                            <p><strong>Customer Name:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
                                            <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
                                            <p><strong>Product Name:</strong> <?= htmlspecialchars($order['product_name']) ?></p>
                                            <p><strong>Order Status:</strong> <?= htmlspecialchars($order['order_status']) ?></p>
                                            <p><strong>Order Date:</strong> <?= $order['order_date'] ?></p>
                                            <p><strong>Total Amount:</strong> <?= $order['total_amount'] ?></p>
                                            <p><strong>Item Count:</strong> <?= $order['item_count'] ?></p>
                                            <p><strong>Quantity:</strong> <?= $order['quantity'] ?></p>
                                            <p><strong>Price:</strong> <?= $order['price'] ?></p>
                                            <p><strong>Subtotal:</strong> <?= $order['subtotal'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>