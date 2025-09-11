<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="public/images/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AgriConnect</title>
</head>
<body>
<header>
    <nav id="navBar">
        <div class="nav-logo">
            <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
            <li><a href="views/consumer/consumerDashboard.php"><span>Buy</span></a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="views/register.php">Register</a></li>
        </ul>
    </nav>
    <div class="banner" style="background: url(public/images/main-slider.png) no-repeat center center; background-size: cover;">
        <div class="banner-content">
            <div class="banner-description">
                <p class="banner-head-para">WELCOME TO Agricultural Products Rural Entrepreneurship Management System.</p>
                <h1>AGRI-CONNECT HUB</h1>
                <p class="banner-foot-para">
                    Empowering Rural Dreams, Nurturing Agricultural Growth - AgriConnect Hub cultivates prosperity from the roots up
                </p>
            </div>
            <div class="buy-sell-btn">
                <button class="buy-btn btn"  onclick="window.location.href='./views/consumer/consumerDashboard.php'">Buy here</button>
                <button class="sell-btn btn" onclick="window.location.href='controllers/C_checkSellBtn.php'">Sell here</button>
            </div>
        </div>
    </div>
</header>
<main></main>
    <footer>
      <div class="footer-container">
        <div class="footer-text">
          <div class="footer-logo">
            <img src="public/images/logo1.png" alt="" style="height:40px">
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
