<?php
// Include database connection file
include 'db_connection.php';

// Check if the staff ID is provided in the URL
if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    // SQL query to delete the staff member based on the ID
    $query = "DELETE FROM staff_profile WHERE staff_id = '$staff_id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // If successful, redirect back to the staff list page with a success message
        header("Location: viewStaffDashboard.php?message=Staff deleted successfully");
    } else {
        // If an error occurred, redirect back with an error message
        header("Location: viewStaffDashboard.php?message=Error deleting staff");
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no ID is provided, redirect back with an error message
    header("Location: viewStaffDashboard.php?message=Invalid staff ID");
}
?>
