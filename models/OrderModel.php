<?php
class OrderModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fetch all orders for a specific user
    public function getOrdersByUserId($userId) {
        $sql = "SELECT order_id, total_amount, status, order_date FROM Orders WHERE user_id=? ORDER BY order_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
