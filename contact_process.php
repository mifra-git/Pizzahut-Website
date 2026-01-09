<?php
session_start();
include 'db.php';

// Get user_id if logged in, else NULL
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $message = trim($_POST['message']);

    if(!empty($message)){
        $stmt = $conn->prepare("INSERT INTO contacts (user_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $message);
        $stmt->execute();
        $stmt->close();

        // Redirect to success page
        header("Location: contact_success.php");
        exit();
    } else {
        header("Location: ../contact.php");
        exit();
    }
}
?>
