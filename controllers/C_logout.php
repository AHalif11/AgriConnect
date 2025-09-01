<?php
session_start();

// Kill session
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}
session_destroy();

// Kill 5-min cookie
setcookie("logged_in", "", time() - 3600, "/");

// Back to home
header("Location: ../index.php");
exit;
?>
