<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $address = $_POST['address'];
    $nid = !empty($_POST['nid']) ? $_POST['nid'] : NULL;

    // Check if user ID exists
    $sql = "SELECT * FROM Users WHERE user_id='$userId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('User ID already used!');</script>";
    } 
    // Check if email exists
    else {
        $sqlEmail = "SELECT * FROM Users WHERE email='$email'";
        $resultEmail = mysqli_query($conn, $sqlEmail);
        if (mysqli_num_rows($resultEmail) > 0) {
            echo "<script>alert('Email is already registered!');</script>";
        } 
        // Insert user if both checks pass
        else {
            $sqlInsert = "INSERT INTO Users (user_id, name, email, phone, password, user_type, address, nid) 
                          VALUES ('$userId','$name','$email','$phone','$password','$userType','$address','$nid')";
            if (mysqli_query($conn, $sqlInsert)) {
                echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="icon" href="images/logo1.png">
    <title>AgriConnect_Register</title>
</head>
<body>
    <header style="background: url(images/main-slider.png) no-repeat center center; background-size: cover;">
      <nav>
        <div class="nav-logo">
          <h3 class="nav-title"><span>Agri</span>Connect</h3>
        </div>

        <ul>
          <li>
            <a href=""><span>Home</span></a>
          </li>
          <li><a href="">about</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <div id="registration-hero" style="height: 601px;background:rgba(197, 244, 193, 1)">
            <div class="registration-content">
                <div id="registration-form">
                    <form action=""  method="post" onsubmit="return validateForm()">
                        <label for="UserName">User ID</label><br>
                        <input type="text" id="userId" name="userId" required><br>

                        <label for="Name">Name</label><br>
                        <input type="text" id="name" name="name" required><br>

                        <label for="">E-Mail</label><br>
                        <input type="email" id="email" name="email" required><br>

                        <label for="phone">Phone Number</label><br>
                        <input type="text" id="phone" name="phone" required><br>

                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" required><br>

                        <label for="userType">User Type</label><br>
                        <select name="userType" id="userType" onchange="toggleNid()">
                            <option value="">--Select--</option>
                            <option value="consumer">Consumer</option>
                            <option value="farmer">Farmer</option>
                        </select><br>

                        <label for="address">Address</label><br>
                        <textarea name="address" id="address" required></textarea><br>

                        <div id="nidField" style="display: none;">
                        <label for="nid">NID Number</label><br>
                        <input type="text" id="nid" name="nid">
                        </div>
                        <button type="submit">Register</button>
                    </form>
                </div>
                <div id="registration-description">

                </div>
            </div>

        </div>
    </main>

<script src="validation/registration_validation.js"></script>
</body>
</html>