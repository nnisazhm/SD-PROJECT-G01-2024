<?php
session_start();
echo "<h1>Thank you for your purchase!</h1>";
echo "<p>Your order has been successfully placed. A confirmation email has been sent to {$_SESSION['email']}.</p>";
?>