<?php
include 'db_connection1.php';

// Fetch all orders to display on the admin dashboard
$query = "SELECT * FROM orders";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Font Awesome icons -->
</head>
<body>

<div class="container mt-5">
    <h3>Admin Dashboard</h3>

    <!-- Success/Error Messages -->
    <?php
    if (isset($_GET['message'])) {
        echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['message']) . "</div>";
    }
    if (isset($_GET['error'])) {
        echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>";
    }
    ?>

    <!-- Orders List Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Order Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['order_status'] . "</td>";
                    echo "<td>";
                    // Form for updating order status
                    echo "<form action='update_status.php' method='POST' class='d-inline'>
                            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
                            <select name='order_status' class='form-control form-control-sm' style='width: 150px;'>
                                <option value='Pending' " . ($row['order_status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                <option value='Processing' " . ($row['order_status'] == 'Processing' ? 'selected' : '') . ">Processing</option>
                                <option value='Completed' " . ($row['order_status'] == 'Completed' ? 'selected' : '') . ">Completed</option>
                            </select>
                            <button type='submit' class='btn btn-primary btn-sm mt-1'><i class='fas fa-sync-alt'></i> Update Status</button>
                          </form>";
                    // Form for cancelling an order
                    echo "<form action='cancel_order.php' method='POST' class='d-inline'>
                            <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
                            <button type='submit' class='btn btn-danger btn-sm mt-1'><i class='fas fa-trash'></i> Cancel Order</button>
                          </form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
