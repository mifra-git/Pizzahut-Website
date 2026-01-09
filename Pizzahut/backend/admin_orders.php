<?php
include 'db.php';

$result = mysqli_query($conn,
    "SELECT orders.*, users.name, users.phone
     FROM orders
     JOIN users ON orders.user_id = users.id
     ORDER BY order_date DESC");
?>

<h2>All Orders</h2>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div style="border:1px solid black; padding:10px; margin:10px;">
        <p><strong>Customer:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
        <p><strong>Order:</strong> <?php echo $row['order_details']; ?></p>
        <p><strong>Total:</strong> Rs. <?php echo $row['total']; ?></p>
        <small><?php echo $row['order_date']; ?></small>
    </div>
<?php } ?>
