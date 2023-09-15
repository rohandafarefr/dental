<?php
require_once '../../backend/config.php';

$sql_todays_appointments = "SELECT * FROM appointments WHERE DATE(created_at) = CURDATE()";
$result_todays_appointments = mysqli_query($conn, $sql_todays_appointments);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Today's Appointments - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2><?php echo date('F j, Y'); ?>'s Appointments</h2>

    <?php if (mysqli_num_rows($result_todays_appointments) > 0) { ?>
        <table>
            <tr>
                <th>No.</th>
                <th>Status</th>
                <th>Patient Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            $serial_number = 1;
            while ($row = mysqli_fetch_assoc($result_todays_appointments)) { ?>
                <tr>
                    <td><?php echo $serial_number++; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td><?php echo $row['appointment_time']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No appointments found for today.</p>
    <?php } ?>

    <script>
        window.onload = function () {
            window.print();
        }
    </script>
</body>
</html>
