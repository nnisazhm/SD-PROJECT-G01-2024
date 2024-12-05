<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";  // Correct path to database connection file

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($mysqli->affected_rows) {
    // Do something if the update was successful

    $mail = require __DIR__ . "/mailer.php";  // Fixed constant __DIR__ usage
    $mail->setFrom("noreply@example.com");     // Fixed 'setFrom' method
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    
    $mail->Body = <<<END
    Click <a href="http://example.com/reset-password.php?token=$token">here</a>
    to reset your password.
    END;

    try { 
        $mail->send();
        echo "Message sent, please check your inbox.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}"; 
    }
} else {
    echo "Email address not found or update failed.";
}

?>

