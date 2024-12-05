<?php
// Start session to get user details
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If user is not logged in, redirect to login page
    header('Location: login.html');
    exit;
}

// Include database connection file
$servername = "localhost";
$username = "root";  // Your database username
$password = "root";      // Your database password
$dbname = "meqa.my";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Query to get the user's information from the database
$query = "SELECT firstname, lastname, email, phone, birthday, gender FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $email, $phone, $birthday, $gender);
$stmt->fetch();
$stmt->close();

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
  <title>Profile | MEQA.MY</title>

  <script>
    function loadProfile() {
        const name = localStorage.getItem('name') || '';
        const email = localStorage.getItem('email') || '';
        const birthday = localStorage.getItem('birthday') || '';
        const address = localStorage.getItem('address') || '';
        const phone = localStorage.getItem('phone') || '';
        const gender = localStorage.getItem('gender') || '';

        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('birthday').value = birthday;
        document.getElementById('address').value = address;
        document.getElementById('phone').value = phone;
        document.getElementById('gender').value = gender;
    }

    function saveProfile(event) {
        event.preventDefault(); 

        localStorage.setItem('name', document.getElementById('name').value);
        localStorage.setItem('email', document.getElementById('email').value);
        localStorage.setItem('birthday', document.getElementById('birthday').value);
        localStorage.setItem('address', document.getElementById('address').value);
        localStorage.setItem('phone', document.getElementById('phone').value);
        localStorage.setItem('gender', document.getElementById('gender').value);

        alert('Profile updated successfully');
        window.location.href = 'editProfile.html'; 
    }

    window.onload = loadProfile;
    
    function handleSearch() {
    const query = document.getElementById('search-bar').value.trim();
    if (query) {
        // Redirect to search results page with query parameter
        window.location.href = `searchResults.html?q=${encodeURIComponent(query)}`;
    }
}

// Attach event listener to search bar
document.getElementById('search-bar').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        handleSearch();
    }
});
</script>

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
<section class="mt-0 overflow-hidden ">

    <!-- Page Content Goes Here -->

    <div class="content" style="display: flex; font-family: Arial, sans-serif; margin: 20px;">
        <!-- Sidebar -->
        <div class="sidebar" style="flex: 1; background-color: #f8f8f8; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 20px;">Hello, <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></h2>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 15px;"><a href="#" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-user" style="margin-right: 10px;"></i> Manage My Account</a></li>
                <li style="margin-bottom: 15px;"><a href="profile.php" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-id-badge" style="margin-right: 10px;"></i> My Profile</a></li>
                <li style="margin-bottom: 15px;"><a href="change-password-2.html" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-id-badge" style="margin-right: 10px;"></i> Change Password</a></li>
                <li style="margin-bottom: 15px;"><a href="#" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-address-book" style="margin-right: 10px;"></i> Address Book</a></li>
                <li style="margin-bottom: 15px;"><a href="#" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-truck" style="margin-right: 10px;"></i> Track Order</a></li>
                <li style="margin-bottom: 15px;"><a href="orderHistory.php" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-shopping-cart" style="margin-right: 10px;"></i> My Orders</a></li>
                <li style="margin-bottom: 15px;"><a href="#" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-credit-card" style="margin-right: 10px;"></i> My Payment Options</a></li>
                <li style="margin-bottom: 15px;"><a href="#" style="text-decoration: none; color: black; display: flex; align-items: center;"><i class="fas fa-undo" style="margin-right: 10px;"></i> Log Out</a></li>
            </ul>
        </div>

        <!-- View Profile -->
        <div class="view-profile" style="flex: 2; margin-left: 20px; padding: 20px; border-radius: 8px; background-color: white; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <h3 style="margin-bottom: 20px;">My Profile</h3>
            <p style="font-weight: bold; color: #666;">Look at all your info, you can customize your profile.</p>

            <p><strong>First Name:</strong> <?php echo htmlspecialchars($firstname); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lastname); ?></p>
            <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone ? $phone : 'Please enter your mobile'); ?></p>
            <p><strong>Birthday:</strong> <?php echo htmlspecialchars($birthday); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>

            <div class="form-actions" style="margin-top: 20px;">
                <a href="editProfile.html">
                    <button type="button" style="background-color: #000; color: #fff; border: 2px solid #ff6600; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Edit Profile</button>
                </a>
            </div>
        </div>

        <!-- Orders Summary -->
        <div class="orders-summary" style="flex: 1; margin-left: 20px;">
            <div class="summary-box" style="background-color: #f8f8f8; padding: 20px; text-align: center; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <div style="background-color: #ffd7d7; width: 50px; height: 50px; border-radius: 50%; margin: 0 auto;">
                    <i class="fas fa-shopping-cart" style="color: #ff6600; font-size: 24px; line-height: 50px;"></i>
                </div>
                <h4>Orders Placed</h4>
                <p style="font-size: 24px; font-weight: bold;">4</p>
            </div>
            <div class="summary-box" style="background-color: #f8f8f8; padding: 20px; text-align: center; border-radius: 8px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <div style="background-color: #d7ffd7; width: 50px; height: 50px; border-radius: 50%; margin: 0 auto;">
                    <i class="fas fa-times" style="color: #00cc00; font-size: 24px; line-height: 50px;"></i>
                </div>
                <h4>Cancel Orders</h4>
                <p style="font-size: 24px; font-weight: bold;">0</p>
            </div>
            <div class="summary-box" style="background-color: #f8f8f8; padding: 20px; text-align: center; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <div style="background-color: #d7f0ff; width: 50px; height: 50px; border-radius: 50%; margin: 0 auto;">
                    <i class="fas fa-heart" style="color: #6666ff; font-size: 24px; line-height: 50px;"></i>
                </div>
                <h4>Favorites</h4>
                <p style="font-size: 24px; font-weight: bold;">0</p>
            </div>
        </div>
    </div>

    <!-- /Page Content -->

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
                                  <span class="fw-bold mb-2" style="color: white; font-weight: 700;">Information</span>
                                  <div class="outer-footer__list-wrap">
                                      <ul style="list-style: none; padding-left: 0;">
                                          <li><a href="cart.html" style="text-decoration: none; color: white; font-weight: 400;">Cart</a></li>
                                          <li><a href="dashboard.html" style="text-decoration: none; color: white; font-weight: 400;">Account</a></li>
                                          <li><a href="shop-side-version-2.html" style="text-decoration: none; color: white; font-weight: 400;">Manufacturer</a></li>
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
                                          <li><a href="dash-my-order.html" style="text-decoration: none; color: white; font-weight: 400;">Delivery</a></li>
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