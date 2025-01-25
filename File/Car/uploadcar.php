<?php
$conn = mysqli_connect('localhost','root','','user_db');

if (isset($_POST['submit'])) {
    $car_name = $_POST['car_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];

    // Upload the image
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert data into the database
    $query = "INSERT INTO cars (car_name, price, category, image) VALUES ('$car_name', '$price', '$category', '$image')";
    mysqli_query($conn, $query);

    echo "<script>alert('Car added successfully!'); window.location.href='uploadcar.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="../../css/uploadcar.css">
</head>
<body>
    <div class="main">
    <h3>Upload Car Information</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="car_name">Car Name:</label>
        <input type="text" name="car_name" id="car_name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required><br><br>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="SUV">SUV</option>
            <option value="Coupe">Coupe</option>
            <option value="Cabriolet">Cabriolet</option>
            <option value="Family Car">Family Car</option>
            <option value="Electric Vehicle">Electric Vehicle</option>
        </select><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <button type="submit" name="submit">Add Car</button>
    </form>
    </div>
    
</body>
</html>
