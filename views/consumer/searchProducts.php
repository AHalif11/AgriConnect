<?php
require_once "../../models/db.php";
require_once "../../controllers/ConsumerController.php";

$controller = new ConsumerController($conn);
$q = isset($_GET['q']) ? trim($_GET['q']) : "";

// If search term is empty, fetch all products
if ($q === "") {
    $products = $controller->getProducts();
} else {
    $stmt = $conn->prepare("SELECT * FROM Products WHERE name LIKE ? OR category LIKE ? ORDER BY created_at DESC");
    $searchTerm = "%" . $q . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="../../uploads/<?php echo htmlspecialchars($product['image']); ?>" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p class="price"><?php echo number_format($product['price'],2); ?> TK</p>
            <a href="productDetails.php?id=<?php echo $product['product_id']; ?>" class="view-btn">View Details</a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align:center; width:100%;">No products found.</p>
<?php endif; ?>
