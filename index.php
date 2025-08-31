<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="public/images/logo1.png">
    <title>AgriConnect</title>
</head>
<body>
<header>
    <nav id="navBar">
        <div class="nav-logo">
            <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
            <li><a href=""><span>Home</span></a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
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
                <button class="sell-btn btn" onclick="window.location.href='controllers/C_checkSellBtn.php'">Sell here</button>
                <button class="buy-btn btn" onclick="window.location.href='views/consumer/consumerDashboard.php'">Buy here</button>
            </div>
        </div>
    </div>
</header>
<main></main>
<footer style="background-color: rgba(134, 205, 128, 1); height: 200px; width: 100%"></footer>
</body>
</html>
