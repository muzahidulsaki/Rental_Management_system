<?php
$conn = mysqli_connect('localhost','root','','user_db');

if (isset($_POST['submit'])) {
    $house_name = $_POST['house_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];

    // Upload the image
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert data into the database
    $query = "INSERT INTO house (house_name, price, category, image) VALUES ('$house_name', '$price', '$category', '$image')";
    mysqli_query($conn, $query);

    echo "<script>alert('House added successfully!'); window.location.href='uploadhouse.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="../../css/uploadhouse.css">
</head>
<body>
    <div class="main">
    <h3>Upload House Information</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="house_name">House Name:</label>
        <input type="text" name="house_name" id="house_name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required><br><br>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="single family">Single Family</option>
            <option value="villa">Villa</option>
            <option value="bungalow">Bungalow</option>
            <option value="studio apartment">Studio Apartment</option>
            <option value="cottage">Cottage</option>
        </select><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <button type="submit" name="submit">Add House</button>
    </form>

    </div>
    
</body>
</html>
