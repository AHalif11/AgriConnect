<?php
class OrderModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Get all orders made by a user
    public function getOrdersForUser($userId) {
        $sql = "SELECT * FROM Orders WHERE user_id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        return $orders;
    }

    // Get all orders where products belong to a farmer
    public function getOrdersForFarmer($farmerId) {
        $sql = "SELECT o.* 
                FROM Orders o
                JOIN Order_Items oi ON o.order_id = oi.order_id
                JOIN Products p ON oi.product_id = p.product_id
                WHERE p.farmer_id = ?
                GROUP BY o.order_id
                ORDER BY o.order_date DESC";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $farmerId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $orders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        return $orders;
    }

    // Get order items for a given order
    public function getOrderItems($orderId) {
        $sql = "SELECT oi.*, p.name AS product_name
                FROM Order_Items oi
                JOIN Products p ON oi.product_id = p.product_id
                WHERE oi.order_id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $orderId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $items = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
        return $items;
    }

    // Update order status
    public function updateOrderStatus($orderId, $status) {
        $sql = "UPDATE Orders SET status=? WHERE order_id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $status, $orderId);
        return mysqli_stmt_execute($stmt);
    }

    
}

?>
