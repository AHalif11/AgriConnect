<h2>Profile Details</h2>

<?php if(isset($_GET['success'])): ?>
    <p style="color:green;">Profile updated successfully!</p>
<?php endif; ?>

<form method="POST" action="farmerDashboard.php?section=profile">
  <input type="hidden" name="action" value="update_profile">

  <label>Name:</label>
  <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br><br>

  <label>Email:</label>
  <input type="email" name="email" readonly value="<?php echo htmlspecialchars($user['email']); ?>"><br><br>

  <label>Phone:</label>
  <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br><br>

  <label>Address:</label>
  <textarea name="address"><?php echo htmlspecialchars($user['address']); ?></textarea><br><br>

  <!-- <label>NID (optional):</label>
  <input type="text" name="nid" value="<?php echo htmlspecialchars($user['nid']); ?>"><br><br> -->

  <button type="submit">Update</button>
</form>
