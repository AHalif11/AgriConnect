<h2>Product Management</h2>

<!-- Add Product -->
<form method="POST" action="farmerDashboard.php?section=products" enctype="multipart/form-data">
  <input type="hidden" name="action" value="add_product">

  <input type="text" name="name" placeholder="Product Name" required><br><br>
  <textarea name="description" placeholder="Product Description" required></textarea><br><br>
  <input type="number" step="0.01" name="price" placeholder="Price" required><br><br>
  <input type="number" name="stock" placeholder="Stock" required><br><br>

  <select name="category" required>
    <option value="vegetable">Vegetable</option>
    <option value="fruit">Fruit</option>
    <option value="grain">Grain</option>
    <option value="dairy">Dairy</option>
    <option value="meat">Meat</option>
    <option value="fish">Fish</option>
    <option value="grocery">Grocery</option>
  </select><br><br>

  <input type="file" name="image" accept="image/*" required><br><br>

  <button type="submit">Add Product</button>
</form>

<hr>

<!-- Search -->
<form method="GET" action="farmerDashboard.php?section=products">
  <input type="hidden" name="action" value="search_product">
  <input type="text" name="keyword" placeholder="Search product">
  <button type="submit">Search</button>
</form>

<hr>

<!-- Product Table -->
<table border="1" cellpadding="5">
  <tr>
    <th>Product ID</th><th>Name</th><th>Description</th><th>Price</th><th>Stock</th><th>Category</th><th>Image</th><th>Action</th>
  </tr>
  <?php if (!empty($products)) { ?>
    <?php foreach($products as $p): ?>
      <tr>
        <td><?php echo $p['product_id']; ?></td>
        <td><?php echo htmlspecialchars($p['name']); ?></td>
        <td><?php echo htmlspecialchars($p['description']); ?></td>
        <td><?php echo $p['price']; ?></td>
        <td><?php echo $p['stock']; ?></td>
        <td><?php echo $p['category']; ?></td>
        <td>
          <?php if (!empty($p['image'])): ?>
            <img src="../../uploads/<?php echo $p['image']; ?>" width="60">
          <?php else: ?>
            No Image
          <?php endif; ?>
        </td>
        <td>
          <form method="POST" action="farmerDashboard.php?section=products" style="display:inline;">
            <input type="hidden" name="action" value="delete_product">
            <input type="hidden" name="product_id" value="<?php echo $p['product_id']; ?>">
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php } else { ?>
      <tr><td colspan="8">No products found</td></tr>
  <?php } ?>
</table>
