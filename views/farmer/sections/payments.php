<h2>Payment Management</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Payment ID</th>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Amount</th>
        <th>Method</th>
        <th>Status</th>
        <th>Payment Date</th>
    </tr>

    <?php if(!empty($payments)): ?>
        <?php foreach($payments as $pay): ?>
            <tr>
                <td><?php echo $pay['payment_id']; ?></td>
                <td><?php echo $pay['order_id']; ?></td>
                <td><?php echo $pay['user_id']; ?></td>
                <td><?php echo htmlspecialchars($pay['customer_name']); ?></td>
                <td><?php echo $pay['amount']; ?></td>
                <td><?php echo ucfirst(str_replace('_',' ',$pay['method'])); ?></td>
                <td><?php echo ucfirst($pay['status']); ?></td>
                <td><?php echo $pay['payment_date']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="8">No payments found</td></tr>
    <?php endif; ?>
</table>
