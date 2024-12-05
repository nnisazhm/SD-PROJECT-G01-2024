<?php
// Include the database connection
include('db_connection.php');

// Check if the status update form was submitted
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Validate order_status value
    $allowed_statuses = ['Pending', 'Processing', 'Completed'];
    if (!in_array($order_status, $allowed_statuses)) {
        echo "<script>alert('Invalid order status.');</script>";
    } else {
        // Update the order status in the database
        $update_query = "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id'";

        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Order status updated successfully.');</script>";
        } else {
            // Log the error
            $error = mysqli_error($conn);
            echo "<script>alert('Failed to update order status. Error: $error');</script>";
        }
    }
}

// Fetch orders from the database
$query = "SELECT * FROM orders"; // Adjust this query based on your actual table structure
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Meqa Dashboard</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>Meqa Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <!--<div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>-->
              <div class="profile_info">
                <h1>Welcome</h1>
                <!--<h2>John Doe</h2>-->
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                      <li><a href="staffDashboard.html">Staff Dashboard</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-cube"></i> Product <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="productForm.html">Add Product</a></li>
                      <li><a href="productList.php">Manage Product</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-truck"></i> Order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					            <li><a href="ViewOrder.php">Order Details</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-usd"></i> Sales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="order.php">Manage Sales</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Staff <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="addStaff.php">Add Staff</a></li>
                      <li><a href="viewStaffDashboard.php">Manage Staff</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Customer <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ViewCust.php">Manage Customer</a></li>
					  <li><a href="viewFeedback.php">Manage Feedback</a></li>
					
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> MEQA.MY E-Commerce </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer button -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  Account
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="profile.php"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="table-container">
                <h3>Customer Orders</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($order = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $order['order_id'] ?></td>
                                <td><?= htmlspecialchars($order['customer_name']) ?></td>
                                <td><?= htmlspecialchars($order['email']) ?></td>
                                <td><?= htmlspecialchars($order['product_name']) ?></td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['total_amount'] ?></td>
                                <td><?= $order['order_date'] ?></td>
                                <td><?= htmlspecialchars($order['order_status']) ?></td>
                                <td>
                                    <!-- Update Status Form -->
                                    <form action="ViewOrder.php" method="POST" class="d-inline">
                                        <select name="order_status" class="form-select form-select-sm" style="width: 120px;">
                                            <option value="Pending" <?= ($order['order_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                                            <option value="Processing" <?= ($order['order_status'] == 'Processing') ? 'selected' : '' ?>>Processing</option>
                                            <option value="Completed" <?= ($order['order_status'] == 'Completed') ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                        <button type="submit" name="update_status" class="btn btn-sm btn-success mt-1"><i class="fa fa-repeat"></i> Update</button>
                                    </form>

                                    <!-- View button to trigger modal -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#orderModal<?= $order['order_id'] ?>">
                                        <i class="fa fa-eye"></i> View
                                    </button>

                                    <form action="cancel_order.php" method="POST" class="d-inline">
                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-times"></i> Cancel</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for viewing order details -->
                            <div class="modal fade" id="orderModal<?= $order['order_id'] ?>" tabindex="-1" aria-labelledby="orderModalLabel<?= $order['order_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderModalLabel<?= $order['order_id'] ?>">Order Details - Order #<?= $order['order_id'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Order ID:</strong> <?= $order['order_id'] ?></p>
                                            <p><strong>Customer Name:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
                                            <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
                                            <p><strong>Product Name:</strong> <?= htmlspecialchars($order['product_name']) ?></p>
                                            <p><strong>Order Status:</strong> <?= htmlspecialchars($order['order_status']) ?></p>
                                            <p><strong>Order Date:</strong> <?= $order['order_date'] ?></p>
                                            <p><strong>Total Amount:</strong> <?= $order['total_amount'] ?></p>
                                            <p><strong>Item Count:</strong> <?= $order['item_count'] ?></p>
                                            <p><strong>Quantity:</strong> <?= $order['quantity'] ?></p>
                                            <p><strong>Price:</strong> <?= $order['price'] ?></p>
                                            <p><strong>Subtotal:</strong> <?= $order['subtotal'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>