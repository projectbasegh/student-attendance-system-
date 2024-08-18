<?php
// Include the database connection
include('connectDB.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            font-size: 24px;
        }
        .menu {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .menu a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
            font-weight: bold;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
        .content {
            text-align: center;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Attendance System</h1>
        
        <div class="menu">
            <a href="view_students.php">View Enrolled Students</a>
            <a href="view_attendance.php">View Attendance Records</a>
        </div>

        <div class="content">
            <p>Welcome to the Student Attendance System. Use the links above to manage student enrollments and view attendance records.</p>
        </div>
        
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Student Attendance System</p>
        </div>
    </div>
</body>
</html>
