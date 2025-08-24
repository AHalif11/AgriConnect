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
    echo "<script>alert('Invalid login!');</script>";
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
