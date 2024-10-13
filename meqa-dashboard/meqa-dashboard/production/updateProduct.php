<?php
session_start();
require_once 'db_connection.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $product_id = $_POST['product_id'];
    $product_sku = $_POST['product_sku'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_status = $_POST['product_status'];

    // Retrieve selected product sizes and colors as comma-separated values
    $product_size = isset($_POST['product_size']) ? implode(",", $_POST['product_size']) : '';
    $product_color = isset($_POST['product_color']) ? implode(",", $_POST['product_color']) : '';

    // Prepare and bind the SQL statement (now includes product_size and product_color)
    $stmt = $conn->prepare("UPDATE products SET product_sku = ?, product_name = ?, product_price = ?, product_category = ?, product_status = ?, product_size = ?, product_color = ? WHERE product_id = ?");
    $stmt->bind_param("ssdssssi", $product_sku, $product_name, $product_price, $product_category, $product_status, $product_size, $product_color, $product_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['message'] = "Product updated successfully!";
    } else {
        // Set error message
        $_SESSION['message'] = "Error updating product: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to productList.php
    header("Location: productList.php");
    exit();
}
?>