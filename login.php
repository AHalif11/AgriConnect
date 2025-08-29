<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    // First check in Admin table
    $sqlAdmin = "SELECT * FROM Admin WHERE admin_id='$userId' AND password='$password'";
    $resultAdmin = mysqli_query($conn, $sqlAdmin);

    if (mysqli_num_rows($resultAdmin) == 1) {
        $row = mysqli_fetch_assoc($resultAdmin);

        $_SESSION['user_id'] = $row['admin_id'];
        $_SESSION['user_type'] = "Admin";

        setcookie("logged_in", "1", time() + 600, "/");

        header("Location: adminDashboard.php");
        exit;
    }

    // If not admin, check in Users table
    $sqlUser = "SELECT * FROM Users WHERE user_id='$userId' AND password='$password'";
    $resultUser = mysqli_query($conn, $sqlUser);

    if (mysqli_num_rows($resultUser) == 1) {
        $row = mysqli_fetch_assoc($resultUser);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];

        setcookie("logged_in", "1", time() + 600, "/");

        if ($row['user_type'] == "Farmer") {
            header("Location: farmerDashboard.php");
        } elseif ($row['user_type'] == "Consumer") {
            header("Location: consumerDashboard.php");
        }
        exit;
    }

    // if not found in any table
    $_SESSION['login-error_message'] = 'Invalid Log In, Please Enter Valid Credential';
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/logo1.png">
    <title>AgriConnect_Login</title>
</head>
<body>
    <header>
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
          <li><a href="index.php"><span>Home</span></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="register.php">Sign Up</a></li>
          <li><a href="consumerDashboard.php">test dash</a></li>
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
                    <div class="login-form-header"><h1>Welcome Back</h1>
                    <span class="login-header-span">Enter your credentials to access your account</span>
                </div>
                    <div class="main-login-form">
                        <label for="userId">User ID</label><br>
                        <input type="text" id="userId" name="userId" class="login-inp" required placeholder="Write your User-id "><br>
            
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" class="login-inp" required placeholder="Write Your Password"><br>
                        <button type="submit" class="login-btn">LOG IN</button> 

                    </div>
                    <label class="have-acc" for="">Don't have an Account?</label>
                    <a href="register.php" style="font-size : 20px;margin-left: 5px;">Sign Up</a>
                    
                </div>
                <div id="login-description">
                    <div id="login-description-header">
                        <h1>Reach Your Target<br>Faster With Us.</h1>
                    </div>
                    <div id="login-description-img">
                        <img src="./images/register.png" alt="img">
                    </div>

                </div>
            </div>
        </div>
    </main>
    <footer style="background-color :rgba(134, 205, 128, 1); height:200px; width:100%">

    </footer>
</body>
</html>
