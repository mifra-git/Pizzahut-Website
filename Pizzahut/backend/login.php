<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PizzaHut Login</title>
<link rel="stylesheet" href="../style.css">
<style>
/* Login Page Styles */
body {
    background-color: #fdf2f2;
}

.login-section {
    max-width: 400px;
    margin: 80px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    text-align: center;
}

.login-section h2 {
    color: #d71a1a;
    margin-bottom: 20px;
    font-size: 28px;
}

.login-section label {
    display: block;
    text-align: left;
    margin: 10px 0 5px;
    font-weight: 500;
}

.login-section input[type="email"],
.login-section input[type="password"],
.login-section input[type="text"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

.login-section button {
    width: 100%;
    background-color: #d71a1a;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
    margin-bottom: 10px;
}

.login-section button:hover {
    background-color: #a51414;
}

/* Register Link */
.login-section .register-link {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #d71a1a;
    text-decoration: none;
}

.login-section .register-link:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<!-- Header -->
<header>
  <div class="container header-container">
    <h1 class="logo">PizzaHut</h1>
    <nav>
      <a href="../index.html">Home</a>
      <a href="menu.php">Menu</a>
      <a href="../about.html">About</a>
      <a href="../contact.php">Contact</a>
    </nav>
  </div>
</header>

<!-- Login Section -->
<section class="login-section container">
  <h2>Login</h2>
  <form action="login_process.php" method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>

  <a href="register.php" class="register-link">Don't have an account? Register here</a>
</section>


</body>
</html>
