<?php
// views/consumer/sections/cartList.php
?>
<h2 class="section-title">Cart List</h2>

<?php if(!empty($cart)): ?>
<table class="cart-table" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr style="background:#2d6a4f; color:#fff;">
            <th style="padding:8px;">Product</th>
            <th style="padding:8px;">Quantity</th>
            <th style="padding:8px;">Price</th>
            <th style="padding:8px;">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; foreach($cart as $item): 
            $subtotal = $item['quantity'] * $item['price'];
            $total += $subtotal;
        ?>
        <tr>
            <td style="padding:8px;"><?php echo htmlspecialchars($item['product_name']); ?></td>
            <td style="padding:8px;"><?php echo intval($item['quantity']); ?></td>
            <td style="padding:8px;"><?php echo number_format($item['price'],2); ?></td>
            <td style="padding:8px;"><?php echo number_format($subtotal,2); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" style="text-align:right; padding:8px; font-weight:bold;">Total:</td>
            <td style="padding:8px; font-weight:bold;"><?php echo number_format($total,2); ?></td>
        </tr>
    </tbody>
</table>
<?php else: ?>
<p class="no-data">Cart is empty.</p>
<?php endif; ?>
