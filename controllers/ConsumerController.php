<?php
// controllers/ConsumerController.php
require_once __DIR__ . "/../models/UserModel.php";
require_once __DIR__ . "/../models/OrderModel.php";
require_once __DIR__ . "/../models/CartModel.php";

class ConsumerController {
    private $conn;
    private $userModel;
    private $orderModel;
    private $cartModel;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->userModel  = new UserModel($this->conn);
        $this->orderModel = new OrderModel($this->conn);
        $this->cartModel  = new CartModel($this->conn);
    }

    // process POST actions
    public function handleActions() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // Update profile
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile') {
            // Basic safety: ensure user is logged in
            if (!isset($_SESSION['user_id'])) {
                header("Location: ../../views/login.php");
                exit;
            }

            $currentUser = $this->userModel->findUserById($_SESSION['user_id']);
            if (!$currentUser) {
                header("Location: ../../views/login.php");
                exit;
            }

            $name    = !empty($_POST['name']) ? trim($_POST['name']) : $currentUser['name'];
            // email is readonly in the form — keep current email as authoritative
            $email   = !empty($_POST['email']) ? trim($_POST['email']) : $currentUser['email'];
            $phone   = !empty($_POST['phone']) ? trim($_POST['phone']) : $currentUser['phone'];
            $address = !empty($_POST['address']) ? trim($_POST['address']) : $currentUser['address'];
            $nid     = isset($_POST['nid']) ? trim($_POST['nid']) : $currentUser['nid'];

            // Update user in DB
            $this->userModel->updateUser($_SESSION['user_id'], $name, $email, $phone, $address, $nid);

            // redirect back to profile with success flag
            header("Location: consumerProfile.php?section=profile&success=1");
            exit;
        }
    }

    // load view sections
    public function loadSection($section) {
        if (session_status() === PHP_SESSION_NONE) session_start();

        switch ($section) {
            case 'profile':
                $user = $this->userModel->findUserById($_SESSION['user_id']);
                include __DIR__ . "/../views/consumer/sections/profileDetails.php";
                break;

            case 'orders':
                $orders = $this->orderModel->getOrdersForUser($_SESSION['user_id']);
                include __DIR__ . "/../views/consumer/sections/orderDetails.php";
                break;

            case 'cart':
                $cart = $this->cartModel->getCartForUser($_SESSION['user_id']);
                include __DIR__ . "/../views/consumer/sections/cartList.php";
                break;

            default:
                echo "<p>Invalid Section</p>";
        }
    }
}
?>
