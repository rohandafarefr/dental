<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];  
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_role'] = 'admin';
        header('Location: ../frontend/Admin/index.php');
        exit;
    } else {
        header('Location: ../frontend/Admin/login.php?error=1');
        exit;
    }
}
?>
