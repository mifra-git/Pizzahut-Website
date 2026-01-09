<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut - Order Success</title>
<link rel="stylesheet" href="style.css">
<style>
/* Additional styling for order success */
.success-section {
    text-align: center;
    padding: 100px 20px;
    background: #fff3e0;
}
.success-section h2 {
    font-size: 2.5em;
    color: #ff3c3c;
    margin-bottom: 20px;
}
.success-section p {
    font-size: 1.2em;
    margin-bottom: 30px;
}
.success-section button {
    background: #ff3c3c;
    color: #fff;
    border: none;
    padding: 15px 30px;
    font-size: 1em;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}
.success-section button:hover {
    background: #e63232;
}
</style>
</head>
<body>

<header>
    <div class="container header-container">
        <h1 class="logo">PizzaHut</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="menu.php">Menu</a>
            <a href="cart.php">Cart</a>
            <a href="about.html">About</a>
            <a href="contact.php">Contact</a>
            <a href="backend/logout.php" class="btn-login">Logout</a>
        </nav>
    </div>
</header>

<section class="success-section">
    <h2>🎉 Order Placed Successfully!</h2>
    <p>Thank you for your order. Your delicious pizza will be delivered soon!</p>
    <button onclick="window.location.href='menu.php'">Back to Menu</button>
</section>

<!-- Modern Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-brand">
      <h2>PizzaHut</h2>
      <p>Hot, fresh, and delicious pizzas delivered to your door.</p>
    </div>

    <div class="footer-links">
      <a href="index.html">Home</a>
      <a href="menu.php">Menu</a>
      <a href="cart.php">Cart</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </div>

    <div class="footer-social">
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2025 PizzaHut. All Rights Reserved.</p>
  </div>
</footer>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</body>
</html>
