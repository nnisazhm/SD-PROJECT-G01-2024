<?php
session_start();
require 'db_connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href = 'forgotten-password.html';</script>";
        exit();
    }

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique reset token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database with an expiration time (e.g., 1 hour)
        $expires = date("U") + 3600; // 1 hour from now
        $stmt->close();
        $stmt = $conn->prepare("UPDATE users SET verification_token = ?, verification_token_expires = ? WHERE email = ?");
        $stmt->bind_param("sis", $token, $expires, $email);
        
        if ($stmt->execute()) {
            // Send email with reset link
            $to = $email;
            $subject = "Password Reset Request";
            $message = "Click the link below to reset your password:\n";
            $message .= "http://yourdomain.com/reset-password.php?token=" . $token;
            $headers = "From: arianaarissa@graduate.utm.my\r\n";

            // Assuming msmtp is configured correctly
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Password reset link sent to your email.'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Failed to send email.'); window.location.href = 'forgotten-password.html';</script>";
            }
        } else {
            echo "<script>alert('Failed to store reset token.'); window.location.href = 'forgotten-password.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found.'); window.location.href = 'forgotten-password.html';</script>";
    }
    $stmt->close();
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
  <title>Forgot your password?</title>

</head>
<body class=" bg-light">

    <!-- Main Section-->
    <section
        class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->

        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            <!-- Logo-->
            <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0" href="./index.html">
                <div class="d-flex align-items-center">
                    <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26"><path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z" fill="currentColor" fill-rule="evenodd"/></svg>
                </div>
            </a>
            <!-- / Logo-->
            <div class="shadow-xl p-4 p-lg-5 bg-white">
                <h1 class="text-center fs-2 mb-5 fw-bold">Forgot your password?</h1>
                <p class="text-muted">Please enter your email below and we will send you a secure link to reset your password.</p>
                <form action="forgotten-password.php" method="POST">
                    <div class="form-group">
                      <label for="forgot-password" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="forgot-password" placeholder="name@email.com" required>
                    </div>
                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Send Reset Link</button>
                </form>
            </div>

        </div>
        <!-- / Login Form-->

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