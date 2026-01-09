<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Contact Us</title>
<link rel="stylesheet" href="style.css">
<style>
.contact-section {
    padding: 60px 20px;
    background-color: #fff5e6;
    text-align: center;
}
.contact-section h2 {
    font-size: 2.5rem;
    color: #d81e05;
    margin-bottom: 40px;
}
.contact-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px;
}
.contact-info {
    max-width: 400px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: #333;
}
.contact-info p { margin-bottom: 15px; }
.contact-form-wrapper {
    max-width: 500px;
    width: 100%;
    background-color: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.contact-form-wrapper form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 1rem;
}
.contact-form-wrapper form button {
    background-color: #d81e05;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s;
}
.contact-form-wrapper form button:hover {
    background-color: #b71c1c;
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
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="backend/logout.php" class="btn-login">Logout</a>
        <?php else: ?>
            <a href="backend/login.php" class="btn-login">Login</a>
        <?php endif; ?>
    </nav>
</div>
</header>

<section class="contact-section container">
<h2>Contact Us</h2>
<div class="contact-content">
    <div class="contact-info">
        <p>Have a question or feedback? Reach out to us and we’ll get back to you soon.</p>
        <p><strong>Phone:</strong> +94 77 123 4567</p>
        <p><strong>Email:</strong> support@pizzahut.lk</p>
        <p><strong>Address:</strong> 123 Pizza Street, Colombo, Sri Lanka</p>
    </div>
    <div class="contact-form-wrapper">
        <form action="backend/contact_process.php" method="POST">
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>
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
