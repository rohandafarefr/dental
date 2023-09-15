<!DOCTYPE html>
<html>
<head>
    <title>Login - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="frontend/css/style.css">
</head>
<body>
    <?php include 'header.php'?>
    <div class="login-section">
        <h2>User Login</h2>
        <?php
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            echo '<p class="error-message">Invalid username or password. Please try again.</p>';
        }
        ?>
        <form class="login-form" action="backend/login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>
