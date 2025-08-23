<?php
session_start();
if (isset($_SESSION['user_id']) && isset($_COOKIE['logged_in'])) {
    // header("Location: dashboard.php");
} else {
    header("Location: register.php");
}
exit;
?>
