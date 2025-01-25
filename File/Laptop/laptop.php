<?php
session_start();
$conn = mysqli_connect('localhost','root','','user_db');

// Check if the renter is logged in
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
} else {
    $username = null;
    echo "<script>alert('Login Required!'); window.location.href='../loginReg.php';</script>";
}

$query = "SELECT * FROM laptop";
$result = mysqli_query($conn, $query);

// Initialize filters
$priceFilter = isset($_POST['price']) ? $_POST['price'] : '';
$categoryFilter = isset($_POST['category']) && is_array($_POST['category']) ? $_POST['category'] : [];


// Build the SQL query with filters
$query = "SELECT * FROM laptop WHERE 1=1";

// Apply price filter
if (!empty($priceFilter)) {
    switch ($priceFilter) {
        case '0-50':
            $query .= " AND price BETWEEN 0 AND 50";
            break;
        case '50-100':
            $query .= " AND price BETWEEN 50 AND 100";
            break;
        case '100-150':
            $query .= " AND price BETWEEN 100 AND 150";
            break;
        case '150-200':
            $query .= " AND price BETWEEN 150 AND 200";
            break;
        case '200+':
            $query .= " AND price > 200";
            break;
    }
}

// Apply category filter
if (!empty($categoryFilter)) {
    $categories = implode("','", $categoryFilter); // Escape selected categories
    $query .= " AND category IN ('$categories')";
}
// Execute the query
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Car</title>
    <link rel="stylesheet" href="../../css/laptop.css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<body>

        <!-- HEADER -->
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
            <a style="color: white; text-decoration: none;" href="loginReg.php" 
               onmouseover="this.style.color='#f13a11'" onmouseout="this.style.color='white'">Logout</a>
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
<!-- Filter Form -->
<div class="filters">
        <form method="POST" action="">
            <h2>Filter</h2>
            <h3>Price</h3>
            <!-- Price Filter -->
            <label>
                <input type="radio" name="price" value="0-50" <?php if ($priceFilter == '0-50') echo 'checked'; ?>> €0 - €50
            </label>
            <label>
                <input type="radio" name="price" value="50-100" <?php if ($priceFilter == '50-100') echo 'checked'; ?>> €50 - €100
            </label>
            <label>
                <input type="radio" name="price" value="100-150" <?php if ($priceFilter == '100-150') echo 'checked'; ?>> €100 - €150
            </label>
            <label>
                <input type="radio" name="price" value="150-200" <?php if ($priceFilter == '150-200') echo 'checked'; ?>> €150 - €200
            </label>
            <label>
                <input type="radio" name="price" value="200+" <?php if ($priceFilter == '200+') echo 'checked'; ?>> €200+
            </label> <br>

            <!-- Category Filter -->
             <!-- Category Filter -->
             <h3>Category</h3>
            <label>
                <input type="checkbox" name="category[]" value="asus" <?php if (in_array('asus', $categoryFilter)) echo 'checked'; ?>> Asus
            </label>
            <label>
                <input type="checkbox" name="category[]" value="acer" <?php if (in_array('acer', $categoryFilter)) echo 'checked'; ?>> Acer
            </label>
            <label>
                <input type="checkbox" name="category[]" value="apple" <?php if (in_array('apple', $categoryFilter)) echo 'checked'; ?>> Apple
            </label>
            <label>
                <input type="checkbox" name="category[]" value="dell" <?php if (in_array('dell', $categoryFilter)) echo 'checked'; ?>> Dell
            </label>
            <label>
                <input type="checkbox" name="category[]" value="lenovo" <?php if (in_array('lenovo', $categoryFilter)) echo 'checked'; ?>> Lenovo
            </label>
           

            <!-- Filter Buttons -->
            <button type="submit">Apply Filter</button>
            <button type="button" onclick="location.href='laptop.php';">Clear Filter</button>
        </form>
    </div>

    <main class="car-section">
      <h1>Choose Your Laptop</h1>
      <div class="car-grid">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="car-card">
                <img src="../../images/laptop<?php echo $row['image']; ?>" alt="<?php echo $row['laptop_name']; ?>" style="width: 100%;">
                <h3><?php echo $row['laptop_name']; ?></h3>
                <p>Price: <?php echo $row['price']; ?>/Day</p>
                <p>Category: <?php echo $row['category']; ?></p>
            </div>
        <?php } ?>
    </div>
    </main>
  </div>


  <div id="carPreview">
    <span id="previewClose">&times;</span>
    <img id="previewImage" src="" alt="Car Image">
    <h2 id="previewName"></h2>
    <p id="previewPrice"></p>
    <p id="previewCategory"></p>
    <button id="rentButton">Rent This Car</button>
</div>



  <script src="../../js/laptop.js"></script>




    
</body>
</html>