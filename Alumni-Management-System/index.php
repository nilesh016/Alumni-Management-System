<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT-ISM Alumni Association</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="css/header_navigationbar.css">
    <link rel="stylesheet" href="css/index.css">

    <?php include_once "setting/index_navigation.php"; ?>
</head>

<body>

<!-- Hero Section -->
<header class="hero">
    <div class="overlay">
        <h1>Welcome to IIT-ISM Alumni</h1>
        <p>Connecting Alumni, Strengthening Bonds, Building the Future</p>
    </div>
</header>

<!-- Slideshow -->
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="pictures/iit_ism_heritage_1.jpg" width="100%">
        <div class="text">A Legacy of Excellence</div>
    </div>

    <div class="mySlides fade">
        <img src="pictures/friends.jpg" width="100%">
        <div class="text">Strengthening Lifelong Friendships</div>
    </div>

    <div class="mySlides fade">
        <img src="pictures/friends2.jpg" width="100%">
        <div class="text">Your Journey Continues Here...</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- Dots for Slideshow -->
<div class="dots-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

<!-- Welcome Section -->
<section class="welcome">
    <h2>Welcome to IIT-ISM Alumni Network</h2>
    <p>
        Are you missing them? Your coursemates, your squad, your friends who stayed up all night 
        with you for assignments, gatherings, events, and so on?
        <br><br>
        Join the IIT-ISM Alumni Association to reconnect with old friends, stay updated on events, 
        and expand your professional network.
    </p>
</section>

<!-- How to Register Section -->
<section class="howto">
    <h2>How to Register as a Member?</h2>
    <p>Follow these simple steps to become a member of the IIT-ISM Alumni Association.</p>
    <img src="pictures/AlumniDiagram.png" alt="Registration Steps">
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2025 IIT-ISM Dhanbad Alumni Association. All Rights Reserved.</p>
</footer>

<!-- JavaScript -->
<script src="javascript/index.js"></script>

</body>
</html>
