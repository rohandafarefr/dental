<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_user'])) {
        $user_id = $_POST['user_id'];
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];
        $sql_update_user = "UPDATE users SET username = '$new_username', password = '$new_password' WHERE id = $user_id";
        $result_update_user = mysqli_query($conn, $sql_update_user);
        header('Location: manage_users.php');
        exit;
    }
    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        $sql_delete_user = "DELETE FROM users WHERE id = $user_id";
        $result_delete_user = mysqli_query($conn, $sql_delete_user);
        header('Location: manage_users.php');
        exit;
    }
    if (isset($_POST['add_user'])) {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];
        $sql_add_user = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
        $result_add_user = mysqli_query($conn, $sql_add_user);
        header('Location: manage_users.php');
        exit;
    }
}
?>
