<?php
function updateProfile()
{
    // Database connection
    $con = mysqli_connect("localhost", "webs412024", "webs412024", "meqa");
    if (!$con) {
        // Connection failed
        echo "Connection failed: " . mysqli_connect_error();
        return false;
    }
    
    // Collect form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobileNumber = mysqli_real_escape_string($con, $_POST['mobileNumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    
    // Construct update SQL statement
    $sql = "UPDATE customer SET name=?, email=?, mobileNumber=?, address=?, birthday=?, gender=? WHERE id=?"; // Make sure you have an 'id' field to identify which record to update
    
    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        // Statement preparation failed
        echo "Error: " . mysqli_error($con);
        return false;
    }
    
    // Bind parameters
    $id = 1; // Replace with the actual ID of the customer whose profile is being updated
    mysqli_stmt_bind_param($stmt, 'ssssssi', $name, $email, $mobileNumber, $address, $birthday, $gender, $id);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Record updated successfully";
    } else {
        // Execution failed
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Close the connection
    mysqli_close($con);
}

// Call the function
updateProfile();
?>
