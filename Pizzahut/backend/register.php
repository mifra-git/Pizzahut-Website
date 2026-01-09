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
<title>PizzaHut Register</title>
<link rel="stylesheet" href="../style.css">
<style>
/* Register Page Styles */
body {
    background-color: #fdf2f2;
}

.register-section {
    max-width: 400px;
    margin: 60px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    text-align: center;
}

.register-section h2 {
    color: #d71a1a;
    margin-bottom: 20px;
    font-size: 28px;
}

.register-section label {
    display: block;
    text-align: left;
    margin: 10px 0 5px;
    font-weight: 500;
}

.register-section input[type="text"],
.register-section input[type="email"],
.register-section input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
}

.register-section button {
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

.register-section button:hover {
    background-color: #a51414;
}

/* Login Link */
.register-section .login-link {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #d71a1a;
    text-decoration: none;
}

.register-section .login-link:hover {
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
      <a href="../menu.php">Menu</a>
      <a href="../about.html">About</a>
      <a href="../contact.php">Contact</a>
    </nav>
  </div>
</header>

<!-- Register Section -->
<section class="register-section container">
  <h2>Register</h2>
  <form action="register_process.php" method="POST">
    <label>Full Name</label>
    <input type="text" name="name" placeholder="Enter your full name" required>
    
    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>
    
    <label>Password</label>
    <input type="password" name="password" placeholder="Enter password" required>
    
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" placeholder="Confirm password" required>
    
    <button type="submit">Register</button>
  </form>
  <a href="login.php" class="login-link">Already have an account? Login here</a>
</section>

</body>
</html>
