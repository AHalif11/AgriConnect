<?php
class PaymentModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPaymentsForFarmer($farmerId) {
    $sql = "SELECT pay.*, o.user_id, u.name AS customer_name, p.name AS product_name, oi.quantity
            FROM Payments pay
            JOIN Orders o ON pay.order_id = o.order_id
            JOIN Users u ON o.user_id = u.user_id
            JOIN Order_Items oi ON o.order_id = oi.order_id
            JOIN Products p ON oi.product_id = p.product_id
            WHERE p.farmer_id = ?
            GROUP BY pay.payment_id
            ORDER BY pay.payment_date DESC";

    $stmt = mysqli_prepare($this->conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $farmerId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $payments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
    return $payments;
}

}
?>
