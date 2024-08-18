<?php
include('connectDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fingerprint_id = $_POST['fingerprint_id'];
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];

    $sql = "INSERT INTO students (fingerprint_id, name, student_id) VALUES ('$fingerprint_id', '$name', '$student_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Student enrolled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
