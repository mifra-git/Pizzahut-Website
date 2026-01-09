<?php
session_start();
include 'db.php'; // Make sure this path is correct

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        $user = $result->fetch_assoc();

        // Verify password (if stored as hashed use password_verify)
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to home page
            header("Location: ../index.html"); // Adjust if index.php
            exit();
        } else {
            // Wrong password
            $_SESSION['login_error'] = "Invalid password!";
            header("Location: ../backend/login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "Email not registered!";
        header("Location: ../backend/login.php");
        exit();
    }
} else {
    // If not POST request
    header("Location: ../backend/login.php");
    exit();
}
?>
