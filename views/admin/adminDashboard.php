<?php
session_start();
if (!isset($_SESSION['user_id'], $_COOKIE['logged_in']) || ($_SESSION['user_type'] ?? '') !== 'Admin') {
    header("Location: ../../views/login.php");
    exit;
}
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
<body>
<header>
<nav>
    <div class="nav-logo"><h3 class="nav-title"><span>Agri</span>Connect</h3></div>
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../login.php">Login page</a></li>
        <li><a href="../../controllers/C_logout.php">Logout</a></li>
    </ul>
</nav>
</header>
<main>
    <h1>Welcome, Admin</h1>
</main>
    <footer class="footer">
        <p>&copy; 2025 AgriConnect. All Rights Reserved.</p>
    </footer>
</body>
</html>
