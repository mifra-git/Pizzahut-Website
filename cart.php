<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$total_amount = 0;

// Redirect to login only when placing order
$place_order_redirect = false;
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])){
    if(!isset($_SESSION['user_id'])){
        $place_order_redirect = true;
    } else {
        header("Location: backend/place_order.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Cart</title>
<link rel="stylesheet" href="style.css">
<style>
.cart-section { padding: 40px 0; }
.cart-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
.cart-card { border: 1px solid #ddd; padding: 15px; border-radius: 10px; text-align: center; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);}
.cart-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 10px; margin-bottom: 10px; }
.cart-card h3 { margin: 10px 0; font-size: 1.2em; }
.cart-card p { margin: 5px 0; }
.cart-total { margin-top: 30px; text-align: right; font-size: 1.2em; }
.cart-total button { background: #ff3c3c; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
.cart-total button:hover { background: #e63232; }
</style>
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

<section class="cart-section container">
<h2>Your Order</h2>
<div class="cart-grid">
<?php
if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $item){
        $subtotal = $item['price'] * $item['quantity'];
        $total_amount += $subtotal;

        // Map item names to exact image filenames
        $image_map = [
            "Margherita Pizza"=>"js/images/margherita.jpg",
            "Pepperoni Pizza"=>"js/images/pepperoni.jpg",
            "Veggie Delight"=>"js/images/veggie_delight.jpg",
            "BBQ Chicken Pizza"=>"js/images/bbq_chicken.jpg",
            "Hawaiian Pizza"=>"js/images/hawaiian.jpg",
            "Cheese Lovers"=>"js/images/cheese_lovers.jpg",
            "Meat Lovers"=>"js/images/Meat Lovers.jpg",
            "Supreme Pizza"=>"js/images/Supreme Pizza.jpg",
            "Spaghetti Bolognese"=>"js/images/Spaghetti Bolognese.jpg",
            "Creamy Alfredo Pasta"=>"js/images/Creamy Alfredo Pasta.jpg",
            "Penne Arrabiata"=>"js/images/Penne Arrabiata.jpg",
            "Garlic Bread"=>"js/images/Garlic Bread.jpg",
            "Chicken Wings"=>"js/images/Chicken Wings.jpg",
            "Coca Cola"=>"js/images/Coca Cola.jpg",
            "Orange Juice"=>"js/images/Orange Juice.jpg",
            "Chocolate Lava Cake"=>"js/images/Chocolate Lava Cake.jpg",
            "Ice Cream Sundae"=>"js/images/Ice Cream Sundae.jpg"
        ];

        $img_src = isset($image_map[$item['item']]) ? $image_map[$item['item']] : 'js/images/default.jpg';

        echo '<div class="cart-card">';
        echo '<img src="'.$img_src.'" alt="'.$item['item'].'">';
        echo '<h3>'.$item['item'].'</h3>';
        echo '<p>Price: $'.$item['price'].'</p>';
        echo '<p>Quantity: '.$item['quantity'].'</p>';
        echo '<p>Subtotal: $'.number_format($subtotal,2).'</p>';
        echo '</div>';
    }
} else {
    echo '<p>Your cart is empty. <a href="menu.php">Go back to menu</a></p>';
}
?>
</div>

<?php if(!empty($_SESSION['cart'])){ ?>
<div class="cart-total">
    <h3>Total Amount: $<?php echo number_format($total_amount,2); ?></h3>
    <?php if($place_order_redirect){ ?>
        <p>Please <a href="backend/login.php">login</a> to place your order.</p>
    <?php } else { ?>
        <form method="POST">
            <button type="submit" name="place_order">Place Order</button>
        </form>
    <?php } ?>
</div>
<?php } ?>

</section>

<footer>
<div class="container footer-container">
    <p>&copy; 2025 PizzaHut. All Rights Reserved.</p>
</div>
</footer>
</body>
</html>
