<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql_insert_contact = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    $result_insert_contact = mysqli_query($conn, $sql_insert_contact);

    if ($result_insert_contact) {
        header('Location: contact.php?success=1');
        exit;
    } else {
        header('Location: contact.php?error=1');
        exit;
    }
}
?>
