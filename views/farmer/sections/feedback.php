<h2>Customer Feedback</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Review ID</th>
        <th>Product Name</th>
        <th>Customer Name</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Created At</th>
    </tr>

    <?php if(!empty($reviews)): ?>
        <?php foreach($reviews as $r): ?>
            <tr>
                <td><?php echo $r['review_id']; ?></td>
                <td><?php echo htmlspecialchars($r['product_name']); ?></td>
                <td><?php echo htmlspecialchars($r['customer_name']); ?></td>
                <td><?php echo $r['rating']; ?></td>
                <td><?php echo htmlspecialchars($r['comment']); ?></td>
                <td><?php echo $r['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No feedback found</td></tr>
    <?php endif; ?>
</table>
