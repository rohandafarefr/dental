<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../frontend/User/index.php');
        exit;
    } else {
        header('Location: ../frontend/User/login.php?error=1');
        exit;
    }
}
?>
