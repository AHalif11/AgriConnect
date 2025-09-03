<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../public/images/logo1.png">
    <title>AgriConnect_Login</title>
</head>
<body>
    <header>
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
          <li><a href="../index.php"><span>Home</span></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <div id="login-hero" style="background:rgba(197, 244, 193, 1)">
            <div id="login-server-error-message" style="<?php echo isset($_SESSION['login-error_message']) ? '' : 'display:none;'; ?>">
                <?php
                        if (isset($_SESSION['login-error_message'])) {
                            echo $_SESSION['login-error_message'];
                            unset($_SESSION['login-error_message']); // Clear the message
                        } 
                ?>
            </div>
            <div id="login-content">
                <div id="login-form">
                    <div class="login-form-header">
                        <h1>Welcome Back</h1>
                        <span class="login-header-span">Enter your credentials to access your account</span>
                    </div>
                    <div class="main-login-form">
                        <!-- UPDATED FORM ACTION -->
                        <form action="../controllers/C_login.php" method="post">
                            <label for="userId">User ID</label><br>
                            <input type="text" id="userId" name="userId" class="login-inp" required placeholder="Write your User-id "><br>
                
                            <label for="password">Password</label><br>
                            <input type="password" id="password" name="password" class="login-inp" required placeholder="Write Your Password"><br>
                            
                            <button type="submit" class="login-btn">LOG IN</button> 
                        </form>
                    </div>
                    <label class="have-acc" for="">Don't have an Account?</label>
                    <a href="register.php" style="font-size : 20px;margin-left: 5px;">Sign Up</a>
                </div>
                <div id="login-description">
                    <div id="login-description-header">
                        <h1>Reach Your Target<br>Faster With Us.</h1>
                    </div>
                    <div id="login-description-img">
                        <img src="../public/images/register.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>&copy; 2025 AgriConnect. All Rights Reserved.</p>
    </footer>
</body>
</html>
