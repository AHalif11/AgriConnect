<?php
session_start();

// Clear all session data
session_unset();
session_destroy();

// Delete the "logged_in" cookie
setcookie("logged_in", "", time() - 3600, "/");

header("Location: ../index.php");
exit;
