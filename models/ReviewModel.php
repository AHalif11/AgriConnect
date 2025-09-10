<?php
class ReviewModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getReviewsForFarmer($farmerId) {
        $sql = "SELECT r.*, u.name AS customer_name, p.name AS product_name
                FROM Reviews r
                JOIN Users u ON r.user_id = u.user_id
                JOIN Products p ON r.product_id = p.product_id
                WHERE p.farmer_id = ?
                ORDER BY r.created_at DESC";

        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $farmerId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $reviews = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $reviews[] = $row;
        }
        return $reviews;
    }
}
?>
