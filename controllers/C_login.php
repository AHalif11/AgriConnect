<?php
session_start();
require_once "../models/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    // Check admin
    $stmt = $conn->prepare("SELECT * FROM Admin WHERE admin_id=? AND password=?");
    $stmt->bind_param("ss",$userId,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['admin_id'];
        $_SESSION['user_type'] = "Admin";
        $_SESSION['login_time'] = time();
        setcookie("logged_in","1",time()+300,"/"); // 5 minutes
        header("Location: ../views/admin/adminDashboard.php");
        exit;
    }
    $stmt->close();

    // Check user
    $stmt = $conn->prepare("SELECT * FROM Users WHERE user_id=? AND password=?");
    $stmt->bind_param("ss",$userId,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['login_time'] = time();
        setcookie("logged_in","1",time()+300,"/"); // 5 minutes
        if ($row['user_type'] == "farmer"){
            header("Location: ../views/farmer/farmerDashboard.php");
        } else {
            header("Location: ../views/consumer/consumerDashboard.php");
        }
        exit;
    }

    $_SESSION['login-error_message'] = "Invalid Log In, Please Enter Valid Credential";
    header("Location: ../views/login.php");
    exit;
}
