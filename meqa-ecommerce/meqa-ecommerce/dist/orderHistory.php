<!--kena tambah untuk detail mcm dkt id tu boleh tekan untuk view detail ape yang kita beli contoh id 001 tu beli mcm 2 barang gitu ke ape -->
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

  <!-- OldSkool CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

<!--====== Google Font ======-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

<!--====== Ludus Css ======-->
<link rel="stylesheet" href="css/vendor.css">
<link rel="stylesheet" href="css/utility.css">
<link rel="stylesheet" href="css/app.css">



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
  <title>Order History</title>

</head>
<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
        <div class="container-fluid">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
    
                    <!-- Logo-->
                    <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="./index.html">
                        <div class="d-flex align-items-center">
                            <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26"><path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/></svg>
                        </div>
                    </a>
                    <!-- / Logo-->
    
                    <!-- Navbar Icons-->
                    <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">
    
                        <!-- Mobile Nav Toggler-->
                        <li class="d-lg-none">
                            <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menu</span>
                        </li>
                        <!-- /Mobile Nav Toggler-->
    
                        <!-- Navbar Search-->
                        <li class="d-none d-sm-block">
                            <span class="nav-link text-body search-trigger cursor-pointer">Search</span>
    
                            <!-- Search navbar overlay-->
                            <div class="navbar-search d-none">
                                <div class="input-group mb-3 h-100">
                                    <span class="input-group-text px-4 bg-transparent border-0"><i
                                            class="ri-search-line ri-lg"></i></span>
                                    <input type="text" class="form-control text-body bg-transparent border-0"
                                        placeholder="Enter your search terms...">
                                    <span
                                        class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent border-0"><i
                                            class="ri-close-circle-line ri-lg"></i></span>
                                </div>
                            </div>
                            <div class="search-overlay"></div>
                            <!-- / Search navbar overlay-->
    
                        </li>
                        <!-- /Navbar Search-->
    
                        <!-- Navbar Login-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown dropdown position-static">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="./login.html">Log In</a></li>
                                </ul> 
                            </li>
                        </ul>
                        <!-- /Navbar Login-->
    
                        <!-- Navbar Cart Icon-->
                        <li class="ms-1 d-inline-block position-relative dropdown-cart">
                            <button class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body"
                                type="button">
                                Bag (2)
                            </button>
                            <div class="cart-dropdown dropdown-menu">
                            
                                <!-- Cart Header-->
                                <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-4">
                                    <h6 class="fw-bolder m-0">Cart Summary (2 items)</h6>
                                    <i class="ri-close-circle-line text-muted ri-lg cursor-pointer btn-close-cart"></i>
                                </div>
                                <!-- / Cart Header-->
                            
                                <!-- Cart Items-->
                                <div>
                            
                                    <!-- Cart Product-->
                                    <div class="row mx-0 py-4 g-0 border-bottom">
                                        <div class="col-2 position-relative">
                                            <picture class="d-block ">
                                                <img class="img-fluid" src="./assets/images/products/product-cart-1.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                                            </picture>
                                        </div>
                                        <div class="col-9 offset-1">
                                            <div>
                                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                    Nike Air VaporMax 2021
                                                    <i class="ri-close-line ms-3"></i>
                                                </h6>
                                                <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: 9 / Qty: 1</span>
                                            </div>
                                            <p class="fw-bolder text-end text-muted m-0">$85.00</p>
                                        </div>
                                    </div>
                                    <!-- Cart Product-->
                                    <div class="row mx-0 py-4 g-0 border-bottom">
                                        <div class="col-2 position-relative">
                                            <picture class="d-block ">
                                                <img class="img-fluid" src="./assets/images/products/product-cart-2.jpg" alt="HTML Bootstrap Template by Pixel Rocket">
                                            </picture>
                                        </div>
                                        <div class="col-9 offset-1">
                                            <div>
                                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                    Nike ZoomX Vaporfly
                                                    <i class="ri-close-line ms-3"></i>
                                                </h6>
                                                <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: 11 / Qty: 1</span>
                                            </div>
                                            <p class="fw-bolder text-end text-muted m-0">$125.00</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cart Items-->
                            
                                <!-- Cart Summary-->
                                <div>
                                    <div class="pt-3">
                                        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-4 mb-md-2">
                                            <div>
                                                <p class="m-0 fw-bold fs-5">Grand Total</p>
                                                <span class="text-muted small">Inc $45.89 sales tax</span>
                                            </div>
                                            <p class="m-0 fs-5 fw-bold">$422.99</p>
                                        </div>
                                    </div>
                                    <a href="./cart.html" class="btn btn-outline-dark w-100 text-center mt-4" role="button">View Cart</a>
                                    <a href="./checkout.html" class="btn btn-dark w-100 text-center mt-2" role="button">Proceed To Checkout</a>
                                </div>
                                <!-- / Cart Summary-->
                              </div>
                            
    
                        </li>
                        <!-- /Navbar Cart Icon-->
    
                    </ul>
                    <!-- Navbar Icons-->                
    
                    <!-- Main Navigation-->
                    <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                        id="navbarNavDropdown">
    
                        <!-- Menu-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown dropdown position-static">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Eid 2023 Collection
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./category.html">Kaftan</a></li>
                                <li><a class="dropdown-item" href="./category.html">Kurung</a></li>
                                <li><a class="dropdown-item" href="./category.html">Abaya</a></li>
                              </ul>  
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Women
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="./category.html">Tops</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Bottoms</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Outerwear</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Dresses</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Sets</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Hijab
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./category.html">Bawal</a></li>
                                    <li><a class="dropdown-item" href="./category.html">Shawl</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Sale
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./category.html">50% Off</a></li>
                                    <li><a class="dropdown-item" href="./category.html">25% Off</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Pages
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="./index.html">Homepage</a></li>
                                  <li><a class="dropdown-item" href="./category.html">Category</a></li>
                                  <li><a class="dropdown-item" href="./product.html">Product</a></li>
                                  <li><a class="dropdown-item" href="./cart.html">Cart</a></li>
                                  <li><a class="dropdown-item" href="./checkout.html">Checkout</a></li>
                                  <li><a class="dropdown-item" href="./login.html">Login</a></li>
                                  <li><a class="dropdown-item" href="./register.html">Register</a></li>
                                  <li><a class="dropdown-item" href="./forgotten-password.html">Forgotten Password</a></li>
                                </ul>
                              </li>
                          </ul>                    <!-- / Menu-->
    
                    </div>
                    <!-- / Main Navigation-->
    
                </div>
            </div>
        </div>
    </nav>
    <!-- / Navbar-->    <!-- / Navbar-->

<!-- Main Section-->
<section class="mt-0 overflow-hidden">
    <!-- Page Content Goes Here -->
    <div class="bg-dark py-6">
        <div class="container-fluid">
            <nav class="m-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item breadcrumb-light"><a href="orderHistory.php">View Order History</a></li>
                    <li class="breadcrumb-item breadcrumb-light"><a href="orderDetails.php">View Order Details</a></li>
                    <li class="breadcrumb-item breadcrumb-light active" aria-current="page"><a href="viewOrderStatus.php">View Order Status</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
    // Connect to database
    include 'db.php';

    try {
        // Initialize an empty array for orders
        $orders = [];

        // Retrieve order history
        $sql_orders = "SELECT order_id, total_amount, item_count FROM orders"; 
        $stmt_orders = $conn->prepare($sql_orders);
        $stmt_orders->execute();
        $orders = $stmt_orders->get_result()->fetch_all(MYSQLI_ASSOC);

    } catch (Exception $e) {
        echo "Error retrieving order history: " . $e->getMessage();
    }
    ?>

    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            color: #000;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #000;
        }
        th {
            background-color: #000;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        tr:hover {
            background-color: #ccc;
        }
        a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .view-status-btn {
            background-color: #333;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 25px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .view-status-btn:hover {
            background-color: #555;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total Amount (RM)</th>
                <th>Number of Items</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td>
                        <a href="orderDetails.php?order_id=<?php echo $order['order_id']; ?>">
                            <?php echo $order['order_id']; ?>
                        </a>
                    </td>
                    <td><?php echo $order['total_amount']; ?></td>
                    <td><?php echo $order['item_count']; ?></td>
                    <td>
                        <a href="orderStatus.php?order_id=<?php echo $order['order_id']; ?>" class="view-status-btn">View Status</a>
                    </td>             
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


    <!-- / Main Section-->
    <!--====== Main Footer ======-->
    <footer class="border-top py-5 mt-4" style="background-color: black; color: white; font-family: 'Roboto', sans-serif;">
      <div class="outer-footer">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-6">
                      <div class="outer-footer__content u-s-m-b-40">
                          <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Contact Us</span>
                          <div class="outer-footer__text-wrap"><i class="fas fa-home" style="color: white;"></i>
                              <span style="color: white; font-weight: 400;">Solaris Dutamas, 50480 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur Malaysia</span></div>
                          <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume" style="color: white;"></i>
                              <span style="color: white; font-weight: 400;">(+60)1111722636</span></div>
                          <div class="outer-footer__text-wrap"><i class="far fa-envelope" style="color: white;"></i>
                              <span style="color: white; font-weight: 400;">@meqa.my</span></div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="row">
                          <div class="col-lg-6 col-md-6">
                              <div class="outer-footer__content u-s-m-b-40">
                                  <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Pages</span>
                                  <div class="outer-footer__list-wrap">
                                      <ul style="list-style: none; padding-left: 0;">
                                          <li><a href="forgotten-password.html" style="text-decoration: none; color: white; font-weight: 400;">Reset password</a></li>
                                          <li><a href="change-password-2.html" style="text-decoration: none; color: white; font-weight: 400;">Change password</a></li>
                                          <li><a href="reset_password.php" style="text-decoration: none; color: white; font-weight: 400;">Reeeeset password</a></li>
                                          <li><a href="dash-payment-option.html" style="text-decoration: none; color: white; font-weight: 400;">Finance</a></li>
                                          <li><a href="shop-side-version-2.html" style="text-decoration: none; color: white; font-weight: 400;">Shop</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                              <div class="outer-footer__content u-s-m-b-40">
                                  <div class="outer-footer__list-wrap">
                                      <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Our Company</span>
                                      <ul style="list-style: none; padding-left: 0;">
                                          <li><a href="about.html" style="text-decoration: none; color: white; font-weight: 400;">About us</a></li>
                                          <li><a href="contact.html" style="text-decoration: none; color: white; font-weight: 400;">Contact Us</a></li>
                                          <li><a href="index.html" style="text-decoration: none; color: white; font-weight: 400;">Sitemap</a></li>
                                          <li><a href="orderHistory.php" style="text-decoration: none; color: white; font-weight: 400;">Delivery</a></li>
                                          <li><a href="shop-side-version-2.html" style="text-decoration: none; color: white; font-weight: 400;">Store</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
    <div class="outer-footer__content">
        <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Get In Touch</span>
        <form class="contact-f" method="post" action="feedbackForm.php">
            <div class="row">
                <div class="col-lg-6 col-md-6 u-h-100">
                    <div class="u-s-m-b-30">
                        <label for="c-name"></label>
                        <input name="name" class="input-text input-text--border-radius input-text--primary-style" 
                            type="text" id="c-name" placeholder="Name (Required)" required 
                            style="width: 100%; padding: 10px; margin-bottom: 1px; border-radius: 5px; border: 1px solid #ccc; background-color: #333; color: white; font-size: 14px; font-family: 'Roboto', sans-serif; font-weight: 400;">
                    </div>
                    <div class="u-s-m-b-30">
                        <label for="c-email"></label>
                        <input name="email" class="input-text input-text--border-radius input-text--primary-style" 
                            type="text" id="c-email" placeholder="Email (Required)" required 
                            style="width: 100%; padding: 10px; margin-bottom: 1px; border-radius: 5px; border: 1px solid #ccc; background-color: #333; color: white; font-size: 14px; font-family: 'Roboto', sans-serif; font-weight: 400;">
                    </div>
                    <div class="u-s-m-b-30">
                        <label for="c-subject"></label>
                        <input name="subject" class="input-text input-text--border-radius input-text--primary-style" 
                            type="text" id="c-subject" placeholder="Subject (Required)" required 
                            style="width: 100%; padding: 10px; margin-bottom: 1px; border-radius: 5px; border: 1px solid #ccc; background-color: #333; color: white; font-size: 14px; font-family: 'Roboto', sans-serif; font-weight: 400;">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 u-h-100">
                    <div class="u-s-m-b-30">
                        <label for="c-message"></label>
                        <textarea name="message" class="text-area text-area--border-radius text-area--primary-style" 
                            id="c-message" placeholder="Compose a Message (Required)" required 
                            style="width: 100%; padding: 10px; height: 165px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; background-color: #333; color: white; font-size: 14px; font-family: 'Roboto', sans-serif; font-weight: 400;"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn--e-brand-b-2" type="submit" 
                        style="background-color: #ffffff; color: black; padding: 10px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer; transition: background-color 0.3s ease; font-family: 'Roboto', sans-serif; font-weight: 700;">
                        Send Message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

              </div>
          </div>
      </div>
      <div class="lower-footer" style="background-color: black; font-family: 'Roboto', sans-serif;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="lower-footer__content">
                          <div class="lower-footer__copyright">
                              <span style="color: white; font-weight: 400;">Copyright © 2018</span>
                              <a href="index.html" style="color: white; font-weight: 700;">Reshop</a>
                              <span style="color: white; font-weight: 400;">All Right Reserved</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!--====== End - Main App ======-->
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>