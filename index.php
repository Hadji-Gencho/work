<?php
session_start();

// Sample products
$products = [
    1 => ["name" => "Product 1", "price" => 10.00],
    2 => ["name" => "Product 2", "price" => 20.00],
    3 => ["name" => "Product 3", "price" => 30.00],
];

// Initialize shopping cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($products[$product_id])) {
        $_SESSION['cart'][$product_id] = $products[$product_id];
    }
}

// Remove from cart
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Shop</title>
</head>
<body>
    <h1>Welcome to Our Online Shop</h1>

    <h2>Products</h2>
    <ul>
        <?php foreach ($products as $id => $product): ?>
            <li>
                <?php echo $product['name']; ?> - $<?php echo number_format($product['price'], 2); ?>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $id => $product): ?>
            <li>
                <?php echo $product['name']; ?> - $<?php echo number_format($product['price'], 2); ?>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit" name="remove_from_cart">Remove from Cart</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
