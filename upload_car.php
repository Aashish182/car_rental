<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $car_description = $_POST['car_description'];
    $car_price = $_POST['car_price'];
    $uploaded_by = $_SESSION['username']; // Assign the logged-in user

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["car_image"]["name"]);
    move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file);

    $image_name = basename($_FILES["car_image"]["name"]);

    $query = "INSERT INTO cars (car_name, car_description, car_price, car_image, uploaded_by) 
              VALUES ('$car_name', '$car_description', '$car_price', '$image_name', '$uploaded_by')";
    
    if (mysqli_query($conn, $query)) {
        echo "Car uploaded successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form action="upload_car.php" method="post" enctype="multipart/form-data">
    <head>
    <link rel="stylesheet" href="styles.css">
    </head>
    <input type="text" name="car_name" placeholder="Car Name" required>
    <textarea name="car_description" placeholder="Car Description" required></textarea>
    <input type="number" name="car_price" placeholder="Price per day" required>
    <input type="file" name="car_image" required>
    <button type="submit">Upload Car</button>
</form>
