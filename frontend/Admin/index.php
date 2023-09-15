<?php
require_once '../../backend/config.php';

// Retrieve the total number of appointments
$sql_total_appointments = "SELECT COUNT(*) AS total_appointments FROM appointments";
$result_total_appointments = mysqli_query($conn, $sql_total_appointments);
$total_appointments = mysqli_fetch_assoc($result_total_appointments)['total_appointments'];

// Retrieve the total number of appointments booked today
$sql_total_appointments_today = "SELECT COUNT(*) AS total_appointments_today FROM appointments WHERE DATE(created_at) = CURDATE()";
$result_total_appointments_today = mysqli_query($conn, $sql_total_appointments_today);
$total_appointments_today = mysqli_fetch_assoc($result_total_appointments_today)['total_appointments_today'];
?>
<?php
// Function to check if the admin is logged in
function checkAdminLogin() {
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: login.php');
        exit;
    }
}
checkAdminLogin();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="dashboard-section">
            <h2>Admin Dashboard</h2>
             <div class="dash-con">
                 <div class="total-appointments-today-section">
                     <h3>Appointments Booked Today</h3>
                     <p><?php echo $total_appointments_today; ?></p>
                 </div>
                 <div class="total-appointments-section">
                    <h3>Total Appointments Booked</h3>
                    <p><?php echo $total_appointments; ?></p>
                </div>
             </div>


            <div class="admin-button-container">
                <a href="../../backend/manage_todays_appointment.php" class="admin-button">Manage Today's Appointments</a>
                <a href="../../backend/manage_appointment.php" class="admin-button">Manage All Appointments</a>
                <a href="../../backend/manage_users.php" class="admin-button">Users Management</a>
                <a href="../../backend/manage_contact.php" class="admin-button">Contact Requests</a>
            </div>
        </section>
    </main>
</body>
</html>
