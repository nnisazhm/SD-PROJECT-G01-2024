<?php
session_start();

// Check if cart is set
if (isset($_SESSION['cart'])) {
    // Check if the 'id' is provided
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $item_id = $_GET['id'];

        // Remove the item from the cart by key (item_id)
        if (isset($_SESSION['cart'][$item_id])) {
            unset($_SESSION['cart'][$item_id]);

            // Re-index the array so keys are continuous
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            
            // Return a success response
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Item not found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid item ID']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
}
?>
