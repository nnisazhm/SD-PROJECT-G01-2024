<?php
session_start();
include('db_connection.php');

// Function to calculate the total price of cart items
function calculateCartTotal($cartItems, $shippingCost) {
    $subtotal = 0;
    foreach ($cartItems as $item) {
        $subtotal += $item['product_price'] * $item['product_quantity'];
    }
    $grandTotal = $subtotal + $shippingCost;
    return ['subtotal' => $subtotal, 'grandTotal' => $grandTotal];
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Assuming cart items are stored in session (cartItems is an array of product data)
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$shippingCost = 0; // Default shipping cost

// Check if shipping method is selected
if (isset($_POST['checkoutShippingMethod'])) {
    if ($_POST['checkoutShippingMethod'] == 'store_pickup') {
        $shippingCost = 0; // Store pick-up is free
    } elseif ($_POST['checkoutShippingMethod'] == 'doorstep_delivery') {
        $shippingCost = 5.00; // Set shipping cost for doorstep delivery
    }
}

// Calculate totals
$totals = calculateCartTotal($cartItems, $shippingCost);
$subtotal = $totals['subtotal'];
$grandTotal = $totals['grandTotal'];

// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT email, firstname, lastname, phone, address FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $email, $firstname, $lastname, $phone, $address);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Display user contact info (assuming contact is stored in the session or fetched from the database)
$userEmail = "test@email.com"; // This would come from the session or database
?>

<!doctype html>
<html lang="en">
<head>
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

    <title>Checkout | MEQA.MY</title>
</head>
<body>

<section class="mt-0 vh-lg-100">
    <div class="container">
        <div class="row g-0 vh-lg-100">
            <div class="col-lg-7 pt-5 pt-lg-10">
                <div class="pe-lg-5">
                    <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="./index.html">
                        <div class="d-flex align-items-center">
                            <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26"><path
                                        d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/></svg>
                        </div>
                    </a>
                    <nav class="d-none d-md-block">
                        <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                            <li class="me-4"><a class="nav-link-checkout" href="./cart.php">Your Cart</a></li>
                            <li class="me-4"><a class="nav-link-checkout" href="./checkout.php">Information</a></li>
                            <li class="me-4"><a class="nav-link-checkout active" href="./checkout-shipping.php">Shipping</a></li>
                            <li><a class="nav-link-checkout nav-link-last" href="./checkout-payment.php">Payment</a></li>
                        </ul>
                    </nav>

                    <div class="mt-5">
                        <!-- Checkout Information Summary -->
                        <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <span class="text-muted small me-2 f-w-36 fw-bolder">Contact</span>
                                    <span class="small"><?= htmlspecialchars($email) ?></span>
                                </div>
                                <a href="./checkout.php" class="text-muted small" role="button">Change</a>
                            </li>
                        </ul>

                        <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Shipping Method</h3>

                        <!-- Shipping Option -->
                        <form method="POST">
                            <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                                <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodOne" value="store_pickup" <?= $shippingCost == 0 ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="checkoutShippingMethodOne">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Store Pick-Up</span>
                                            <small class="fw-bolder">Collect from our store in Solaris Dutamas</small>
                                        </span>
                                        <span class="small fw-bolder text-uppercase">Free</span>
                                    </span>
                                </label>
                            </div>

                            <!-- Shipping Option -->
                            <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                                <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodTwo" value="doorstep_delivery" <?= $shippingCost == 5.00 ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="checkoutShippingMethodTwo">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Doorstep Delivery</span>
                                            <small class="fw-bolder">Have your order shipped within 5 business days</small>
                                        </span>
                                        <span class="small fw-bolder text-uppercase">RM 5</span>
                                    </span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 w-md-auto mt-3">Update Shipping</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                    <div class="pb-3">
                        <!-- Cart Items -->
                        <?php foreach ($cartItems as $item): ?>
                            <div class="row mx-0 py-4 g-0 border-bottom">
                                
                                <div class="col-9 offset-1">
                                    <div>
                                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                                            <?= $item['product_name']; ?>
                                        </h6>
                                        <span class="d-block mb-0 small">Size <?= $item['product_size']; ?> <?= $item['product_color']; ?></span>
                                        <span class="d-block mb-2 small"><?= $item['product_quantity']; ?> x RM <?= number_format($item['product_price'], 2); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Cart Total -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <span class="text-muted small">Subtotal</span>
                            <span class="text-dark small">RM <?= number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">Shipping</span>
                            <span class="text-dark small">RM <?= number_format($shippingCost, 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            <span class="fw-bolder">Total</span>
                            <span class="fw-bolder">RM <?= number_format($grandTotal, 2); ?></span>
                        </div>

                        <!-- Proceed to Next Step -->
                        <a href="checkout-payment.php" class="btn btn-dark w-100 mt-4">Proceed to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vendor JS -->
<script src="./assets/js/libs.bundle.js"></script>

<!-- Main JS -->
<script src="./assets/js/theme.bundle.js"></script>

</body>
</html>