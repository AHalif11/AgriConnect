<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
<title>Reset Password - AgriConnect</title>
</head>
<body>
<div class="reset-password-container">
    <h1>Reset Your Password</h1>
    <?php
    if(!isset($_SESSION['fp_verified']) || !$_SESSION['fp_verified']) {
        $_SESSION['fp_error'] = "Unauthorized access.";
        header("Location: ../views/forgot_password.php");
        exit();
    }
    if(isset($_SESSION['fp_error'])) { echo "<p style='color:red;'>".$_SESSION['fp_error']."</p>"; unset($_SESSION['fp_error']); }
    ?>
    <form action="../controllers/C_resetPassword.php" method="post">
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Update Password</button>
    </form>
</div>
</body>
</html>
