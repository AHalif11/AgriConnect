<?php
session_start();
// if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
//     header("Location: ../../views/login.php");
//     exit;
// }
require_once "../../models/db.php";
require_once "../../controllers/ConsumerController.php";
$controller = new ConsumerController($conn);
$products = $controller->getProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/logo1.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" crossorigin="anonymous" />

    <title>Consumer Dashboard</title>
</head>
<body>
  <!-- header start -->
    <header>
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>
        <ul>
          <li><a href="consumerProfile.php?section=cart">cart</a></li>
          <li><a href="">Products</a></li>
          <li>
            <a href="consumerProfile.php">
                <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <!-- header end -->
     <!-- main start -->
    <main>
      <!-- consumer dashboard banner start -->
      <div id="Consumer-dashboard-banner-hero">
        <div id="banner-left" style="background: linear-gradient(108.43deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0) 100%),
              url(../../public/images/bannarBig.png) no-repeat center center; background-size: cover;">
              <div class="banner-left-content">
                <h1>AgriConnect Hub</h1>
                <h4>Sale UP TO <span class="off-back">30% OFF</span></h4>
                <p>Free Shipping on all your order</p>
                <button class="shopNow-btn">shop Now  -></button>
              </div>
        </div>
        <div id="banner-right">
          <div id="top" style="background: url(../../public/images/BGTop.png) no-repeat center center; background-size: cover;">
            <div class="banner-top-content">
                <h4>SUMMER DEALS</h4>
                <h1>75% OFF</h1>
                <p>Only Fruits & Vegetables</p>
            </div>
          </div>
          <div id="bottom" style="background: linear-gradient(rgba(0, 38, 3, 0.8), rgba(0, 38, 3, 0.8)), url('../../public/images/BgBottom.png') no-repeat center center / cover;">
            <div class="banner-bottom-content">
              <h4>BEST DEAL</h4>
              <h1>Special Products</h1>
              <h1>Deal of the Month</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- consumer dashboard banner end -->

      <!-- consumer dashboard featured start -->
      <div id="featured-hero">
        <div id="free-shipping">
          <div class="delivery-icon"><i class="fa-solid fa-truck fa-2x"></i></div>
          <div class="free-shipping-content">
            <h4>Free Shipping</h4>
            <p>Free shipping on all your order</p>
          </div>
        </div>
        <!-- support -->
        <div id="c-support">
          <div class="support-icon"><i class="fa-solid fa-headset fa-2x"></i></div>
          <div class="support-content">
            <h4>Customer Support 24/7</h4>
            <p>Instant access to support</p>
          </div>
        </div>
        <!-- payment -->
         <div id="s-payment">
          <div class="payment-icon"><i class="fa-solid fa-file-invoice-dollar fa-2x"></i></div>
          <div class="payment-content">
            <h4>100% secure Payment</h4>
            <p>We ensure your Money is safe</p>
          </div>
        </div>
        <!-- money back -->
        <div id="money-back">
          <div class="money-icon"><i class="fa-solid fa-money-bill-1-wave fa-2x"></i></div>
          <div class="moneyBack-content">
            <h4>Money-Back Guarantee</h4>
            <p>7 days Money-Back Guarantee</p>
          </div>
        </div> 
      </div>
      <!-- consumer dashboard featured end -->
      <section id="product-section">
        <!-- style="margin: 30px 0;text-transform: uppercase; text-align:center; background-color:aquamarine; border-radius:10px;" -->
        <h1 style="margin: 30px 0;text-transform: uppercase;">popular Products</h1>
          <div id="products" class="dashboard-products">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="../../uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="price"><?php echo number_format($product['price'],2); ?> TK</p>
                    <a href="productDetails.php?id=<?php echo $product['product_id']; ?>" class="view-btn">View Details</a>
                </div>
            <?php endforeach; ?>
          </div>
      </section>

       <section>
        <div id="discount-banner">
          <div class="discount-banner-description"style="margin:80px 100px;">
            <img src="../../public/images/DiscountBanner.png" alt="">
          </div>
        </div>
       </section>
    </main>
    
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
