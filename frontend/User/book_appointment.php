<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            
        }

        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        select,
        label[for="terms"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .services-checkboxes label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Book an Appointment</h2>
        <br>
        <form action="../../backend/book_appointment_process.php" method="post">
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required>

            <label>Services:</label>
            <div class="services-checkboxes">
                <label>
                    <input type="checkbox" name="services[]" value="Tooth Whitening">
                    Tooth Whitening
                </label>
                <label>
                    <input type="checkbox" name="services[]" value="Dental Implants">
                    Dental Implants
                </label>
                <label>
                    <input type="checkbox" name="services[]" value="Root Canal Treatment">
                    Root Canal Treatment
                </label>
                <label>
                    <input type="checkbox" name="services[]" value="Teeth Cleaning">
                    Teeth Cleaning
                </label>
                <label>
                    <input type="checkbox" name="services[]" value="Orthodontics">
                    Orthodontics
                </label>
                <label>
                    <input type="checkbox" name="services[]" value="Wisdom Teeth Removal">
                    Wisdom Teeth Removal
                </label>
            </div>

            <label for="appointment_date">Select Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>

            <label for="appointment_time">Select Time:</label>
            <input type="time" id="appointment_time" name="appointment_time" required>

            <label>
                <input type="checkbox" name="terms" id="terms" required>
                I agree to the terms and conditions.
            </label>

            <button type="submit" name="book_appointment">Book Appointment</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>