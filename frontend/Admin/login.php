<!DOCTYPE html>
<html>
<head>
    <title>Login - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <nav>
        <h1>Dr. Dev Clinic - Admin</h1>
    </nav>
</header>

    <main>
        <section class="login-section login-form">
            <h2>Admin Login</h2>
            <form action="../../backend/admin_login_process.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </section>
    </main>

    <!-- <?php include 'footer.php'; ?> -->
</body>
</html>
