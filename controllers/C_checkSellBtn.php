<?php
session_start();

// Check if user is logged in and login_time exists
if (isset($_SESSION['user_id']) && isset($_SESSION['login_time'])) {
    // Check if login is within 5 minutes
    if ((time() - $_SESSION['login_time']) <= 300) { // 300 sec = 5 min
        switch ($_SESSION['user_type']) {
            case "Farmer":
                header("Location: ../views/farmer/farmerDashboard.php");
                exit;
            case "Consumer":
                header("Location: ../views/consumer/consumerDashboard.php");
                exit;
            case "Admin":
                header("Location: ../views/admin/adminDashboard.php");
                exit;
            default:
                session_unset();
                session_destroy();
                header("Location: ../views/register.php");
                exit;
        }
    } else {
        session_unset();
        session_destroy();
        header("Location: ../views/register.php");
        exit;
    }
} else {
    header("Location: ../views/register.php");
    exit;
}
?>
