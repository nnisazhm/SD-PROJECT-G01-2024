<?php
require_once 'db_connection.php';

// Check if product_id is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Query to fetch product details by product_id
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if product exists
    if ($result->num_rows > 0) {
        // Fetch product data
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No product ID provided.";
    exit();
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
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Edit Product</title>

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
                      <li><a href="form_advanced.html">Manage Orders</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-usd"></i> Sales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="productForm.html">Sales Dashboard</a></li>
                      <li><a href="form_advanced.html">Manage Sales</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Staff <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="productForm.html">Add Staff</a></li>
                      <li><a href="form_advanced.html">Manage Staff</a></li>
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
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
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
        <div class="col-md-6 ">
            <div class="x_panel" style="width: 200%;">
            <div class="x_title">
                <h2>Edit Product</h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <br />
                    <form action="updateProduct.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Product Name </label>
                        <div class="col-md-9 col-sm-9 ">
                        <input type="text" id="product_name" name="product_name" class="form-control" value="<?php echo $product['product_name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Product Description</label>
                        <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control" id="product_description" name="product_description" rows="3" required><?php echo $product['product_description']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Product Price </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="number" id="product_price" name="product_price" class="form-control" value="<?php echo $product['product_price']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Product Category </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="product_category" required>
                                <optgroup label="Eid 2024 Collection">
                                    <option value="KFTN" <?php if ($product['product_category'] == 'KFTN') echo 'selected'; ?>>Kaftan</option>
                                    <option value="KRG" <?php if ($product['product_category'] == 'KRG') echo 'selected'; ?>>Kurung</option>
                                    <option value="ABY" <?php if ($product['product_category'] == 'ABY') echo 'selected'; ?>>Abaya</option>
                                </optgroup>
                                <optgroup label="Women">
                                    <option value="TOP" <?php if ($product['product_category'] == 'TOP') echo 'selected'; ?>>Tops</option>
                                    <option value="BTM" <?php if ($product['product_category'] == 'BTM') echo 'selected'; ?>>Bottoms</option>
                                    <option value="OTW" <?php if ($product['product_category'] == 'OTW') echo 'selected'; ?>>Outerwear</option>
                                    <option value="DRS" <?php if ($product['product_category'] == 'DRS') echo 'selected'; ?>>Dresses</option>
                                    <option value="SET" <?php if ($product['product_category'] == 'SET') echo 'selected'; ?>>Sets</option>
                                </optgroup>
                                <optgroup label="Hijab">
                                    <option value="BWL" <?php if ($product['product_category'] == 'BWL') echo 'selected'; ?>>Bawal</option>
                                    <option value="SWL" <?php if ($product['product_category'] == 'SWL') echo 'selected'; ?>>Shawl</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                  <!--sampai sini-->

                  <div class="form-group row">
                    <label class="col-md-3 col-sm-3  control-label">Product Size </label>
                    <div class="col-md-9 col-sm-9 ">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_size[]" name="product_size[]" value="XS"> XS
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_size[]" name="product_size[]" value="S"> S
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_size[]" name="product_size[]" value="M"> M
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_size[]" name="product_size[]" value="L"> L
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_size[]" name="product_size[]" value="XL"> XL
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-sm-3  control-label">Product Color </label>
                    <div class="col-md-9 col-sm-9 ">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Black"> Black
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Gray"> Gray
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="White"> White
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Red"> Red
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Brown"> Brown
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Orange"> Orange
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Yellow"> Yellow
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Green"> Green
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Blue"> Blue
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Violet"> Violet
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="product_color[]" name="product_color[]" value="Pink"> Pink
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Product SKU </label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" id="product_sku" name="product_sku" class="form-control" value="<?php echo $product['product_sku']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Product Quantity </label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" id="product_quantity" name="product_quantity" class="form-control" value="<?php echo $product['product_quantity']; ?>" required>
                    </div>
                  </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Product Status </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" name="product_status">
                                <option value="Active" <?php if ($product['product_status'] == 'Active') echo 'selected'; ?>>Active</option>
                                <option value="Inactive" <?php if ($product['product_status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                <option value="Out Of Stock" <?php if ($product['product_status'] == 'Out Of Stock') echo 'selected'; ?>>Out Of Stock</option>
                            </select>
                        </div>
                    </div>

                  
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Upload Product Media</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <form action="updateProduct.php" method="POST" enctype="multipart/form-data">
                          <input type="file" name="product_images[]" multiple><br><br>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>-->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>