<?php
session_start();
include 'db_connect.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="upload_car.php">Upload Car</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <section>
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <h3>Your Uploaded Cars:</h3>
        <div id="cars-container">
            <?php
                $query = "SELECT * FROM cars WHERE uploaded_by = '$username' ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='car-item'>";
                    echo "<img src='uploads/" . $row['car_image'] . "' alt='Car Image'>";
                    echo "<h3>" . $row['car_name'] . "</h3>";
                    echo "<p>" . $row['car_description'] . "</p>";
                    echo "<p>Price: $" . $row['car_price'] . " per day</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>