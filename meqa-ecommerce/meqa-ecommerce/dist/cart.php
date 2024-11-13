<?php
session_start();

// Assuming session cart items are stored like this:
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Empty cart if it's not set
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">

  <!-- Custom Google Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto" rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

  <!-- Fix for custom scrollbar if JS is disabled-->
  <noscript>
    <style>
      /**
          * Reinstate scrolling for non-JS clients
          */
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>Cart | MEQA.MY</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="mt-0 overflow-lg-hidden vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-12 col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                        <!-- Logo-->
                        <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26"><path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/></svg>
                                </div>
                            </a>
                        <!-- / Logo-->
                        <nav class="d-none d-md-block">
                            <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                                <li class="me-4"><a class="nav-link-checkout active" href="./cart.php">Your Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout" href="./checkout.php">Information</a></li>
                                <li class="me-4"><a class="nav-link-checkout" href="./checkout-shipping.php">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last" href="./checkout-payment.php">Payment</a></li>
                            </ul>
                        </nav>                        
                        <div class="mt-5">
                            <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">Your Cart</h3>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody class="border-0">
                                        <!-- Loop through the cart items -->
                                        <?php foreach ($_SESSION['cart'] as $key => $cart_item): ?>
                                            <div class="row mx-0 py-4 g-0 border-bottom">
                                                <div class="col-2 position-relative">
                                                    <picture class="d-block border">
                                                        <?php 
                                                        // Check if 'product_images' exists and is not empty
                                                        if (isset($cart_item['product_images']) && !empty($cart_item['product_images'])) {
                                                            $product_images = explode(',', $cart_item['product_images']);
                                                            foreach ($product_images as $image): ?>
                                                                <img class="img-fluid" src="./assets/images/products/<?php echo htmlspecialchars($image); ?>" alt="Product Image">
                                                            <?php endforeach;
                                                        } else {
                                                            // Fallback if no images are available
                                                            echo '<p>No images available</p>';
                                                        }
                                                        ?>
                                                    </picture>
                                                </div>
                                                <div class="col-9 offset-1">
                                                    <div>
                                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                            <?= htmlspecialchars($cart_item['product_name']); ?>
                                                            <i class="ri-close-line ms-3 remove-item" data-id="<?= $key; ?>"></i>
                                                        </h6>
                                                        <span class="d-block text-muted fw-bolder text-uppercase fs-9">
                                                            Size: <?= htmlspecialchars($cart_item['product_size']); ?> / Qty: <?= htmlspecialchars($cart_item['product_quantity']); ?>
                                                        </span>
                                                    </div>
                                                    <p class="fw-bolder text-end text-muted m-0"><?= htmlspecialchars($cart_item['product_price']); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>


 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-4 border-bottom">
                            <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Grand Total</p>
                                </div>
                                <!-- Grand Total Calculation -->
                                <p class="m-0 fs-5 fw-bold">
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $cart_item) {
                                        $total += $cart_item['product_price'] * $cart_item['product_quantity'];
                                    }
                                    echo number_format($total, 2);
                                    ?>
                                </p>
                            </div>
                        </div>
                        <a href="./checkout.php" class="btn btn-dark w-100 text-center" role="button">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

    <!-- Remove Item JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listeners to remove item icons
            const removeButtons = document.querySelectorAll('.remove-item');
            removeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const itemId = this.getAttribute('data-id');
                    // Send the ID to the server for removal
                    fetch('remove_item.php?id=' + itemId, {
                        method: 'GET'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the item from the DOM
                            this.closest('.row').remove();
                            alert('Item removed from cart');
                        } else {
                            alert('Error removing item');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>



</body>

</html>