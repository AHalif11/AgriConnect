<?php
class CartModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getCartForUser($userId) {
        $sql = "SELECT c.*, p.name AS product_name, p.price
                FROM Cart c
                JOIN Products p ON c.product_id = p.product_id
                WHERE c.user_id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $items = [];
        while($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
        return $items;
    }
}
?>
