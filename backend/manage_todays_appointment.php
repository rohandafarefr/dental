<?php
    require_once 'config.php';
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: login.php');
        exit;
    }
    $admin_username = $_SESSION['username'];
    $dateToday = date('Y-m-d');
    $sql_todays_appointments = "SELECT * FROM appointments WHERE DATE(created_at) = '$dateToday'";
    $result_todays_appointments = mysqli_query($conn, $sql_todays_appointments);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Today's Appointments - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/admin.css">
    <link rel="stylesheet" href="../frontend/css/admin_dashboard.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="container">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #ffffff;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #000;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 30px;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #000;
                }

                th {
                    background-color: #ffffff;
                }

                .success-message {
                    color: green;
                    font-weight: bold;
                    text-align: center;
                }

                .error-message {
                    color: red;
                    font-weight: bold;
                    text-align: center;
                }

                .print-button {
                    display: block;
                    width: 150px;
                    margin: 20px auto;
                    padding: 10px;
                    background-color: #3498db;
                    color: #fff;
                    text-align: center;
                    text-decoration: none;
                    border-radius: 5px;
                }

                .print-button:hover {
                    background-color: #2980b9;
                }
                .action-buttons {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                    margin-top: 10px;
                    }

                    .action-buttons button {
                    padding: 8px 12px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 14px;
                    }

                    .action-buttons button.confirm-button {
                    background-color: #2ecc71;
                    color: #fff;
                    }

                    .action-buttons button.cancel-button {
                    background-color: #e74c3c;
                    color: #fff;
                    }


            </style>
            <h2>Manage Today's Appointments</h2>

            <?php if (mysqli_num_rows($result_todays_appointments) > 0) { ?>
                <table>
                    <tr>
                        <th>Patient Name</th>
                        <th>Phone Number</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_todays_appointments)) { ?>
                        <tr>
                            <td><?php echo $row['patient_name']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['appointment_date']; ?></td>
                            <td><?php echo $row['appointment_time']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <form action="handle_appointment.php" method="post">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <button class="action-buttons confirm-button" type="submit" name="confirm_appointment">Confirm</button>
                                    <button class="action-buttons cancel-button"  type="submit" name="cancel_appointment">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <form action="../frontend/Admin/print.php" method="post">
                    <button class="print-button" type="submit">Print Today's Appointments</button>
                </form>
            <?php } else { ?>
                <p>No appointments found for today.</p>
            <?php } ?>
        </section>
    </main>
</body>
</html>
