<?php
session_start();

// if logged in and cookie is still valid then go dashboard
if (isset($_SESSION['user_id']) && isset($_COOKIE['logged_in'])) {
    // header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/logo1.png">
    <title>AgriConnect</title>
</head>
<body>
    <header style="background: url(images/main-slider.png) no-repeat center center; background-size: cover;">
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>

        <ul>
          <li>
            <a href=""><span>Home</span></a>
          </li>
          <li><a href="">about</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Register</a></li>
        </ul>
      </nav>
      <div class="banner">
        <div class="banner-content">
            <div class="banner-description">
                <p class="banner-head-para">WELCOME TO Agricultural Products Rural Entrepreneurship Management System.</p>
                <h1>AGRI-CONNECT HUB</h1>
                <P class="banner-foot-para">
                    Empowering Rural Dreams, Nurturing Agricultural Growth - AgriConnect Hub cultivates prosperity from the roots up
                </P>
            </div>
            <div class="buy-sell-btn">
                <button class="sell-btn btn" onclick="window.location.href='checkSellBtn.php'">Sell here</button>
                <button class="buy-btn btn">Buy here</button>
            </div>
        </div>

      </div>
    </header>
</body>
</html>