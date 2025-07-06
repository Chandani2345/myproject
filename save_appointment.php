<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

$sql = "INSERT INTO appointments (name, email, phone, date, time, message)
        VALUES ('$name', '$email', '$phone', '$date', '$time', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
