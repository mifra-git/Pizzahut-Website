<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle Add to Cart
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])){
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // Check if item already exists in cart
    $found = false;
    foreach($_SESSION['cart'] as &$cart_item){
        if($cart_item['item'] == $item){
            $cart_item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    if(!$found){
        $_SESSION['cart'][] = [
            'item' => $item,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    header("Location: menu.php");
    exit();
}

// Menu items with exact filenames and descriptions
$menu_items = [
    ["Margherita Pizza","js/images/margherita.jpg", 8.99, "Classic delight with mozzarella, tomatoes, basil."],
    ["Pepperoni Pizza","js/images/pepperoni.jpg",10.99,"Spicy pepperoni with mozzarella and tomato sauce."],
    ["Veggie Delight","js/images/veggie_delight.jpg",9.99,"Bell peppers, onions, olives, and mozzarella."],
    ["BBQ Chicken Pizza","js/images/bbq_chicken.jpg",11.99,"Grilled chicken, BBQ sauce, onions, cheese."],
    ["Hawaiian Pizza","js/images/hawaiian.jpg",11.99,"Ham, pineapple, and mozzarella cheese."],
    ["Cheese Lovers","js/images/cheese_lovers.jpg",11.99,"Mozzarella, cheddar, and tomato sauce."],
    ["Meat Lovers","js/images/Meat Lovers.jpg",12.99,"Pepperoni, sausage, bacon, ham, cheese."],
    ["Supreme Pizza","js/images/Supreme Pizza.jpg",13.99,"Pepperoni, veggies, olives, mushrooms, cheese."],
    ["Spaghetti Bolognese","js/images/Spaghetti Bolognese.jpg",7.99,"Classic Italian pasta with rich meat sauce."],
    ["Creamy Alfredo Pasta","js/images/Creamy Alfredo Pasta.jpg",8.99,"Pasta in creamy white sauce with mushrooms."],
    ["Penne Arrabiata","js/images/Penne Arrabiata.jpg",7.99,"Penne pasta in spicy tomato sauce with herbs."],
    ["Garlic Bread","js/images/Garlic Bread.jpg",3.99,"Freshly baked bread with garlic butter."],
    ["Chicken Wings","js/images/Chicken Wings.jpg",5.99,"Spicy or BBQ chicken wings, 6 pcs."],
    ["Coca Cola","js/images/Coca Cola.jpg",1.99,"Refreshing chilled soft drink, 500ml."],
    ["Orange Juice","js/images/Orange Juice.jpg",2.99,"Freshly squeezed orange juice, 300ml."],
    ["Chocolate Lava Cake","js/images/Chocolate Lava Cake.jpg",4.99,"Warm chocolate cake with molten center."],
    ["Ice Cream Sundae","js/images/Ice Cream Sundae.jpg",3.99,"Vanilla ice cream with chocolate syrup & cherry."]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Menu</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<div class="container header-container">
    <h1 class="logo">PizzaHut</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="menu.php">Menu</a>
        <a href="cart.php">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
        <a href="about.html">About</a>
        <a href="contact.php">Contact</a>
        <a href="../backend/logout.php" class="btn-login">Logout</a>
    </nav>
</div>
</header>

<section class="menu-section container">
<h2>Our Delicious Menu</h2>
<div class="menu-grid">
<?php
foreach($menu_items as $item){
    echo '<div class="menu-card">';
    echo '<img src="'.$item[1].'" alt="'.$item[0].'">';
    echo '<h3>'.$item[0].'</h3>';
    echo '<p class="menu-desc">'.$item[3].'</p>';
    echo '<p><strong>Price:</strong> $'.$item[2].'</p>';
    echo '<form method="POST">';
    echo '<input type="hidden" name="item" value="'.$item[0].'">';
    echo '<input type="hidden" name="price" value="'.$item[2].'">';
    echo 'Qty: <input type="number" name="quantity" value="1" min="1" max="10">';
    echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
    echo '</form>';
    echo '</div>';
}
?>
</div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-left">
            <h2>PizzaHut</h2>
            <p>Delivering hot, fresh, and quality pizzas worldwide. Join us for a delicious experience!</p>
            <p>&copy; 2025 PizzaHut. All Rights Reserved.</p>
        </div>

        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="footer-social">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Include Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</footer>
</body>
</html>
