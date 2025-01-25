<?php
session_start();
@include 'config.php';

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
  // Destroy the session
  session_unset();
  session_destroy();

  // Redirect to login page
  header("Location: loginReg.php");
  exit;
}
// Check if the renter is logged in
if (isset($_SESSION['admin_name'])) {
    $username = $_SESSION['admin_name'];

} else {
  header("Location: loginReg.php"); // Redirect to login if no session
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/ownerDash.css">
    <script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module"
  ></script>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<body>

<header id="header">
    <nav class="navbar">
        <h1 class="logo">RentLab</h1>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#more">More</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        
        <?php if ($username): ?>
            <!-- Display username and logout button -->
            <span style="color: white; margin-right: 10px;">Hi, <?php echo htmlspecialchars($username); ?> </span>
            <a style="color: white; text-decoration: none; padding: 10px;" 
       href="?action=logout" 
       onmouseover="this.style.color='#f13a11'" 
       onmouseout="this.style.color='white'">Logout</a>
        <?php else: ?>
            <!-- Display Login/Register link if not logged in -->
            <a style="color: white; text-decoration: none;" href="file/loginReg.php" 
               onmouseover="this.style.color='#f13a11'" onmouseout="this.style.color='white'">Login / Register</a>
        <?php endif; ?>
        
        <div class="icon">
            <ul class="social-icon ml-lg-3">
                <li><a href="https://fb.com/tooplate" class="fab fa-facebook-f"></a></li>
                <li><a href="#" class="fab fa-twitter"></a></li>
                <li><a href="#" class="fab fa-instagram"></a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="container">
<div class="sideview">

</div>
<div class="main">
    <p>Welcome to the Owner Dashboard</p>
    <div class="added">
                <div class="service-item">
            <a href="./House/uploadhouse.php" style="text-decoration: none; color: inherit;">
                <dotlottie-player
                src="https://lottie.host/454bbcf7-5cda-47e5-91e5-1a6e87b1238e/Ui2DA7tjOP.lottie"
                background="transparent"
                speed="1"
                style="width: 150px; height: 150px"
                loop
                autoplay
                ></dotlottie-player>
            </a>
            <a href="./House/uploadhouse.php" style="text-decoration: none; color: inherit;">
                <h3>Upload House</h3>
            </a>
            <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
            </div>
        
            <div class="service-item">
  <a href="./Car/uploadcar.php" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/5e0880fa-f234-46e7-918e-24c7feb496dc/fuFn0umgVY.lottie"
      background="transparent"
      speed="1"
      style="width: 150px; height: 150px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="./Car/uploadcar.php" style="text-decoration: none; color: inherit;">
    <h3>CAR</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>

<div class="service-item">
  <a href="./Laptop/uploadlaptop.php" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/c1b9955d-555e-4a06-97fb-7da0f998458e/4MJi4z8Od7.lottie"
      background="transparent"
      speed="1"
      style="width: 150px; height: 150px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="./Laptop/uploadlaptop.php" style="text-decoration: none; color: inherit;">
    <h3>LAPTOP</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>
    </div>
    
</div>

</div>


    
</body>
</html>