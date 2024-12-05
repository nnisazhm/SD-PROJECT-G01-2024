<?php
session_start();
include 'db_connection.php';

// Get the reset_token from the URL
if (isset($_GET['reset_token'])) {
    $reset_token = $_GET['reset_token'];
} else {
    // Redirect with error=1 if no reset token
    header('Location: login.html?error=1');
    exit;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate new passwords
    if ($new_password !== $confirm_password) {
        // Redirect with error=1 if passwords don't match
        header('Location: reset_password.html?reset_token=' . $reset_token . '&error=1');
        exit;
    }

    // Check if reset_token exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $reset_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Update the password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
        $update_stmt->bind_param("ss", $hashed_password, $reset_token);
        $update_stmt->execute();

        if ($update_stmt->affected_rows == 1) {
            // Success, redirect to login
            header('Location: login.html');
            exit;
        } else {
            // Redirect with error=1 if password update failed
            header('Location: reset_password.html?reset_token=' . $reset_token . '&error=2');
            exit;
        }
    } else {
        // Redirect with error=1 if invalid or expired reset token
        header('Location: login.html?error=3');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="reset_password.php?reset_token=<?php echo $_GET['reset_token']; ?>" method="POST">
              <h1>Reset Password</h1>
              <div>
                <input type="password" class="form-control" id="new_password"  name="new_password" placeholder="Enter new password" required="" />
              <div>
              <div>
                <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="Reconfirm new password" required="" />
              <div>
                <button type="submit" class="btn btn-default submit">Reset Password</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Meqa Dashboard</h1>
                  <p>©2022 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="gentelella-master\gentelella-master\production\reset_password.php" method="POST">
                <h1>Reset Password</h1>
                <div>
                <p>Password must be at least 8 characters long and include at least one uppercase letter, one number, and one special character.</p>
                  <input type="password" class="form-control" id="new_password"  name="new_password" placeholder="Enter new password" required="" />
                <div>
                <div>
                  <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="Reconfirm new password" required="" />
                <div>
                  <button type="submit" class="btn btn-default submit">Reset Password</button>
                </div>
  
                <div class="clearfix"></div>
  
                <div class="separator">
                  <div class="clearfix"></div>
                  <br />
  
                  <div>
                    <h1>Meqa Dashboard</h1>
                    <p>©2022 All Rights Reserved. Privacy and Terms</p>
                  </div>
                </div>
              </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
