<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['book_appointment'])) {
        $patient_name = $_POST['patient_name'];
        $phone_number = $_POST['phone_number'];
        $services = implode(', ', $_POST['services']);
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $sql_book_appointment = "INSERT INTO appointments (patient_name, phone_number, services, appointment_date, appointment_time, status) VALUES ('$patient_name', '$phone_number', '$services', '$appointment_date', '$appointment_time', 'Pending')";
        $result_book_appointment = mysqli_query($conn, $sql_book_appointment);
        header('Location: booking_confirmation.php');
        exit;
    }

    if (isset($_POST['confirm_appointment'])) {     
        $appointment_id = $_POST['appointment_id'];
        $sql_confirm_appointment = "UPDATE appointments SET status = 'Confirmed' WHERE id = $appointment_id";
        $result_confirm_appointment = mysqli_query($conn, $sql_confirm_appointment);
        header('Location: manage_appointment.php');
        exit;
    }

   
    if (isset($_POST['cancel_appointment'])) {
        $appointment_id = $_POST['appointment_id'];
        $sql_cancel_appointment = "UPDATE appointments SET status = 'Canceled' WHERE id = $appointment_id";
        $result_cancel_appointment = mysqli_query($conn, $sql_cancel_appointment);
        header('Location: manage_appointment.php');
        exit;
    }

  
    if (isset($_POST['delete_appointment'])) {
        $appointment_id = $_POST['appointment_id'];
        $sql_delete_appointment = "DELETE FROM appointments WHERE id = $appointment_id";
        $result_delete_appointment = mysqli_query($conn, $sql_delete_appointment);
        header('Location: manage_appointment.php');
        exit;
    }
}
?>
