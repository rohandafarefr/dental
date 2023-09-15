<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - Dental Clinic Appointment Booking System</title>
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
        }

        .dashboard-section {
            width: 1000px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }
        .slider-container {
            overflow: hidden;
            margin-bottom: 30px;
            width: 100%; 
        }

        .slider-images {
            display: flex;
            animation: slideAnimation 15s linear infinite; 
            width: 500%; 
        }

        .slider-image {
            width: 20%;
            max-width: 100%;
            height: auto;
        }

        @keyframes slideAnimation {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-80%); 
            }
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button-container a, .button-container button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .button-container a:hover, .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }
    $username = $_SESSION['username'];
    ?>

  <?php include 'header.php'?>

    <main>
        <section class="dashboard-section">
            <h2>Hello, <?php echo $username; ?></h2>

            <div class="slider-container">
                <div class="slider-images">
                    <img class="slider-image" src="../images/image.jpg" alt="Image 1">
                    <img class="slider-image" src="../images/image (1).jfif" alt="Image 2">
                    <img class="slider-image" src="../images/image (2).jfif" alt="Image 3">
                    <img class="slider-image" src="../images/image (3).jfif" alt="Image 4">
                    <img class="slider-image" src="../images/image (4).jfif" alt="Image 5">
                </div>
            </div>

            <div class="button-container">
                <a href="book_appointment.php">Book Appointment</a>
            </div>
        </section>
    </main>
</body>
</html>
