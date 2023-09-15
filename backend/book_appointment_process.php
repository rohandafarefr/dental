<?php
require_once 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$username = $_SESSION['username'];
$sql_get_user_id = "SELECT id FROM users WHERE username = '$username'";
$result_get_user_id = mysqli_query($conn, $sql_get_user_id);

if (!$result_get_user_id) {
    header('Location: book_appointment.php?error=db');
    exit;
}

$user_id = mysqli_fetch_assoc($result_get_user_id)['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_name = $_POST['patient_name'];
    $phone_number = $_POST['phone_number'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $address = $_POST['address']; 
    $selected_datetime = strtotime("$date $time");
    $current_datetime = time();

    if ($selected_datetime < $current_datetime) {
        header('Location: book_appointment.php?error=past');
        exit;
    }

    $selected_services = isset($_POST['services']) ? implode(', ', $_POST['services']) : '';
    $sql_insert_appointment = "INSERT INTO appointments (user_id, patient_name, phone_number, appointment_date, appointment_time, address, services) 
                              VALUES ('$user_id', '$patient_name', '$phone_number', '$appointment_date', '$appointment_time', '$address', '$selected_services')";

    $result_insert_appointment = mysqli_query($conn, $sql_insert_appointment);

    if ($result_insert_appointment) {     
        $services_string = implode(', ', $_POST['services']);    
        header("Location: ../frontend/User/booking_confirmation.php?success=1&patient_name=$patient_name&phone_number=$phone_number&services=$services_string&appointment_date=$appointment_date&appointment_time=$appointment_time");
        exit;
    } else {  
        header("Location: ../frontend/User/booking_confirmation.php?error=2");
        exit;
    }
}
?>
