<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Register</title>
<link rel="stylesheet" href="style.css">
<script src="js/script.js"></script>
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
</nav>
</div>
</header>

<section class="register-section container">
<div class="register-card">
<h2>Create Your Account</h2>
<form action="../backend/register.php" method="post">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="text" name="phone" placeholder="Phone Number" required>
<input type="text" name="number" placeholder="House / NIC Number" required>
<button type="submit">Register</button>
</form>
<p class="login-text">Already have an account? 
<a href="login.php" class="login-btn">Login Here</a>
</p>
</div>
</section>

<footer>
<div class="container footer-container">
<p>&copy; 2025 PizzaHut. All Rights Reserved.</p>
</div>
</footer>
</body>
</html>
