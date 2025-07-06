<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PMCH Hospital</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; scroll-behavior: smooth; }
        .header { background: #007bff; padding: 15px; color: #fff; position: sticky; top: 0; z-index: 999; }
        .header .logo { font-size: 24px; color: #fff; text-decoration: none; }
        .navbar a { margin: 0 15px; color: white; text-transform: capitalize; text-decoration: none; }
        .section { padding: 60px 20px; }
        h2 { margin-bottom: 20px; color: #007bff; }
    </style>
</head>
<body>

<!-- Header -->
<header class="header d-flex justify-content-between align-items-center">
    <a href="#" class="logo"><i class="fas fa-heartbeat"></i> <strong>PMCH</strong> Hospital</a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#services">services</a>
        <a href="#doctors">doctors</a>
        <a href="#appointment">appointment</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
    </nav>
</header>

<!-- Home Section -->
<section id="home" class="section text-center bg-light">
    <h2>Welcome to PMCH Hospital</h2>
    <p>Your health, our priority.</p>
</section>


<!-- About Section -->
<section id="about" class="section">
    <div class="container">
        <h2>About Us</h2>

        <!-- Temporary test to check if image is showing -->
        <img src="images/about.png.jpg" alt="Test Image" width="300">

        <?php
        $result = mysqli_query($conn, "SELECT * FROM about LIMIT 1");
        if ($row = mysqli_fetch_assoc($result)) {
            echo "<h4>{$row['title']}</h4>";
            echo "<p>{$row['description']}</p>";
          
        } else {
            echo "<p>No about information found.</p>";
        }
        ?>
    </div>
</section>



<!-- Services Section -->
<section id="services" class="section bg-light">
    <div class="container">
        <h2>Our Services</h2>
        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM services");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-4'>
                        <div class='card p-3 mb-3 text-center'>
                            <i class='{$row['icon']} fa-2x mb-2'></i>
                            <h5>{$row['name']}</h5>
                            <p>{$row['description']}</p>
                        </div>
                      </div>";
            }
            ?>
        </div>
    </div>
</section>


<!-- Doctors Section -->
<section id="doctors" class="section">
    <div class="container">
        <h2>Our Doctors</h2>
        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM doctors");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-3'>
                        <div class='card text-center mb-4'>
                            <img src='{$row['image']}' class='card-img-top' alt='{$row['name']}'>
                            <div class='card-body'>
                                <h5>{$row['name']}</h5>
                                <p>{$row['specialization']}</p>
                                <small>{$row['bio']}</small>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</section>

<!-- Appointment Section -->
<section id="appointment" class="section bg-light">
    <div class="container">
        <h2>Book Appointment</h2>
        <form method="POST" action="save_appointment.php">
            <div class="row">
                <div class="col-md-4"><input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required></div>
                <div class="col-md-4"><input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required></div>
                <div class="col-md-4"><input type="tel" name="phone" class="form-control mb-3" placeholder="Phone" required></div>
                <div class="col-md-6"><input type="date" name="date" class="form-control mb-3" required></div>
                <div class="col-md-6"><input type="time" name="time" class="form-control mb-3" required></div>
                <div class="col-12"><textarea name="message" class="form-control mb-3" placeholder="Message"></textarea></div>
                <div class="col-12"><button class="btn btn-primary" type="submit">Submit</button></div>
            </div>
        </form>
    </div>
</section>

<!-- Reviews Section -->

<section id="review" class="section bg-light">
    <div class="container">
        <h2>Patient Reviews</h2>
        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM reviews ORDER BY date_posted DESC LIMIT 5");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-6 mb-3'>
                        <div class='border p-3 rounded bg-white'>
                            <strong>{$row['name']}</strong> 
                            <span class='text-warning'>(" . str_repeat("★", $row['rating']) . str_repeat("☆", 5 - $row['rating']) . ")</span>
                            <p class='mt-2'>{$row['comment']}</p>
                            <small class='text-muted'>Posted on: {$row['date_posted']}</small>
                        </div>
                      </div>";
            }
            ?>
        </div>
    </div>
</section>

<!-- Blogs Section -->
<section id="blogs" class="section bg-light">
    <div class="container">
        <h2>Health Blogs</h2> <!-- ✅ This title is already correct -->
        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM blogs ORDER BY posted_on DESC LIMIT 3");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-4 mb-3'>
                        <div class='card h-100'>
                            <img src='{$row['image']}' class='card-img-top' alt='Blog Image' style='height:200px; object-fit:cover;'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$row['title']}</h5>
                                <p class='card-text'>" . substr($row['content'], 0, 100) . "...</p>
                                <small class='text-muted'>Posted on: {$row['posted_on']}</small>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</section>


</body>
</html>
