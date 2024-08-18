<?php
include('connectDB.php');

// Join the attendance and students tables to get the student's name
$sql = "SELECT attendance.id, attendance.fingerprint_id, students.name, attendance.date, attendance.login_time, attendance.logout_time 
        FROM attendance 
        INNER JOIN students ON attendance.fingerprint_id = students.fingerprint_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance Records</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Fingerprint ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Login Time</th>
                <th>Logout Time</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fingerprint_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['login_time']}</td>
                            <td>{$row['logout_time']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No attendance records</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
