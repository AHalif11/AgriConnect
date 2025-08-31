<?php
session_start();
require_once "../models/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId   = $_POST['userId'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $address  = $_POST['address'];
    $nid      = !empty($_POST['nid']) ? $_POST['nid'] : NULL;

    // check if user exists
    $stmt = $conn->prepare("SELECT user_id FROM Users WHERE user_id=?");
    $stmt->bind_param("s",$userId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "User ID already exists!";
        header("Location: ../views/register.php");
        exit;
    }
    $stmt->close();

    // check email
    $stmt = $conn->prepare("SELECT email FROM Users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Email already registered!";
        header("Location: ../views/register.php");
        exit;
    }
    $stmt->close();

    // insert new user
    $stmt = $conn->prepare("INSERT INTO Users (user_id,name,email,phone,password,user_type,address,nid) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss",$userId,$name,$email,$phone,$password,$userType,$address,$nid);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful! Please login.";
    } else {
        $_SESSION['error_message'] = "Registration failed: ".$stmt->error;
    }

    $stmt->close();
    header("Location: ../views/register.php");
    exit;
}
