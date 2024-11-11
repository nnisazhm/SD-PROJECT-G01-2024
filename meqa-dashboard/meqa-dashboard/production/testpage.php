<?php
    session_start(); // Start session to access session variables
    // Check if there's a message to display after deletion
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message']; // Get the message
        unset($_SESSION['message']); // Clear the message after displaying
    } else {
        $message = ''; // No message to show
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

    <title>Add Product</title>

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

  <?php include 'fixed_sidebar.html'; ?>
        
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Manage Products</h3>
                    </div>
                </div>
            </div>
        
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="width: 100%;">
                    <div class="x_title">
                        <h2>Product List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product SKU</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Product Status</th>
                                                <th>Media</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Database connection
                                            require_once 'db_connection.php'; // Your database connection
        
                                            // Fetch products and images from the database
                                            $sql = "SELECT p.product_id, p.product_sku, p.product_name, p.product_price, p.product_category, p.product_status, pi.image_path 
                                                    FROM products p 
                                                    LEFT JOIN product_images pi ON p.product_id = pi.product_id"; // Adjust table and field names as necessary
        
                                            $result = $conn->query($sql);
        
                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                        <td>{$row['product_sku']}</td>
                                                        <td>{$row['product_name']}</td>
                                                        <td>{$row['product_price']}</td>
                                                        <td>{$row['product_category']}</td>
                                                        <td>{$row['product_status']}</td>
                                                        <td><img src='{$row['image_path']}' style='width:50px;height:50px;'></td>
                                                        <td>
                                                        <a href='viewProduct.php?id={$row['product_id']}' class='btn btn-info'>View</a>
                                                        <a href='editProductForm.php?product_id={$row['product_id']}' class='btn btn-warning'>Edit</a>
                                                        <button class='btn btn-danger' onclick='deleteProduct({$row['product_id']})'>Delete</button>
                                                        </td>
                                                    </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No products found</td></tr>";
                                            }
        
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Confirmation Modal (Bootstrap Modal) -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo $message; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
            // Delete product confirmation
            function deleteProduct(productId) {
                if (confirm("Are you sure you want to delete this product?")) {
                    window.location.href = `deleteProduct.php?id=${productId}`; // Redirect to delete script
                }
            }
        
            // Show the confirmation modal if there's a message
            var message = "<?php echo $message; ?>";
            if (message) {
                $('#confirmationModal').modal('show');
            }
        </script>
        
        <!-- Include necessary Bootstrap scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- /page content -->

        <?php include 'footer.html'; ?>