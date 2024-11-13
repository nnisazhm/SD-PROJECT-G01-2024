<?php
// Include the database connection
include('db_connection.php');

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch product data from the database
$sql = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

// Check if product exists
if (!$product) {
    echo "<h1>Product not found</h1>";
    exit;
}

// Fetch product images (assumes 'product_images' field contains comma-separated list of image paths)
$product_images = explode(',', $product['product_images']);
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
  <title><?php echo $product['product_name']; ?> | MEQA.MY</title>
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
        
        <!-- Breadcrumbs-->
        <div class="bg-dark py-6">
            <div class="container-fluid">
                <nav class="m-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>
                      <li class="breadcrumb-item breadcrumb-light"><a href="category-outerwear.html"><?php echo $product['product_category']; ?></a></li>
                      <li class="breadcrumb-item  breadcrumb-light active" aria-current="page"><?php echo $product['product_name']; ?></li>
                    </ol>
                </nav>            
            </div>
        </div>
        <!-- / Breadcrumbs-->

        <div class="container-fluid mt-5">
            <!-- Product Top Section-->
            <div class="row g-9" data-sticky-container>

                <!-- Product Images-->
                <div class="col-12 col-md-6 col-xl-7">
                    <div class="row g-3" data-aos="fade-right">
                        <?php foreach ($product_images as $image): ?>
                        <div class="col-12">
                            <picture>
                                <img class="img-fluid" data-zoomable src="./assets/images/products/<?php echo $image; ?>">
                            </picture>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /Product Images-->
    
                <!-- Product Information-->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="sticky-top top-5">
                        <div class="pb-3" data-aos="fade-in">
                            <div class="d-flex align-items-center mb-3">
                                <p class="small fw-bolder text-uppercase tracking-wider text-muted m-0 me-4"><?php echo $product['product_category']; ?></p>
                            </div>
                            

                            <h1 class="mb-1 fs-2 fw-bold"><?php echo $product['product_name']; ?></h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fs-4 m-0">RM<?php echo $product['product_price']; ?></p>
                            </div>

                            <!-- Product Sizes-->
                            <div class="border-top mt-4 mb-3 product-option">
                                <small class="text-uppercase pt-4 d-block fw-bolder">
                                    <span class="text-muted">Product Sizes</span> : <span class="selected-option fw-bold"
                                        data-pixr-product-option="size">M</span>
                                </small>

                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                    <?php 
                                    // Loop through available sizes (assuming they are stored in 'sizes' column)
                                    $sizes = explode(',', $product['product_size']);
                                    foreach ($sizes as $size): ?>
                                        <div class="form-check-option form-check-rounded">
                                            <input 
                                                type="radio" 
                                                name="product-option-sizes" 
                                                value="<?php echo $size; ?>" 
                                                id="option-sizes-<?php echo $size; ?>"
                                            >
                                            <label for="option-sizes-<?php echo $size; ?>">
                                                <small><?php echo $size; ?></small>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Product Colors-->
                            <div class="mb-3">
                                <small class="text-uppercase pt-4 d-block fw-bolder text-muted">
                                    Product Colors :
                                </small>
                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                    <picture class="me-2">
                                        <img class="f-w-24 p-2 bg-light border-bottom border-dark border-2 cursor-pointer" src="./assets/images/products/<?php echo $product_images[0]; ?>">
                                    </picture>
                                </div>
                            </div>

                            <!-- Add To Cart Button -->
                            <form id="addToCartForm" class="contact-f" method="post" action="add_to_cart.php">
                                <!-- Hidden inputs for product details -->
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">

                                <!-- Size Selection -->
                                <input type="hidden" name="product_size" id="selected-size" value="">

                                <!-- Color Selection -->
                                <input type="hidden" name="product_color" id="selected-color" value="">

                                <!-- Button -->
                                <button class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow" type="submit">Add To Cart</button><br><br>
                            </form>

                            <script>
                                // JavaScript to capture selected size and color
                                document.querySelectorAll('input[name="product-option-sizes"]').forEach(function(sizeInput) {
                                    sizeInput.addEventListener('change', function() {
                                        document.getElementById('selected-size').value = sizeInput.value;
                                    });
                                });

                                // Assuming there's a color selection process for the product (add your color options here)
                                document.querySelectorAll('.product-color-option').forEach(function(colorInput) {
                                    colorInput.addEventListener('click', function() {
                                        document.getElementById('selected-color').value = colorInput.dataset.color;
                                    });
                                });

                                // Handle form submission with AJAX
                                document.getElementById('addToCartForm').addEventListener('submit', function(e) {
                                    e.preventDefault(); // Prevent form submission

                                    var form = new FormData(this);
                                    fetch('add_to_cart.php', {
                                        method: 'POST',
                                        body: form
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Show pop-up message
                                        alert(data.message);

                                        // Redirect back to product page
                                        if (data.status === 'success') {
                                            setTimeout(function() {
                                                window.location.href = 'product.php?id=<?php echo $product['product_id']; ?>';
                                            }, 1000);  // Delay the redirection for 1 second to let the alert message show
                                        }
                                    })
                                    .catch(error => {
                                        alert('Error adding product to cart');
                                    });
                                });
                            </script>


                            <!-- Product Details Accordion -->
                            <div class="accordion" id="accordionProduct">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Product Details
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                    <div class="accordion-body">
                                        <p class="m-0"><?php echo $product['product_description']; ?></p>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!-- / Product Accordion-->
                        </div>
                    </div>
                </div>
                <!-- / Product Information-->
            </div>
            <!-- / Product Top Section-->
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
    </footer>    <!-- / Footer-->  

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>
    
    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>