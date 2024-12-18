<?php
// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection file
require_once 'db_connection.php';

// Retrieve cart items from session
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$subtotal = 0;

// Calculate subtotal
foreach ($cart_items as $item) {
    $subtotal += $item['product_price'] * $item['product_quantity'];
}

// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT email, firstname, lastname, phone, address FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $email, $firstname, $lastname, $phone, $address);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
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
                                <li class="me-4"><a class="nav-link-checkout active"
                                        href="./cart.php">Your Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./checkout.php">Information</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="./checkout-shipping.php">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last "
                                        href="./checkout-payment.php">Payment</a></li>
                             </ul>
                        </nav>      

                        <div class="mt-5">
                            <!-- Checkout Panel Information-->
                            <form action="checkout-shipping.php" method="POST">

                              <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                                <h3 class="fs-5 fw-bolder m-0 lh-1">Contact Information</h3>
                              </div>
                              <div class="row">
                                <!-- First Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="firstNameBilfirstnameling" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname) ?>" required>

                                  </div>
                                </div>
                              
                                <!-- Last Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="lastname" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname) ?>" required>
                                  </div>
                                </div>
                              
                                <!-- Email-->
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                                  </div>
                                </div>
                              </div>
                              
                              <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Shipping Address</h3>
                              <div class="row">
                                <!-- First Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname) ?>" required>
                                  </div>
                                </div>
                              
                                <!-- Last Name-->
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname) ?>" required>
                                  </div>
                                </div>
                              
                                <!-- Address-->
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= htmlspecialchars($address) ?>" required>
                                  </div>
                                </div>
                              
                                <!-- Country-->
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" required="">
                                      <option value="">Please Select...</option>
                                      <option>Malaysia</option>
                                    </select>
                                  </div>
                                </div>
                              
                                <!-- State-->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" required="">
                                  </div>
                                </div>
                              
                                <!-- Post Code-->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="zip" class="form-label">Zip/Post Code</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required="">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
                                <button type="submit" class="btn btn-dark w-100 w-md-auto">Proceed to Shipping</button>
                              </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                      <div class="p-4">
                          <h3 class="fs-5 fw-bolder mb-4">Order Summary</h3>
                          <?php foreach ($cart_items as $item): ?>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                  <span><?= htmlspecialchars($item['product_name']) ?> (Qty: <?= $item['product_quantity'] ?>)</span>
                                  <span>RM<?= number_format($item['product_price'] * $item['product_quantity'], 2) ?></span>
                              </div>
                          <?php endforeach; ?>

                          <div class="d-flex justify-content-between border-top pt-3 mt-3 fw-bolder">
                              <span>Subtotal</span>
                              <span>RM<?= number_format($subtotal, 2) ?></span>
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

<?php
// Close database connection
mysqli_close($conn);
?>