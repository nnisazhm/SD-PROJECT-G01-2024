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
  <title>Order Status</title>

</head>
<body class="">

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
    
                        <!-- Navbar Login-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown dropdown position-static">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Account
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="./login.html">Log In</a></li>
                                </ul> 
                            </li>
                        </ul>
                        <!-- /Navbar Login-->

                        <!-- Navbar Cart Icons-->
                        <li class="ms-1 d-inline-block position-relative dropdown-cart">
                            <a button class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body" type="button" href="cart.php">
                                Bag
                            </a>
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
                                Eid 2024 Collection
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./category-eid.html">Kaftan</a></li>
                                <li><a class="dropdown-item" href="./category-eid.html">Kurung</a></li>
                                <li><a class="dropdown-item" href="./category-eid.html">Abaya</a></li>
                              </ul>  
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Women
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="./category-tops.html">Tops</a></li>
                                  <li><a class="dropdown-item" href="./category-bottoms.html">Bottoms</a></li>
                                  <li><a class="dropdown-item" href="./category-outerwear.html">Outerwear</a></li>
                                  <li><a class="dropdown-item" href="./category-dresses.html">Dresses</a></li>
                                  <li><a class="dropdown-item" href="./category-sets.html">Sets</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Hijab
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./category-hijab.html">Bawal</a></li>
                                    <li><a class="dropdown-item" href="./category-hijab.html">Shawl</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Sale
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./category-sale.html">August Sale</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Our Company
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="./about.html">About Us</a></li>
                                  <li><a class="dropdown-item" href="./contact.html">Contact Us</a></li>
                                </ul>
                              </li>
                          </ul>                    
                          <!-- / Menu-->
    
                    </div>
                    <!-- / Main Navigation-->
    
                </div>
            </div>
        </div>
    </nav>
    <!-- / Navbar-->

<?php
include('db.php'); // Menyertakan koneksi database

// Mengambil order_id dari permintaan GET
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

if ($order_id) {
    // Mengambil status pesanan dari database
    $query = "SELECT order_status FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->bind_result($order_status);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No order ID provided.";
    $order_status = null;
}
?>

<!-- Main Section -->
<section class="mt-0 overflow-hidden">
    <!-- Dark Background for Breadcrumb -->
    <div class="bg-dark py-6">
        <div class="container-fluid">
            <nav class="m-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item breadcrumb-light"><a href="orderHistory.php">View Order History</a></li>
                    <li class="breadcrumb-item breadcrumb-light"><a href="orderDetails.php">View Order Details</a></li>
                    <li class="breadcrumb-item breadcrumb-light active" aria-current="page">View Order Status</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="order-container">
        <!-- Progress Bar -->
        <div class="order-progress-bar">
            <div class="order-progress" style="width: <?php 
                // Mengatur lebar berdasarkan status
                switch ($order_status) {
                    case 'Pending':
                        echo '25%';
                        break;
                    case 'Processing':
                        echo '50%';
                        break;
                    case 'Out for Delivery':
                        echo '75%';
                        break;
                    case 'Order Received':
                        echo '100%';
                        break;
                    default:
                        echo '0%';
                        break;
                }
            ?>">
                <?php
                // Menampilkan teks status berdasarkan nilai
                echo $order_status ? $order_status : "No Status";
                ?>
            </div>
        </div>

        <!-- Status Steps -->
        <div class="status-progress">
            <div class="status-step <?php echo ($order_status == 'Pending') ? 'status-active' : ''; ?>">
                <i class="fas fa-check-circle"></i>
                <p>Order Placed</p>
            </div>
            <div class="status-step <?php echo ($order_status == 'Processing') ? 'status-active' : ''; ?>">
                <i class="fas fa-truck"></i>
                <p>Shipping</p>
            </div>
            <div class="status-step <?php echo ($order_status == 'Out for Delivery') ? 'status-active' : ''; ?>">
                <i class="fas fa-box"></i>
                <p>Out for Delivery</p>
            </div>
            <div class="status-step <?php echo ($order_status == 'Order Received') ? 'status-active' : ''; ?>">
                <i class="fas fa-home"></i>
                <p>Order Received</p>
            </div>
        </div>

        <!-- Tombol Kembali ke Riwayat Pesanan -->
        <div>
            <a href="orderHistory.php" class="order-btn">Back to Order History</a>
        </div>
    </div>
</section>

<!-- CSS untuk Order Status Page -->
<style>
    .bg-dark {
        background-color: #343a40;
        color: #ffffff;
    }
    .breadcrumb-item a {
        color: #ffffff;
        text-decoration: none;
    }
    .breadcrumb-item.active {
        color: #adb5bd;
    }

    .order-container {
        max-width: 600px;
        margin: 20px auto;
        text-align: center;
    }

    .order-progress-bar {
        background-color: #f1f1f1;
        border-radius: 20px;
        overflow: hidden;
        height: 20px;
        margin-bottom: 20px;
    }

    .order-progress {
        background-color: #4CAF50; /* Green color for progress */
        height: 100%;
        width: 0;
        transition: width 0.5s;
        color: #fff;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
    }

    .status-progress {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .status-step {
        text-align: center;
        color: #aaa;
    }

    .status-step p {
        font-size: 14px;
        margin-top: 5px;
    }

    .status-step i {
        font-size: 24px;
        color: #ddd;
        margin-bottom: 5px;
    }

    .status-active {
        color: #4CAF50;
    }

    .status-active i {
        color: #4CAF50;
    }

    .order-btn {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        background-color: #333;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        transition: background-color 0.3s;
    }

    .order-btn:hover {
        background-color: #555;
    }
</style>



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
                                    <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Information</span>
                                    <div class="outer-footer__list-wrap">
                                        <ul style="list-style: none; padding-left: 0;">
                                            <li><a href="cart.php" style="text-decoration: none; color: white; font-weight: 400;">Cart</a></li>
                                            <li><a href="profile.php" style="text-decoration: none; color: white; font-weight: 400;">Account</a></li>
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
    </footer>
    <!--====== End - Main App ======-->
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>