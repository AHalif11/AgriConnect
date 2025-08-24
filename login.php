<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    // Check if user exists with given ID and password
    $sql = "SELECT * FROM Users WHERE user_id='$userId' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['userId'] = $user['user_id'];
        $_SESSION['userType'] = $user['user_type'];
        $_SESSION['name'] = $user['name'];

        if ($user['user_type'] == 'Admin') {
            header("Location: adminDashboard.php");
            exit;
        } elseif ($user['user_type'] == 'Farmer') {
            header("Location: farmerDashboard.php");
            exit;
        } elseif ($user['user_type'] == 'Consumer') {
            header("Location: consumerDashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid user type!');</script>";
        }

    } else {
        echo "<script>alert('Invalid User ID or Password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/logo1.png">
    <title>AgriConnect_Login</title>
</head>
<body>
    <header style="background: url(images/main-slider.png) no-repeat center center; background-size: cover;">
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
          <li><a href="index.php"><span>Home</span></a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <div id="login-hero" style="height: 601px; background:rgba(197, 244, 193, 1)">
            <div id="login-form">
                <form action="" method="post">
                    <label for="userId">User ID</label><br>
                    <input type="text" id="userId" name="userId" required placeholder="Write your User-id "><br>

                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required placeholder="Write Your Password"><br>    
                        
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
