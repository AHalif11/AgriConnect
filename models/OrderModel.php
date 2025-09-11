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

    private function generateOrderId() {
        $sql = "SELECT order_id FROM Orders ORDER BY order_id DESC LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $lastId = intval(substr($row['order_id'], 1));
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }
        return "O" . str_pad($newId, 3, "0", STR_PAD_LEFT);
    }

    private function generateOrderItemId() {
        $sql = "SELECT order_item_id FROM Order_Items ORDER BY order_item_id DESC LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $lastId = intval(substr($row['order_item_id'], 2));
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }
        return "OI" . str_pad($newId, 3, "0", STR_PAD_LEFT);
    }

    public function createOrder($userId, $cartItems, $totalAmount) {
        if (empty($cartItems)) return false;

        $orderId = $this->generateOrderId();

        $sqlOrder = "INSERT INTO Orders (order_id, user_id, total_amount) VALUES (?, ?, ?)";
        $stmtOrder = mysqli_prepare($this->conn, $sqlOrder);
        mysqli_stmt_bind_param($stmtOrder, "ssd", $orderId, $userId, $totalAmount);
        mysqli_stmt_execute($stmtOrder);

        foreach ($cartItems as $item) {
            $orderItemId = $this->generateOrderItemId();
            $sqlItem = "INSERT INTO Order_Items (order_item_id, order_id, product_id, quantity, price) 
                        VALUES (?, ?, ?, ?, ?)";
            $stmtItem = mysqli_prepare($this->conn, $sqlItem);
            mysqli_stmt_bind_param($stmtItem, "sssii", $orderItemId, $orderId, $item['product_id'], $item['quantity'], $item['price']);
            mysqli_stmt_execute($stmtItem);
        }

        return $orderId;
    }

    
}

?>
