<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
<title>Forgot Password - AgriConnect</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav-logo">
                <h3 class="nav-title"><span>Agri</span>Connect</h3>
            </div>
            <ul>
                <li><a href="../index.php"><span>Home</span></a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="login.php">Log In</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!--isset($_SESSION['fp_message']) || -->
        <?php if (isset($_SESSION['fp_error'])): ?>
            <div id="server-error-message">
                <?php
                    // if (isset($_SESSION['fp_message'])) {
                    //     echo $_SESSION['fp_message'];
                    //     unset($_SESSION['fp_message']);
                    // } 
                    //else
                    if (isset($_SESSION['fp_error'])) {
                        echo $_SESSION['fp_error'];
                        unset($_SESSION['fp_error']);
                    }
                ?>
            </div>
        <?php endif; ?>

        <div id="forgot-password-hero" style="background:rgba(197, 244, 193, 1);" >
        
            <div id="forgot-Pass-Content">
                <h1>Forgot your password?</h1><br>
                <p style="margin-bottom: 25px;">Please enter the account that you want to reset the password.</p>
                        
                <form action="../controllers/C_forgotPassword.php" method="post">
                    <input style="margin-bottom: 25px;" class="inp-2" type="email" name="email" placeholder="Enter your email" required><br>
                    <button class="reg-btn" type="submit">Send Verification Code</button>
                </form>
                <div class="marginT">

                    <label class="have-acc" for="">Remember Password?</label>
                    <a class="GoRegBtn" href="login.php">Back to Login</a>
                </div>
            
            </div>
        </div>
    </main>   
    <footer class="footer">
        <p>&copy; 2025 AgriConnect. All Rights Reserved.</p>
    </footer> 
</body>
</html>
