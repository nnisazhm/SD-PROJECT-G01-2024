<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'arianaarissa@graduate.utm.my'; // Replace with your Gmail email
        $mail->Password = 'HONDAJAZZ7575'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipient and sender
        $mail->setFrom('arianaarissa@graduate.utm.my', 'MEQA.MY'); // Sender info
        $mail->addAddress($email); // Recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body    = '<p>Click on the link below to reset your password:</p>
                          <a href="https://yourwebsite.com/reset_password.php?email='.$email.'&token=uniqueToken">Reset Password</a>';

        // Send email
        $mail->send();
        echo 'Password reset email has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>


