<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
<title>Verify Code - AgriConnect</title>
</head>
<body>
<div class="verify-code-container">
    <h1>Enter Verification Code</h1>
    <?php if(isset($_SESSION['fp_error'])) { echo "<p style='color:red;'>".$_SESSION['fp_error']."</p>"; unset($_SESSION['fp_error']); } ?>
    <form action="../controllers/C_verifyCode.php" method="post">
        <input type="text" name="code" placeholder="Enter code" required>
        <button type="submit">Verify Code</button>
    </form>
</div>
</body>
</html>
