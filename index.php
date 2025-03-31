<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Service</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Car Rental Service</h1>
        <nav>
    <a href="index.php">Home</a>
    <?php if(isset($_SESSION['username'])): ?>
        <a href="dashboard.php">Dashboard</a>
        <a href="view_bookings.php">My Bookings</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Login</a>
    <?php endif; ?>
</nav>
    </header>

    <section id="car-list">
        <h2>Available Cars</h2>
        <div id="cars-container">
            <?php
                $query = "SELECT * FROM cars ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='car-item'>";
                    echo "<img src='uploads/" . $row['car_image'] . "' alt='Car Image'>";
                    echo "<h3>" . $row['car_name'] . "</h3>";
                    echo "<p>" . $row['car_description'] . "</p>";
                    echo "<p>Price: $" . $row['car_price'] . " per day</p>";
                    echo "<a href='book_car.php?id=".$row['id']."'>Book Now</a>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>
