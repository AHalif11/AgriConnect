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
    <header>
        <nav>
            <div class="nav-logo">
                <h3 class="nav-title"><span>Agri</span>Connect</h3>
            </div>
            <ul>
                <li><a href="../index.php"><span>Home</span></a></li>
            </ul>
        </nav>
    </header>
    <main>
       <!-- Server Messages -->
        <?php if (isset($_SESSION['fp_error'])): ?>
            <div id="server-error-message">
                <?php
                    echo $_SESSION['fp_error'];
                    unset($_SESSION['fp_error']); // Clear the message
                ?>
            </div>
        <?php endif; ?>
        
        <div id="forgot-password-hero" style="background:rgba(197, 244, 193, 1);" >
        
            <div id="forgot-Pass-Content">
                <h1>Verification Code</h1><br>
                <p style="margin-bottom: 25px;">Please Check Your E-mail for code</p>
                        
                <form action="../controllers/C_verifyCode.php" method="post">
                    <input style="margin: 40px 0;" class="inp-2" type="text" name="code" placeholder="Enter code" required>
                    <button class="reg-btn" type="submit">Verify Code</button>
                </form>
            
            </div>
        </div>
    </main>   
    <footer class="footer">
        <p>&copy; 2025 AgriConnect. All Rights Reserved.</p>
    </footer>
</body>
</html>
