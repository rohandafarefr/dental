<!DOCTYPE html>
<html>
<head>
    <title>Signup - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="frontend/css/style.css">
</head>
<body>
    <?php include 'header.php'?>
    <div class="signup-section">
        <h2>Create an Account</h2>
        <?php

        if (isset($_GET['error'])) {
            if ($_GET['error'] === '1') {
                echo '<p class="error-message">Username already exists. Please choose a different username.</p>';
            } elseif ($_GET['error'] === '2') {
                echo '<p class="error-message">Signup failed. Please try again later.</p>';
            }
        } elseif (isset($_GET['success'])) {
            echo '<p class="success-message">Signup successful! Please login to your account.</p>';
        }
        ?>
        <form class="signup-form" action="backend/signup_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
