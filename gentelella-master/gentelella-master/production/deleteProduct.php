<?php
// Database connection
session_start();
require_once 'db_connection.php'; // Your database connection

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']); // Get the product ID from the URL

    // Prepare the SQL statement to delete the product
    $deleteProductSQL = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($deleteProductSQL);

    if ($stmt) {
        // Bind the product ID parameter
        $stmt->bind_param("i", $productId);

        // Execute the statement
        if ($stmt->execute()) {
            // Successfully deleted
            $_SESSION['message'] = "Product deleted successfully.";
        } else {
            // Failed to delete
            $_SESSION['message'] = "Error deleting product: " . $conn->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    $_SESSION['message'] = "No product ID specified.";
}

// Redirect back to product list page
header("Location: productList.php");
exit();
?>