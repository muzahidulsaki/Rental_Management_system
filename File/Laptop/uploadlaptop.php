<?php
$conn = mysqli_connect('localhost','root','','user_db');

if (isset($_POST['submit'])) {
    $laptop_name = $_POST['laptop_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];

    // Upload the image
    $target_dir = "../../images/laptop";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert data into the database
    $query = "INSERT INTO laptop (laptop_name, price, category, image) VALUES ('$laptop_name', '$price', '$category', '$image')";
    mysqli_query($conn, $query);

    echo "<script>alert('Car added successfully!'); window.location.href='uploadlaptop.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="../../css/uploadlaptop.css">
</head>
<body>
    <div class="main">
    <h3>Upload Laptop Information</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="laptop_name">Laptop Name:</label>
        <input type="text" name="laptop_name" id="laptop_name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required><br><br>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="asus">Asus</option>
            <option value="acer">Acer</option>
            <option value="apple">Apple</option>
            <option value="dell">Dell</option>
            <option value="lenovo">Lenovo</option>
        </select><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <button type="submit" name="submit">Add Laptop</button>
    </form>
    </div>
    
</body>
</html>
