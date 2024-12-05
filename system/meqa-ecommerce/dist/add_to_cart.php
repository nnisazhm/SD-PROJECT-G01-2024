<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, return error message
    echo json_encode([
        'status' => 'error',
        'message' => 'User not logged in. Please log in to add items to the cart.'
    ]);
    exit();
}

// Check if required data is received from the form
if (isset($_POST['product_id']) && isset($_POST['product_size']) && isset($_POST['product_color'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['product_size'];
    $color = $_POST['product_color'];

    // Fetch product details including image from the database
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the query is prepared successfully
    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to prepare SQL query.'
        ]);
        exit();
    }

    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch product details
        $product = $result->fetch_assoc();

        // Store product images as an array (can be expanded later for multiple images)
        $product_images = explode(',', $product['product_images']); // Assuming images are stored in a comma-separated list in the database

        // Create a cart item array with images included
        $cart_item = [
            'product_id' => $product_id,
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_size' => $size,
            'product_color' => $color,
            'product_quantity' => 1, // Default quantity set to 1
            'product_images' => $product_images // Store image paths for display in the cart
        ];

        // Initialize the cart session if not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the item is already in the cart
        $item_exists = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            // Compare product ID, size, and color for uniqueness
            if ($item['product_id'] == $product_id && $item['product_size'] == $size && $item['product_color'] == $color) {
                $_SESSION['cart'][$key]['product_quantity'] += 1; // Increment quantity if item already exists
                $item_exists = true;
                break;
            }
        }

        // If the item does not exist in the cart, add it
        if (!$item_exists) {
            $_SESSION['cart'][] = $cart_item;
        }

        // Respond with success
        echo json_encode([
            'status' => 'success',
            'message' => 'Product added to cart!'
        ]);
    } else {
        // Product not found in the database
        echo json_encode([
            'status' => 'error',
            'message' => 'Product not found in the database. Please try again.'
        ]);
    }

    $stmt->close();
} else {
    // Required data missing (product_id, product_size, or product_color)
    echo json_encode([
        'status' => 'error',
        'message' => 'Required data is missing: product_id, product_size, or product_color.'
    ]);
}

$conn->close();
?>