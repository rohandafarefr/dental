<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .confirmation-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }

        .button-container a:hover {
            background-color: #2980b9;
        }
        .button-container button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h2>Booking Confirmation</h2>
        <p>Patient Name: <?php echo isset($_GET['patient_name']) ? htmlspecialchars($_GET['patient_name']) : 'N/A'; ?></p>
        <p>Phone Number: <?php echo isset($_GET['phone_number']) ? htmlspecialchars($_GET['phone_number']) : 'N/A'; ?></p>
        <p>Selected Services: <?php echo isset($_GET['services']) ? htmlspecialchars($_GET['services']) : 'N/A'; ?></p>
        <p>Appointment Date: <?php echo isset($_GET['appointment_date']) ? htmlspecialchars($_GET['appointment_date']) : 'N/A'; ?></p>
        <p>Appointment Time: <?php echo isset($_GET['appointment_time']) ? htmlspecialchars($_GET['appointment_time']) : 'N/A'; ?></p>
        <div class="button-container">
            <a href="index.php">Back to Home</a>
            <button onclick="window.print()">Print Confirmation</button>
        </div>

    </div>
</body>
</html>
