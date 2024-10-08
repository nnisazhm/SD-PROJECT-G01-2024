<?php
// Include database connection
include 'db_connection.php';

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id = ?");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "No customer found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!-- Display customer details -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
</head>
<body>
    <h1>Customer Details</h1>
    <p><strong>First Name:</strong> <?php echo htmlspecialchars($customer_id['first_name']); ?></p>
	<p><strong>Last Name:</strong> <?php echo htmlspecialchars($customer_id['last_name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($customer_id['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($customer_id['phone']); ?></p>
    <p><strong>Birthday:</strong> <?php echo htmlspecialchars($customer_id['birthday']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($customer_id['gender']); ?></p>
    <a href="viewStaffDashboard.html">Back to Dashboard</a>
</body>
</html>
S