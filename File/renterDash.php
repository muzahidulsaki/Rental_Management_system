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
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
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
  <title>Rent Everything</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script
  src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
  type="module"
  ></script>
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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

  <div id="home" class="section">
    <p data-aos="fade-up" data-aos-delay="300">One app, all services at your fingertips.</p>
    <h2 data-aos="fade-up" data-aos-delay="500">RENT YOUR DESIRE THING <br> AT  RENTLAB</h2>
  </div>

  <!-- /*---------------------------------------
     SERVICES              
  -----------------------------------------*/ -->

  <div id="services" class="section">
    <div class="services-container">

    <div class="service-item">
  <a href="house/house.php" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/454bbcf7-5cda-47e5-91e5-1a6e87b1238e/Ui2DA7tjOP.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="house/house.php" style="text-decoration: none; color: inherit;">
    <h3>HOUSE</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>

<div class="service-item">
  <a href="Car/car.php" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/5e0880fa-f234-46e7-918e-24c7feb496dc/fuFn0umgVY.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="Car/car.php" style="text-decoration: none; color: inherit;">
    <h3>CAR</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>

<div class="service-item">
  <a href="Laptop/laptop.php" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/c1b9955d-555e-4a06-97fb-7da0f998458e/4MJi4z8Od7.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="Laptop/laptop.php" style="text-decoration: none; color: inherit;">
    <h3>LAPTOP</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>

      <div class="service-item">
  <a href="your-target-url1.html" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/a821ae87-783f-407d-ba57-c5725076c774/lG6PlTSKuk.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="your-target-url1.html" style="text-decoration: none; color: inherit;">
    <h3>CYCLE</h3>
  </a>
  <p>Worried about which car you will travel in? No worries! View your car details before the journey.</p>
</div>

<div class="service-item">
  <a href="your-target-url2.html" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/f5be5ee2-7c35-46f9-9070-5529e17424ae/zhk0tW3y3C.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="your-target-url2.html" style="text-decoration: none; color: inherit;">
    <h3>MOTOR-BIKE</h3>
  </a>
  <p>Take control of your ride costs. Set your own price and enjoy affordable journeys tailored to your budget.</p>
</div>





<div class="service-item">
  <a href="your-target-url5.html" style="text-decoration: none; color: inherit;">
    <dotlottie-player
      src="https://lottie.host/0391c243-ee54-492e-a16f-483ce335945c/BsqNmUuULn.lottie"
      background="transparent"
      speed="1"
      style="width: 300px; height: 300px"
      loop
      autoplay
    ></dotlottie-player>
  </a>
  <a href="your-target-url5.html" style="text-decoration: none; color: inherit;">
    <h3>CAMERA</h3>
  </a>
  <p>Are you worried about your safety while traveling? Track your ride in real-time for a secure journey.</p>
</div>



    </div>
  </div>
  
  <!-- /*---------------------------------------
     ABOUT US              
  -----------------------------------------*/ -->

  <div id="about" class="section">
    <h2 class="slow-text">About us</h2>
  

    <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="earn-step-content step-reverse">
                  <div class="earn-step-info">
                      <div class="earn-step-inner">
                          <div class="earn-step-title">
                              <div class="earn-step-icon">
                                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/icon-car.png" alt="bike image">
                              </div>
                              <div class="earn-step-title-info">
                                  <h3>
                                      <small>Get going with</small> Rent Lab </h3>
                              </div>
                          </div>
                          <h2><span>01</span> Visit the website </h2>
                          <p>Rent a Car,home and necessary thing Hassle-Free with the Best Rental Services Nearby! Visit RentLab website  and choose the "Rentals" option for convenient and affordable rentals, including options for luxury cars, home, motorbike, camera, laptop and other services near
                              you.</p> <br>
                          <div class="download-button">
                              <a href="https://play.google.com/store/apps/details?id=com.pathao.user&hl=en" target="_blank"><img src="https://pathao.com/wp-content/themes/webpathao/assets/images/play-store.png" alt="google play store"></a>
                              <a href="https://itunes.apple.com/us/app/pathao/id1201700952?mt=8" target="_blank"><img src="https://pathao.com/wp-content/themes/webpathao/assets/images/appstore.png" alt="app store"></a>
                          </div>
                      </div>
                  </div>
                  <div class="earn-step-image step-image-mobile bg-image-alt">
                    <dotlottie-player
                        src="https://lottie.host/bead51f9-68b0-4571-9daf-02b8afc402f1/PWVwnoiyNe.lottie"
                        background="transparent"
                         speed="1"
                         style="width: 250; height: 250"
                         loop
                         autoplay
                    ></dotlottie-player>
                  </div>
              </div>
              <div class="earn-step-mobile-illustration d-lg-none">
                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/step-arrow-mobile.png" alt="step illustration">
              </div>
              <div class="earn-step-illustration step-rotate">
                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/step-illustration.png" alt="step illustration">
              </div>
              <div class="earn-step-content step-2 reorder-mobile step-reverse">
                  <div class="earn-step-image"><img width="620" height="620" src="../images/img4.jpg" title="Request your Car in advance"></div>
                  <div class="earn-step-info">
                      <div class="earn-step-inner">
                          <h2><span>02</span> Request your desire things in advance </h2>
                          <p>Book your rental things in advance and choose the perfect options for your needs. Visit RentLab website  and choose the "Rentals" option for convenient and affordable rentals, including options for luxury cars, home, motorbike, camera, laptop and other services nearby</p>
                      </div>
                  </div>
                  <div class="earn-step-mobile-illustration d-lg-none">
                      <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/road-car-mobile.png" alt="step illustration">
                  </div>
              </div>
              <div class="earn-road-illustration move-car-road step-rotate text-center">
                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/road.png" alt="road way">
                  <div id="road-car"></div>
              </div>
              <div class="earn-step-content step-3 pb150 step-reverse">
                  <div class="earn-step-info">
                      <div class="earn-step-inner ml25p">
                          <h2><span>03</span> Offer your Price </h2>
                          <p>Offer your best price for premium car rental services near you, including luxury and cheap car rental options.</p>
                      </div>
                  </div>
                  <div class="earn-step-image"><img width="1000" height="700" src="../images/img2.png" title="Offer your Price"></div>
              </div>
              <div class="earn-road-illustration move-car-road text-center">
                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/road.png" alt="road way">
                  <!-- <div id="road-car"></div> -->
              </div>
              <div class="earn-step-content step-4 pb150 step-reverse">
                  <div class="earn-step-image"><img width="720" height="500" src="../images/img8.png" title="Efficiently book rides with detailed car profiles"></div>
                  <div class="earn-step-info">
                      <div class="earn-step-inner ml25p">
                          
                          <h2><span>04</span> Efficiently book rides with detailed car profiles </h2>
                          <p>Browse detailed car profiles and easily book the perfect ride. From luxury and premium car rentals to cheap auto rentals nearby, enjoy hassle-free booking for your next adventure.</p>
                      </div>
                  </div>

              </div>
              <div class="earn-road-illustration move-car-road text-center step-rotate">
                  <img src="https://pathao.com/wp-content/themes/webpathao/assets/images/road.png" alt="road way">
                  <!-- <div id="road-car"></div> -->
              </div>
              <div class="earn-step-content step-5 pb150 step-reverse">
                  <div class="earn-step-info">
                      <div class="earn-step-inner ml25p">
                          <h2><span>05</span> Track your ride in real-time </h2>
                          <p>Track your ride in real-time with our easy car rental services. Rent a car nearby and enjoy secure, hassle-free journeys with live tracking!</p>
                      </div>
                  </div>
                  <div class="earn-step-image"><img width="600" height="600" src="../images/img1.png" title="Track your ride in real-time"></div>
              </div>
          </div>
      </div>
  </div>



  </div>

  <div id="more" class="section">
    <h2 class="slow-text">Our Purpose</h2>
    <p class="slow-text">The primary purpose of our Rental Management System is to create a seamless platform that bridges the gap between rental owners and customers. Our website ensures efficient and user-friendly experiences for both parties, catering to diverse rental needs across categories like homes, vehicles, properties, equipment, and books.

      For rental owners, our platform provides powerful tools to manage their inventory, monitor ongoing rentals, and track revenue effectively. By simplifying these processes, we allow them to focus on delivering high-quality service to their customers without worrying about operational complexities.
      
      For customers, the website offers an intuitive interface to browse, book, and manage rentals effortlessly. It ensures transparency in the rental process, providing detailed information about items, availability, and terms. With added features like notifications and reminders, users can enjoy a hassle-free rental experience.</p>
  </div>

  
     <!--CONTACT US  -->
     
     <div id="contact">
      <h2 class="contact-heading">Contact Us</h2>
      <div class="form-container">
        <form class="form">
          <div class="form-group">
            <label for="email">Company Email</label>
            <input type="text" id="email" name="email" required="">
          </div>
          <div class="form-group">
            <label for="textarea">How Can We Help You?</label>
            <textarea name="textarea" id="textarea" rows="10" cols="50" required=""></textarea>
          </div>
          <button class="form-submit-btn" type="submit">Submit</button>
        </form>
      </div>
    </div>
    
     


  <footer class="site-footer">
    <div class="container">
         <div class="row">

              <div class="foot">
                  <p class="copyright-text">Copyright &copy; 2024 RentLab Co.
                  
                  <br>All rights reserved: <a href="https://www.muzahidulsaki.social" target="_blank">Muzahidul Saki</a></p>
              </div>

              <div class="footemail">
                  <p class="mr-4">
                      <i class="fa fa-envelope-o mr-1"></i>
                      <a href="#">Email: rentlab@company.com</a>
                  </p>

                  <p><i class="fa fa-phone mr-1"></i> 01778776701</p>
              </div>
              
         </div>
    </div>
</footer>

  <script src="js/script.js"></script>
</body>
</html>
