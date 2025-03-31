<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET['id'])) {
    $car_id = $_GET['id'];
    $username = $_SESSION['username'];
    $query = "INSERT INTO bookings (car_id, username) VALUES ('$car_id', '$username')";
    if (mysqli_query($conn, $query)) {
        echo "Booking successful! <a href='index.php'>Go Back</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>
