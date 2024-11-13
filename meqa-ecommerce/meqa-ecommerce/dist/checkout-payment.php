<?php
session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve session data for checkout
$userEmail = $_SESSION['user_email'] ?? 'Not provided';
$deliveryAddress = $_SESSION['delivery_address'] ?? 'No address set';
$shippingMethod = $_SESSION['shipping_method'] ?? 'Standard Delivery';
$cartItems = $_SESSION['cart_items'] ?? [];
$shippingCost = 8.95;

// Calculate subtotal and grand total
$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$grandTotal = $subtotal + $shippingCost;

?>

<!doctype html>
<html lang="en">

<!-- Head -->
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
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">

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
  <title>Checkout | MEQA.MY</title>

</head>
<body class="">

    <!-- Main Section-->
    <section class="mt-0  vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-lg-7 pt-5 pt-lg-10">
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
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./cart.php">Your Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./checkout.php">Information</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./checkout-shipping.php">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last active"
                                        href="./checkout-payment.php">Payment</a></li>
                            </ul>
                        </nav>                        
                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                        <span class="small"><?= htmlspecialchars($userEmail) ?></span>
                                    </div>
                                    <a href="./checkout.php" class="text-muted small" role="button">Change</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Deliver To</span>
                                        <span class="small"><?= htmlspecialchars($deliveryAddress) ?></span>
                                    </div>
                                    <a href="./checkout-shipping.php" class="text-muted small" role="button">Change</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Method</span>
                                        <span class="small"><?= htmlspecialchars($shippingMethod) ?></span>
                                    </div>
                                    <a href="./checkout-shipping.php" class="text-muted small" role="button">Change</a>
                                </li>
                            </ul>
                            <!-- / Checkout Information Summary-->
                            
                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Payment Information</h3>
                            
                            <div class="row">
                            
                              
                            
                              <!-- Payment Option-->
                              <div class="col-12">
                                <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                                  <input class="form-check-input" type="radio" name="checkoutPaymentMethod" id="checkoutPaymentPaypal">
                                  <label class="form-check-label" for="checkoutPaymentPaypal">
                                    <span class="d-flex justify-content-between align-items-start">
                                      <span>
                                        <span class="mb-0 fw-bolder d-block">ToyyibPay</span>
                                      </span>
                                      <i class="ri-paypal-line"></i>
                                    </span>
                                  </label>
                                </div>
                              </div>
                            
                            </div>
                            
                            
                            <!-- Paypal Info-->
                            <div class="paypal-details bg-light p-4 d-none my-3 fw-bolder">
                              Please click on complete order. You will then be transferred to ToyyibPay to enter your payment details.
                            </div>
                            <!-- /Paypal Info-->
                            
                            
                            
                            <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                              <a href="./checkout-shipping.php" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Back to
                                shipping</a>
                              <a href="#" class="btn btn-dark w-100 w-md-auto" role="button">Complete Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            <!-- Cart Items Summary -->
                            <?php foreach ($cartItems as $item): ?>
                                <div class="row mx-0 py-4 g-0 border-bottom">
                                    <div class="col-2 position-relative">
                                        <picture class="d-block border">
                                            <img class="img-fluid" src="<?= htmlspecialchars($item['image_path']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                        </picture>
                                    </div>
                                    <div class="col-9 offset-1">
                                        <div>
                                            <h6 class="justify-content-between d-flex align-items-start mb-2"><?= htmlspecialchars($item['name']) ?></h6>
                                            <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: <?= htmlspecialchars($item['size']) ?> / Qty: <?= $item['quantity'] ?></span>
                                        </div>
                                        <p class="fw-bolder text-end text-muted m-0">$<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- / Cart Item-->
                        </div>

                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                                <p class="m-0 fs-6 fw-bolder">$<?= number_format($subtotal, 2) ?></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0 fw-bolder fs-6">Shipping</p>
                                <p class="m-0 fs-6 fw-bolder">$<?= number_format($shippingCost, 2) ?></p>
                            </div>
                        </div>

                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                            <div><p class="m-0 fw-bold fs-5">Grand Total</p></div>
                            <p class="m-0 fs-5 fw-bold">$<?= number_format($grandTotal, 2) ?></p>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>