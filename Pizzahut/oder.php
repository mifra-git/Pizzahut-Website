<?php
session_start();
include '../backend/db.php';

// Redirect if not logged in
if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// If form submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Grab order details and total from POST
    $order_details = $_POST['order_details'] ?? '';
    $total = $_POST['total'] ?? 0;

    // Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, order_details, total, order_date) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("isd", $user_id, $order_details, $total);
    $stmt->execute();
    $stmt->close();

    // Redirect to order success page
    header("Location: order_success.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Order</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>PizzaHut</h1>
    <nav>
        <a href="menu.php">Menu</a>
        <a href="cart.php">Cart</a>
        <a href="../backend/logout.php">Logout</a>
    </nav>
</header>

<section class="order-section container">
    <h2>Placing Your Order...</h2>
    <p>If you are seeing this page, your order will be processed automatically.</p>
</section>
<!-- Footer -->
<footer>
    <div class="container footer-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; padding: 30px 20px; background: #222; color: #fff; border-top: 4px solid #d71a1a; border-radius: 15px 15px 0 0;">
        <!-- Company Info -->
        <div style="flex:1; min-width: 200px; margin-bottom: 15px;">
            <h3 style="margin: 0 0 10px; color: #d71a1a;">PizzaHut</h3>
            <p style="margin: 0; font-size: 14px;">Delivering hot, fresh, and quality pizzas worldwide. &copy; 2025</p>
        </div>

        <!-- Quick Links -->
        <div style="flex:1; min-width: 200px; margin-bottom: 15px;">
            <h4 style="margin-bottom: 10px; color: #fff;">Quick Links</h4>
            <a href="index.html" style="display:block; color:#fff; text-decoration:none; margin-bottom:5px; transition: 0.3s;">Home</a>
            <a href="menu.php" style="display:block; color:#fff; text-decoration:none; margin-bottom:5px; transition: 0.3s;">Menu</a>
            <a href="cart.php" style="display:block; color:#fff; text-decoration:none; margin-bottom:5px; transition: 0.3s;">Cart</a>
            <a href="about.php" style="display:block; color:#fff; text-decoration:none; margin-bottom:5px; transition: 0.3s;">About</a>
            <a href="contact.php" style="display:block; color:#fff; text-decoration:none; transition: 0.3s;">Contact</a>
        </div>

        <!-- Social Media -->
        <div style="flex:1; min-width: 200px; text-align: right; margin-bottom: 15px;">
            <h4 style="margin-bottom: 10px; color:#fff;">Follow Us</h4>
            <div style="display:flex; gap: 15px; justify-content:flex-end;">
                <a href="https://facebook.com" target="_blank" style="color:#fff; font-size:20px; transition:0.3s;"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank" style="color:#fff; font-size:20px; transition:0.3s;"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank" style="color:#fff; font-size:20px; transition:0.3s;"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank" style="color:#fff; font-size:20px; transition:0.3s;"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Include Font Awesome CDN for Social Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
