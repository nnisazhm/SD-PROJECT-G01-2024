<?php
session_start();

if (isset($_POST['otp'])) {
    $user_otp = $_POST['otp'];

    // Check if the entered OTP matches the one sent via email
    if ($user_otp == $_SESSION['otp']) {
        echo "Email Verified Successfully!";
        header('Location: process.php');
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Enter the OTP sent to your email</h2>
    <form action="" method="post">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
