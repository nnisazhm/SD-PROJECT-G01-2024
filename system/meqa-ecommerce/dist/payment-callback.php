<?php
include 'db_connection.php';

// Fetch callback data
$billCode = $_POST['billcode'] ?? '';
$status = $_POST['status'] ?? '';
$transactionID = $_POST['transaction_id'] ?? '';
$amountPaid = $_POST['amount_paid'] ?? 0;

// Validate transaction
if ($status == "1") {
    // Payment successful
    // Update order status in the database
    $query = "UPDATE orders SET status = 'Paid', transaction_id = ? WHERE bill_code = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $transactionID, $billCode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "Payment successful!";
} else {
    // Payment failed
    echo "Payment failed. Please try again.";
}
?>