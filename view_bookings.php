<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$query = "SELECT cars.car_name, cars.car_image, cars.car_price FROM bookings INNER JOIN cars ON bookings.car_id = cars.id WHERE bookings.username = '$username'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My Bookings</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <section id="bookings">
        <h2>Your Booked Cars</h2>
        <div id="cars-container">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class='car-item'>
                    <img src='uploads/<?php echo $row['car_image']; ?>' alt='Car Image'>
                    <h3><?php echo $row['car_name']; ?></h3>
                    <p>Price: $<?php echo $row['car_price']; ?> per day</p>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>