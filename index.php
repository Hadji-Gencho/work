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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            display: flex;
            margin: 20px;
        }
        .main-content {
            flex: 3;
            margin-right: 20px;
        }
        .sidebar {
            flex: 1;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .news-article {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .news-article h2 {
            margin-top: 0;
        }
        .news-article p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header>
        <h1>News Page</h1>
    </header>
    <div class="container">
        <div class="main-content">
            <div class="news-article">
                <h2>Article Title 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan tortor. Nullam vehicula, justo at bibendum tincidunt, libero erat facilisis urna, at tincidunt libero erat a justo.</p>
            </div>
            <div class="news-article">
                <h2>Article Title 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan tortor. Nullam vehicula, justo at bibendum tincidunt, libero erat facilisis urna, at tincidunt libero erat a justo.</p>
            </div>
        </div>
        <div class="sidebar">
            <h3>Recent News</h3>
            <ul>
                <li><a href="#">Recent News 1</a></li>
                <li><a href="#">Recent News 2</a></li>
                <li><a href="#">Recent News 3</a></li>
            </ul>
        </div>
    </div>



    <!-- start on-line section -->
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

        <!-- end on-line section  -->


</body>
</html>
