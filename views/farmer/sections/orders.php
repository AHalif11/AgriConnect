<h2>Order Management</h2>

<table border="1" cellpadding="5">
  <tr>
    <th>Order ID</th>
    <th>User ID</th>
    <th>Total Amount</th>
    <th>Status</th>
    <th>Order Date</th>
    <th>Items</th>
    <th>Action</th>
  </tr>
  <?php if(!empty($orders)): ?>
    <?php foreach($orders as $o): ?>
      <tr>
        <td><?php echo $o['order_id']; ?></td>
        <td><?php echo $o['user_id']; ?></td>
        <td><?php echo $o['total_amount']; ?></td>
        <td>
          <form method="POST" action="farmerDashboard.php?section=orders">
            <input type="hidden" name="action" value="update_order_status">
            <input type="hidden" name="order_id" value="<?php echo $o['order_id']; ?>">
            <select name="status">
              <?php
              $statuses = ['pending','confirmed','shipped','delivered','cancelled'];
              foreach($statuses as $s) {
                  $selected = ($s == $o['status']) ? 'selected' : '';
                  echo "<option value='$s' $selected>$s</option>";
              }
              ?>
            </select>
        </td>
        <td><?php echo $o['order_date']; ?></td>
        <td>
            <ul>
            <?php
              $items = $this->orderModel->getOrderItems($o['order_id']);
              foreach($items as $item){
                  echo "<li>".$item['product_name']." (Qty: ".$item['quantity'].")</li>";
              }
            ?>
            </ul>
        </td>
        <td><button type="submit">Update</button></td>
          </form>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr><td colspan="7">No orders found</td></tr>
  <?php endif; ?>
</table>
