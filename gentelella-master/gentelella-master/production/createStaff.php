<?php
// createStaff.php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $jobTitle = $_POST['jobTitle'];
    $location = $_POST['location'];
    $website = isset($_POST['website']) ? $_POST['website'] : '';

    $stmt = $conn->prepare("INSERT INTO staff_profile (name, email, role, job_title, location, website) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $role, $jobTitle, $location, $website);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>New staff added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>
