<?php
require_once 'config.php';
$sql_appointments = "SELECT * FROM appointments";
$result_appointments = mysqli_query($conn, $sql_appointments);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Appointment Management - Dental Clinic Appointment Booking System</title>
        <link rel="stylesheet" href="../frontend/css/style.css">
    </head>
<body>
    <?php include '../frontend/Admin/header.php'; ?>
    <main>
        <section class="dashboard-section">
            <h2 class="admin-title">Appointment Management</h2>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                table, th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                button {
                    padding: 8px 12px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-weight: bold;
                    margin-right: 5px;
                }
                button[name="confirm_appointment"] {
                    background-color: #4CAF50;
                    color: white;
                }
                button[name="cancel_appointment"] {
                    background-color: #FFC107;
                    color: white;
                }
                button[name="delete_appointment"] {
                    background-color: #F44336;
                    color: white;
                }
                .success-message {
                    color: green;
                    font-weight: bold;
                }
                .error-message {
                    color: red;
                    font-weight: bold;
                }
                .appointment-management {
                    margin-top: 20px;
                }
            </style>
            <table>
                <tr>
                    <th>Patient Name</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result_appointments)) { ?>
                    <tr>
                        <td><?php echo $row['patient_name']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['appointment_date']; ?></td>
                        <td><?php echo $row['appointment_time']; ?></td>
                        <td>
                            <?php if (isset($row['status'])) {
                                echo $row['status'];
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td>
                            <form action="handle_appointment.php" method="post">
                                <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="confirm_appointment">Confirm</button>
                                <button type="submit" name="cancel_appointment">Cancel</button>
                                <button type="submit" name="delete_appointment">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>
</body>
</html>
