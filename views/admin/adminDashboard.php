<?php /*
session_start();
if (!isset($_SESSION['user_id'], $_COOKIE['logged_in']) || ($_SESSION['user_type'] ?? '') !== 'Admin') {
    header("Location: ../../views/login.php");
    exit;
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../public/css/style.css?v=<?php echo time(); ?>">
<link rel="icon" href="../../public/images/logo1.png">
<title>Admin Dashboard</title>
</head>
<body style="background-color: rgba(169, 245, 162, 1); ">
<header>
<nav  style="z-index:1000; position: fixed;">
    <div class="nav-logo"><h3 class="nav-title"><span>Agri</span>Connect</h3></div>
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../login.php">Login page</a></li>
        <li><a href="../../controllers/C_logout.php">Logout</a></li>
    </ul>
</nav>
</header>
<main style="padding-top: 100px;">
   <div id="admin_pannel">
        <div id="admin_left_pannel">
            <h3>Hello Admin!</h3>
            <h4>You are the boss of the system, can manage anything.</h4><br><br>
            <a href="">Consumer</a><br>
            <a href="">Farmer</a><br>
            <a href="">Product</a>
        </div>
        <div id="admin_right_pannel">
            <h2>Operations</h2><hr style="border: 1px solid black; margin-top:-5px;">

           
            <a href="" style="margin-left:250px; margin-top: 20px;">ADD</a>
            <a href="">DELETE</a>
            <a href="">UPDATE</a><br><br>
            <div id="admin_show_data"> Data add Koro</div>
            
        </div>
    </div>
</main>
    <footer>
      <div class="footer-container">
        <div class="footer-text">
          <div class="footer-logo">
            <!-- <img src="public/images/logo1.png" alt="" style="height:40px"> -->
            <h3>Agri<span>Connect</span></h3>
          </div>
          <p>
            AgriConnect is a localized platform that connects farmers, suppliers, and consumers, making agriculture more accessible, efficient, and sustainable.
          </p>
        </div>
        <div class="footer-icon">
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-github"></i>
        </div>
        <hr />
        <div class="footer-copyright">
          <h3><p>&copy; 2025 AgriConnect. All Rights Reserved.</h3>
        </div>
      </div>
    </footer>
</body>
</html>
