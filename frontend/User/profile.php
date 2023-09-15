<?php
    require_once '../../backend/config.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }
    $username = $_SESSION['username'];
    $sql_profile = "SELECT * FROM users WHERE username = '$username'";
    $result_profile = mysqli_query($conn, $sql_profile);
    if (mysqli_num_rows($result_profile) > 0) {
        $row = mysqli_fetch_assoc($result_profile);
        $name = isset($row['name']) ? $row['name'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
        $new_name = $_POST['name'];
        $new_email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $sql_update_profile = "UPDATE users SET username = '$new_name', email = '$new_email', password = '$new_password' 
                            WHERE username = '$username'";
        $result_update_profile = mysqli_query($conn, $sql_update_profile);
    if ($result_update_profile) {
        header('Location: profile.php?success=1');
        exit;
    } else {
        header('Location: profile.php?error=1');
        exit;
    }
}

if (isset($_POST['delete_account'])) {
    $sql_delete_account = "DELETE FROM users WHERE username = '$username'";
    $result_delete_account = mysqli_query($conn, $sql_delete_account);
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="dashboard-section">
            <h2>My Profile</h2>
            <?php if (isset($_GET['success']) && $_GET['success'] === '1') { ?>
                <p class="success-message">Profile updated successfully!</p>
            <?php } elseif (isset($_GET['error']) && $_GET['error'] === '1') { ?>
                <p class="error-message">Error updating profile. Please try again.</p>
            <?php } ?>

            <form action="profile.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $username; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>

                <button type="submit" class="green-button" name="update_profile">Update Profile</button>
            </form>

            <form action="profile.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                <button type="submit" class="red-button" name="delete_account">Delete Account</button>
            </form>
        </section>
    </main>
</body>
</html>
