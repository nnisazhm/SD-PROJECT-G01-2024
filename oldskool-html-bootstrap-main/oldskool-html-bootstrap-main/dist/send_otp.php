<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require 'vendor/autoload.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Generate a 6-digit OTP
    $otp = rand(100000, 999999);
    $_SESSION['email'] = $email;
    $_SESSION['otp'] = $otp;

    // Send OTP via email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com'; // SMTP username
        $mail->Password = 'your_password';          // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your_email@example.com', 'OTP Verification');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "<h3>Your OTP code is <b>$otp</b></h3>";

        $mail->send();
        echo 'OTP has been sent successfully.';
        header('Location: verify_otp.php');
    } catch (Exception $e) {
        echo "Failed to send OTP. Error: {$mail->ErrorInfo}";
    }
}
?>
