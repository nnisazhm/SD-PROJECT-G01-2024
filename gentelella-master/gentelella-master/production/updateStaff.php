<?php
// Connect to the database
include 'db_connection2.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $address = $_POST['address'];

    $query = "UPDATE staff_profile SET full_name='$full_name', email='$email', phone='$phone', position='$position', address='$address' WHERE staff_id='$staff_id'";

    if (mysqli_query($conn, $query)) {
        $message = "<div class='alert alert-success' role='alert'>
                    Staff updated successfully. <a href='viewStaffDashboard.php' class='alert-link'>Go back to Staff List</a>
                  </div>";
    } else {
        $message = "<div class='alert alert-danger' role='alert'>
                    Error updating staff: " . mysqli_error($conn) . "
                  </div>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Staff</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .alert {
            padding: 15px;
            margin: 20px 0;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-link {
            color: #0c5460;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Output the message if it exists
        if (isset($message)) {
            echo $message;
        }
        ?>
    </div>
</body>
</html>
