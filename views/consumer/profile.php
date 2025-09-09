<?php
require_once "../../controllers/C_profile.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - AgriConnect</title>
    <link rel="stylesheet" href="../../public/css/style.css?v=<?php echo time(); ?>">
</head>
<body>
<header>
    <nav>
        <div class="nav-logo"><h3 class="nav-title"><span>Agri</span>Connect</h3></div>
        <ul>
            <li><a href="consumerDashboard.php">Dashboard</a></li>
            <li><a href="profile.php"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
            <li><a href="../../controllers/C_logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main>
    <div id="profile-container">
        <div id="profile-container-left">
            <!-- Left Sidebar -->
            <button class="btn" onclick="showSection('details')">Profile Details</button>
            <button onclick="showSection('orders')" style="display:block;">Order History</button>
            
        </div>
        <!-- <div style="width:25%; border-right:1px solid #af3b3bff; padding:20px;"> -->
        <!-- </div> -->

        
            <!-- Right Content -->
            <div id="profile-container-right">
                <div id="profile-container-right-details">
                    <!-- Profile Details -->
                    <div id="details" class="section">
                        <h2 style="text-align: center;">Profile Details</h2>
                        <form method="POST" action="../../controllers/C_profile.php">
                            <label>Name:</label><br>
                            <input class="inp-3" type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br><br>
            
                            <label>Email:</label><br>
                            <input class="inp-3" type="email" name="email" readonly value="<?php echo htmlspecialchars($user['email']); ?>"><br><br>
            
                            <label>Phone:</label><br>
                            <input class="inp-3" type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br><br>
            
                            <label>Address:</label><br>
                            <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>"><br><br>
            
                            <label>NID:</label><br>
                            <input type="text" name="nid" value="<?php echo htmlspecialchars($user['nid']); ?>"><br><br>
            
                            <button type="submit">Update</button>
                        </form>
                    </div>
            
                    <!-- Order History -->
                    <div id="orders" class="section" style="display:none;">
                        <h2 style="text-align: center;" >Order History</h2>
                        <?php if ($orders->num_rows > 0): ?>
                            <table border="1" cellpadding="10" cellspacing="0">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php while ($row = $orders->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['total_amount']); ?></td>
                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                    <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                                    <td><button onclick="alert('Order Details for Order ID: <?php echo $row['order_id']; ?>')">Order Details</button></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                        <?php else: ?>
                            <p>No order history found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    
    </div>
</main>

<script>
function showSection(section) {
    document.getElementById('details').style.display = (section === 'details') ? 'block' : 'none';
    document.getElementById('orders').style.display = (section === 'orders') ? 'block' : 'none';
}
</script>
</body>
</html>
