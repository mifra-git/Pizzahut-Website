<?php
session_start();
include 'db.php'; // backend/db.php

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    // Redirect guest to login page
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if cart exists
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    echo "<p>Your cart is empty. <a href='../menu.php'>Go back to menu</a></p>";
    exit();
}

// Insert each cart item into orders table
foreach($_SESSION['cart'] as $item){
    $order_details = $item['item'] . " x" . $item['quantity'];
    $total = $item['price'] * $item['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, order_details, total, order_date) VALUES (?, ?, ?, NOW())");
    if($stmt === false){
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("isd", $user_id, $order_details, $total);
    if(!$stmt->execute()){
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
}

// Clear cart after placing order
unset($_SESSION['cart']);

// Redirect to order success page (in root)
header("Location: ../order_success.php");
exit();
?>
