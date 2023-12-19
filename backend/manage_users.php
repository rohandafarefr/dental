<!DOCTYPE html>
<html>
<head>
    <title>Manage Users - Dental Clinic Appointment Booking System</title>
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            margin-right: auto;
            margin-left: auto;
            width: 70%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #000;
        }

        th {
            background-color: #ffffff;
        }

        .edit-form {
            display: inline-block;
            margin-right: 10px;
        }

        .edit-form label, .edit-form input {
            display: block;
            margin-bottom: 10px;
        }

        .edit-form input {
            width: 200px;
            padding: 5px;
        }

        .edit-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
        }

        .edit-form button:hover {
            background-color: #45a049;
        }

        .delete-form button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
        }

        .delete-form button:hover {
            background-color: #d32f2f;
        }

        .delete-button{
            background-color: #F44336;
            color: white;
            border: none;
            width: 190px;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }
        .add-form {
            margin: 20px auto;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #ffffff;
            margin-bottom: 30px;
        }

        .add-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-form form {
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }

        .add-form label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .add-form input[type="text"],
        .add-form input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .add-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-form button:hover {
            background-color: #45a049;
        }


    </style>
</head>
<body>
    <?php include 'header.php'?>
    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php
        require_once 'config.php';
        $sql_users = "SELECT * FROM users";
        $result_users = mysqli_query($conn, $sql_users);
        if (mysqli_num_rows($result_users) > 0) {
            while ($row = mysqli_fetch_assoc($result_users)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td>
                        <div class="edit-form">
                            <form action="handle_user.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <label for="new_username">New Username:</label>
                                <input type="text" id="new_username" name="new_username" required>
                                <label for="new_password">New Password:</label>
                                <input type="password" id="new_password" name="new_password" required>
                                <button type="submit" name="edit_user">Save Changes</button>
                            </form>
                        </div>
                        <form action="handle_user.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_user" class="delete-button">Delete User</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td colspan="4">No users found.</td></tr>';
        }
        ?>
    </table>
        <h2>Add New User</h2>
    <div class="add-form">
        <form action="handle_user.php" method="post">
            <label for="new_username">Username:</label>
            <input type="text" id="new_username" name="new_username" required>
            <label for="new_password">Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit" name="add_user">Add User</button>
        </form>
    </div>
</body>
</html>
