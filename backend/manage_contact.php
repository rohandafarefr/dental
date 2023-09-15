<?php
    require_once 'config.php';
    session_start();
    if (!isset($_SESSION['username']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: login.php');
        exit;
    }
    $admin_username = $_SESSION['username'];
    $sql_contacts = "SELECT * FROM contacts";
    $result_contacts = mysqli_query($conn, $sql_contacts);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Contact Form Submissions - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/admin.css">
</head>
<body>
    <?php include '../frontend/Admin/header.php'; ?>
    <main>
        <section class="dashboard-section">
            <h2>Manage Contact Form Submissions</h2>
            
            <?php if (mysqli_num_rows($result_contacts) > 0) { ?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_contacts)) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No contact form submissions found.</p>
            <?php } ?>
        </section>
    </main>
</body>
</html>
