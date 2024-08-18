<?php
include('connectDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fingerprint_id = $_POST['fingerprint_id'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // Check if the student has logged in today
    $check = "SELECT * FROM attendance WHERE fingerprint_id='$fingerprint_id' AND date='$date'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) == 0) {
        // If no login today, insert login time
        $sql = "INSERT INTO attendance (fingerprint_id, date, login_time) VALUES ('$fingerprint_id', '$date', '$time')";
        if (mysqli_query($conn, $sql)) {
            echo "Login time recorded";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // If already logged in, update logout time
        $sql = "UPDATE attendance SET logout_time='$time' WHERE fingerprint_id='$fingerprint_id' AND date='$date'";
        if (mysqli_query($conn, $sql)) {
            echo "Logout time recorded";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
