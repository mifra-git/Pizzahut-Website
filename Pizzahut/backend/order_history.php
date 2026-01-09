<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
    "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC");
?>

<h2>My Orders</h2>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <p><strong>Order:</strong> <?php echo $row['order_details']; ?></p>
        <p><strong>Total:</strong> Rs. <?php echo $row['total']; ?></p>
        <small><?php echo $row['order_date']; ?></small>
    </div>
<?php } ?>
