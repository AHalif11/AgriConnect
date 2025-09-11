<?php
session_start();

session_unset();
session_destroy();

// Kill 5-min cookie
setcookie("logged_in", "", time() - 3600, "/");

// Back to home
header("Location: ../index.php");
exit;
?>
