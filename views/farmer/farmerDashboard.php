<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'farmer') {
    header("Location: ../../views/login.php");
    exit;
}

$section = isset($_GET['section']) ? $_GET['section'] : 'profile';
require_once "../../controllers/FarmerController.php";
$controller = new FarmerController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer Dashboard</title>
  <link rel="stylesheet" href="../../public/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<body>
  <header style="display:none;">
    <nav>
      <div class="nav-logo">
        <h3 class="nav-title"><span>Agri</span>Connect</h3>
      </div>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="farmerDashboard.php">Dashboard</a></li>
        <li><a href="../../logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main style="display: flex;">
    <!-- Sidebar -->
    <aside style="width: 20%; background:#f1f1f1; padding:20px;">
      <ul>
        <li><a href="?section=profile">Profile Details</a></li>
        <li><a href="?section=products">Product Management</a></li>
        <li><a href="?section=orders">Order Management</a></li>
        <li><a href="?section=payments">Payments</a></li>
        <li><a href="?section=feedback">Customer Feedback</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <section style="width:80%; padding:20px;">
      <?php
        $controller->handleActions(); // Handle POST/GET actions first
        $controller->loadSection($section); // Load the section content
      ?>
    </section>
  </main>
</body>
</html>
