<?php
// Include DB connection file
include('db_connection.php');

// Fetch products from the database
$sql = "SELECT * FROM product WHERE category = 'Outerwear' AND status = 'available'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Fetch product images from the database
function getProductImages($productId, $conn) {
    $stmt = $conn->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row;
    }
    return $images;
}
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
  <title>Jennie Denim Hoodie | MEQA.MY</title>
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

    <!-- Main Section-->
    <section class="mt-0">
        <div class="container-fluid position-relative z-index-20">
            <h1 class="fw-bold display-6 mb-4 text-white">Sets</h1>
            <p class="text-white mb-0 fs-5">Save the hassle of mix & match and grab our matching sets today!</p>
        </div>

        <!-- Category Toolbar-->
        <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sets</li>
                    </ol>
                </nav>
                <h1 class="fw-bold fs-3 mb-2">Sets (<?php echo mysqli_num_rows($result); ?>)</h1>
            </div>
        </div>

        <!-- Products-->
        <div class="row g-4">
            <?php while ($product = mysqli_fetch_assoc($result)): ?>
                <?php
                    // Fetch product images
                    $images = getProductImages($product['id'], $conn);
                    $primaryImage = isset($images[0]) ? $images[0]['image_url'] : 'default.jpg'; // Default image
                ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-img">
                            <?php if ($product['discount_price']): ?>
                                <div class="card-badges">
                                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span> Sale</span>
                                </div>
                            <?php endif; ?>
                            <picture>
                                <img class="w-100 img-fluid" src="./assets/images/products/<?php echo $primaryImage; ?>" alt="<?php echo $product['name']; ?>">
                            </picture>
                        </div>
                        <div class="card-body">
                            <a href="./product-sets-<?php echo strtolower(str_replace(' ', '-', $product['name'])); ?>.php"><?php echo $product['name']; ?></a>
                            <small class="text-muted"><?php echo $product['colors']; ?>, <?php echo $product['sizes']; ?></small>
                            <p>
                                <?php if ($product['discount_price']): ?>
                                    <s class="text-muted">RM<?php echo $product['price']; ?></s>
                                    <span class="text-danger">RM<?php echo $product['discount_price']; ?></span>
                                <?php else: ?>
                                    RM<?php echo $product['price']; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!-- / Main Section-->



    <!-- Footer -->
    <footer class="border-top py-5 mt-4  ">
      <div class="container-fluid">
          <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row">
              <div>
                  <ul class="list-unstyled">
                      <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                              href="#"><i class="ri-instagram-fill"></i></a></li>
                      <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                              href="#"><i class="ri-facebook-fill"></i></a></li>
                      <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                              href="#"><i class="ri-twitter-fill"></i></a></li>
                      <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                              href="#"><i class="ri-snapchat-fill"></i></a></li>
                  </ul>
              </div>
              <div class="d-flex align-items-center justify-content-end flex-column flex-lg-row">
                  <p class="small m-0 text-center text-lg-start">&copy; 2021 OldSkool All Rights Reserved. Template by <a
                          href="https://www.pixelrocket.store">Pixel Rocket</a></p>
                  <ul class="list-unstyled mb-0 ms-lg-4 mt-3 mt-lg-0 d-flex justify-content-end align-items-center">
                      <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                          <i class="pi pi-sm pi-paypal"></i></li>
                      <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                          <i class="pi pi-sm pi-mastercard"></i></li>
                      <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                          <i class="pi pi-sm pi-american-express"></i></li>
                      <li class="bg-light p-2 d-flex align-items-center justify-content-center"><i
                              class="pi pi-sm pi-visa"></i>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>    
  <!-- / Footer-->  

  <!-- Theme JS -->
  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>
  
  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>

<?php
// Close the connection
mysqli_close($conn);
?>