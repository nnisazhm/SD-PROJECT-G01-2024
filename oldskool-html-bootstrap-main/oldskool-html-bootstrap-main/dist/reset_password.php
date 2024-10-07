<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    echo "<p>Invalid token.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="reset_password_process.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="new_password">Enter your new password:</label><br>
        <input type="password" name="new_password" required><br><br>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>

