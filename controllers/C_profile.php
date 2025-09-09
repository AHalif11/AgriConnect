<?php
session_start();
require_once "../../models/db.php";
require_once "../../models/UserModel.php";
require_once "../../models/OrderModel.php";

// Check session & cookie
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header("Location: ../login.php");
    exit;
}

$userModel = new UserModel($conn);
$orderModel = new OrderModel($conn);

$user = $userModel->findUserById($_SESSION['user_id']);
$orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Keep old values if new ones are empty
    $name    = !empty($_POST['name']) ? trim($_POST['name']) : $user['name'];
    $email   = !empty($_POST['email']) ? trim($_POST['email']) : $user['email'];
    $phone   = !empty($_POST['phone']) ? trim($_POST['phone']) : $user['phone'];
    $address = !empty($_POST['address']) ? trim($_POST['address']) : $user['address'];
    $nid     = !empty($_POST['nid']) ? trim($_POST['nid']) : $user['nid'];

    if ($userModel->updateUser($_SESSION['user_id'], $name, $email, $phone, $address, $nid)) {
        // Update session
        $_SESSION['user_name']    = $name;
        $_SESSION['user_email']   = $email;
        $_SESSION['user_phone']   = $phone;
        $_SESSION['user_address'] = $address;
        $_SESSION['user_nid']     = $nid;

        header("Location: profile.php?success=1");
        exit;
    } else {
        header("Location: profile.php?error=1");
        exit;
    }
}
?>
