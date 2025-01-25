<?php

@include 'config.php';
session_start();

if (isset($_POST['submit2'])) { // Registration Form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
        mysqli_query($conn, $insert);
        header('location:loginReg.php');
    }
}

if (isset($_POST['submit'])) { // Login Form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $pass = md5($_POST['password']);

  // Default login credentials (change these as per your preference)
  $default_name = "admin";
  $default_pass = md5("admin123");

  if ($name == $default_name && $pass == $default_pass) {
      // Default login - full access
      $_SESSION['admin_name'] = "Super Admin";
      header('location:adminDashboard.php'); // Redirect to a specific dashboard for full access
  } else {
      $select = "SELECT * FROM user_form WHERE name = '$name' && password = '$pass'";
      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);

          if ($row['user_type'] == 'owner') {
              $_SESSION['admin_name'] = $row['name'];
              header('location:ownerDash.php');
          } elseif ($row['user_type'] == 'renter') {
              $_SESSION['user_name'] = $row['name'];
              header('location:renterDash.php');
          }
      } else {
          $error[] = 'Incorrect email or password!';
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/loginReg.css"/>
    <title>Sign in & Sign up Form</title>
  </head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="#" class="sign-in-form" method = "POST">
            <h2 class="title">Sign in</h2>

            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name= "name" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name = "password" placeholder="Password" />
            </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          <form action="#" class="sign-up-form" method = "POST">
            <h2 class="title">Sign up</h2>

            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fa fa-users"></i>
              <select name="user_type">
                <option>Select your role</option>
                <option value="owner">Owner</option>
                <option value="renter">Renter</option>
              </select>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="submit2" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../js/loginReg.js"></script>
  </body>
</html>
