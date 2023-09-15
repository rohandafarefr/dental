<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql_check_username = "SELECT * FROM users WHERE username = '$username'";
    $result_check_username = mysqli_query($conn, $sql_check_username);

    if (mysqli_num_rows($result_check_username) > 0) {
        header('Location: signup.php?error=1');
        exit;
    } else {
        $sql_insert_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $result_insert_user = mysqli_query($conn, $sql_insert_user);

        if ($result_insert_user) {
            header('Location: ../login.php?success=1');
            exit;
        } else {
            header('Location: signup.php?error=2');
            exit;
        }
    }
}
?>
