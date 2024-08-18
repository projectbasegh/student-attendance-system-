 <?php
include('connectDB.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];

    $sql = "UPDATE students SET name='$name', student_id='$student_id' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Students</title>
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
        .edit-form {
            display: inline-block;
        }
        .edit-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enrolled Students</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Fingerprint ID</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>Action</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fingerprint_id']}</td>
                            <td>
                                <form class='edit-form' action='view_students.php' method='POST'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <input type='text' name='name' value='{$row['name']}'>
                            </td>
                            <td>
                                    <input type='text' name='student_id' value='{$row['student_id']}'>
                            </td>
                            <td>
                                    <button type='submit' name='edit' class='edit-btn'>Save</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No students enrolled</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
