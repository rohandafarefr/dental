<?php
    require_once '../../backend/config.php';
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
    $user_id_result = mysqli_fetch_assoc($result_get_user_id);
    if ($user_id_result && isset($user_id_result['id'])) {
        $user_id = $user_id_result['id'];
    } else {
        header('Location: book_appointment.php?error=user_id');
        exit;
    }
    $sql_appointments = "SELECT * FROM appointments WHERE user_id = '$user_id'";
    $result_appointments = mysqli_query($conn, $sql_appointments);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Appointments - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="dashboard-section">
            <h2>My Appointments</h2>
            <?php if (mysqli_num_rows($result_appointments) > 0) { ?>
                <table class="table_1">
                    <tr>
                        <th>Submitted on</th>
                        <th>Patient Name</th>
                        <th>Phone Number</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_appointments)) { ?>
                        <tr>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><?php echo $row['patient_name']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['appointment_date']; ?></td>
                            <td><?php echo $row['appointment_time']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No appointments found.</p>
            <?php } ?>
        </section>
    </main>
</body>
</html>
