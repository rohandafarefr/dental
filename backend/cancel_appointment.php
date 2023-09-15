<?php
require_once 'config.php';

if (isset($_POST['appointment_id'])) {
    $appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
    $sql_delete_appointment = "DELETE FROM appointments WHERE id = '$appointment_id'";
    $result_delete_appointment = mysqli_query($conn, $sql_delete_appointment);

    if ($result_delete_appointment) {  
        header('Location: appointment.php?success=1');
        exit;
    } else {
        header('Location: appointment.php?error=1');
        exit;
    }
} else {
    header('Location: appointment.php');
    exit;
}
?>
