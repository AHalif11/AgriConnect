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
        $_SESSION['error_message'] = 'User ID already used!';
        header("Location: register.php"); // Redirect back to the registration page
        exit();
    } 
    // Check if email exists
    else {
        $sqlEmail = "SELECT * FROM Users WHERE email='$email'";
        $resultEmail = mysqli_query($conn, $sqlEmail);
        if (mysqli_num_rows($resultEmail) > 0) {
            $_SESSION['error_message'] = 'Email is already registered!';
            header("Location: register.php");
            exit();
        } 
        // Insert user if both checks pass
        else {
            $sqlInsert = "INSERT INTO Users (user_id, name, email, phone, password, user_type, address, nid) 
                          VALUES ('$userId','$name','$email','$phone','$password','$userType','$address','$nid')";
            if (mysqli_query($conn, $sqlInsert)) {
                $_SESSION['success_message'] = 'Registration successful! Please login.';
                header("Location: register.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
                header("Location: register.php");
                exit();
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
            <a href="index.php"><span>Home</span></a>
          </li>
          <li><a href="">about</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <div id="registration-hero" style="background:rgba(197, 244, 193, 1)">
            <div id="server-error-message" style="<?php echo (isset($_SESSION['error_message']) || isset($_SESSION['success_message'])) ? '' : 'display:none;'; ?>">
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']); // Clear the message
                    } 
                    elseif (isset($_SESSION['success_message'])) {
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                        // echo "<script>document.addEventListener('DOMContentLoaded', function(){ document.querySelector('form').reset(); });</script>";
                    }
                ?>
            </div>
            <div id="registration-content">
                <div id="registration-form">
                    <div class="form-header"><h1>Get Started Now</h1></div>
                    <div class="main-form">
                        <form action=""  method="post" onsubmit="return validateForm()">
                            <label for="userId">User ID</label><br>
                            <input type="text" class="inp" id="userId" name="userId" required><br>
                            <div id="userId-error"></div>

                            <label for="name">Name</label><br>
                            <input type="text" class="inp" id="name" name="name" required><br>
                            <div id="name-error"></div>

                            <label for="email">E-Mail</label><br>
                            <input type="email" class="inp" id="email" name="email" required><br>
                            <div id="email-error"></div>

                            <label for="phone">Phone Number</label><br>
                            <input type="text" class="inp" id="phone" name="phone" required><br>
                            <div id="phone-error"></div>

                            <label for="password">Password</label><br>
                            <input type="password" class="inp" id="password" name="password" required><br>
                            <div id="password-error"></div>

                            <label for="userType">User Type</label><br>
                            <select name="userType" class="inp" id="userType" onchange="toggleNid()">
                                <option value="">--------Select--------</option>
                                <option value="consumer">Consumer</option>
                                <option value="farmer">Farmer</option>
                            </select><br>
                            <div id="userType-error"></div>

                            <label for="address">Address</label><br>
                            <textarea name="address" class="address-inp" id="address" required></textarea><br>
                            <div id="address-error"></div>

                            <div id="nidField" style="display: none;">
                            <label for="nid">NID Number</label><br>
                            <input type="text" class="inp" id="nid" name="nid">
                            </div>
                            <div id="nid-error"></div>
                            <button type="submit" class="reg-btn">Register</button>
                        </form>

                    </div>
                    <label class="have-acc" for="">Have an Account?</label>
                    <a href="login.php" style="font-size : 20px;margin-left: 5px;">Sign In</a>
                    
                </div>
                <div id="registration-description">
                    <div id="registration-description-header">
                        <h1>Reach Your Target<br>Faster With Us.</h1>
                    </div>
                    <div id="registration-description-img">
                        <img src="./images/register.png" alt="img">
                    </div>

                </div>
            </div>

        </div>
    </main>

<script src="validation/registration_validation.js"></script>
</body>
</html>