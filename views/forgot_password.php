<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
<title>Forgot Password - AgriConnect</title>
</head>
<body>
<div class="forgot-password-container">
    <h1>Forgot Password</h1>
    <?php
    if(isset($_SESSION['fp_message'])) { echo "<p style='color:green;'>".$_SESSION['fp_message']."</p>"; unset($_SESSION['fp_message']); }
    if(isset($_SESSION['fp_error'])) { echo "<p style='color:red;'>".$_SESSION['fp_error']."</p>"; unset($_SESSION['fp_error']); }
    ?>
    <form action="../controllers/C_forgotPassword.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Verification Code</button>
    </form>
    <p><a href="login.php">Back to Login</a></p>
</div>
</body>
</html>
