<?php
// Database connection
session_start();
require_once 'db_connection.php'; // Your database connection

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // File upload path
    $targetDir = "uploads/";
    
    // Create uploads directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $imagePaths = [];

    // Loop through each file uploaded
    if (isset($_FILES['product_images']['name']) && is_array($_FILES['product_images']['name'])) {
        foreach ($_FILES['product_images']['name'] as $key => $fileName) { // Use $key and $fileName properly
            $targetFilePath = $targetDir . basename($fileName); // Get the correct file name
        
            // Get file extension
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        
            if (in_array(strtolower($fileType), $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES["product_images"]["tmp_name"][$key], $targetFilePath)) {
                    $imagePaths[] = $targetFilePath; // Store the file path
                } else {
                    echo "Error uploading file: " . $fileName;
                }
            } else {
                echo "Invalid file type: " . $fileName;
            }
        }
    } else {
        echo "No images uploaded";
    }

    // Now you can insert the product information and image paths into your database
    $product_name = $_POST['product_name'] ?? '';
    $product_description = $_POST['product_description'] ?? '';
    $product_price = $_POST['product_price'] ?? '';
    $product_category = $_POST['product_category'] ?? '';
    $product_size = isset($_POST['product_size']) ? implode(',', $_POST['product_size']) : ''; 
    $product_color = isset($_POST['product_color']) ? implode(',', $_POST['product_color']) : ''; 
    $product_sku = $_POST['product_sku'] ?? ''; 
    $product_quantity = $_POST['product_quantity'] ?? ''; 
    $product_status = $_POST['product_status'] ?? '';

    // Validate product_status to ensure a valid value
    if (!in_array($product_status, ['Active', 'Inactive', 'Out Of Stock'])) {
        echo "Invalid product status.";
        exit;
    }

    $conn = new mysqli('localhost', 'root', 'root', 'meqa.my');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert product information into 'products' table
    $sql = "INSERT INTO products (product_name, product_description, product_price, product_category, product_size, product_color, product_sku, product_quantity, product_status)
            VALUES ('$product_name', '$product_description', '$product_price', '$product_category', '$product_size', '$product_color', '$product_sku', '$product_quantity', '$product_status')";

    if ($conn->query($sql) === TRUE) {
        // Get the inserted product ID
        $product_id = $conn->insert_id;

        // Insert each uploaded image into the 'product_images' table
        foreach ($imagePaths as $imagePath) {
            $sql = "INSERT INTO product_images (product_id, image_path) VALUES ('$product_id', '$imagePath')";
            $conn->query($sql);
        }

        // JavaScript for pop-up and redirection
        echo "<script>
                alert('Item successfully added!');
                window.location.href = 'productList.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>