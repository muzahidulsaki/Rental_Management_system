<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check if the renter is logged in
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
} else {
    $username = null;
}

// Get car details from query string
$name = isset($_GET['name']) ? urldecode($_GET['name']) : "Unknown";
$price = isset($_GET['price']) ? urldecode($_GET['price']) : "Unknown";
$category = isset($_GET['category']) ? urldecode($_GET['category']) : "Unknown";
$image = isset($_GET['image']) ? urldecode($_GET['image']) : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['days'])) {
        $price = floatval($price);
        // Step 1: Get rental details
        $days = intval($_POST['days']);
        $total_cost = $days * $price;

        // Store rental details in session
        $_SESSION['rental_details'] = [
            'name' => $name,
            'price' => $price,
            'category' => $category,
            'image' => $image,
            'days' => $days,
            'total_cost' => $total_cost
        ];

        // Show payment form
        $show_payment_form = true;
    } elseif (isset($_POST['payment_method'])) {
        // Step 2: Handle payment submission
        $payment_method = $_POST['payment_method'];
        $rental_details = $_SESSION['rental_details'];
        // $query = "INSERT INTO payments (payment_method, rental_details) VALUES ('$payment_method', '$rental_details')";

        //  mysqli_query($conn, $query);

        // Step 3: Generate invoice
        $show_invoice = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Car Rental</title>
    <link rel="stylesheet" href="../../css/laptop.css"> <!-- If using external CSS file -->
</head>
<body>
    <div class="confirmation-container">
        <h1>Car Rental Confirmation</h1>
        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($name); ?>">
        <h2><?php echo htmlspecialchars($name); ?></h2>
        <p><strong>Price:</strong> <?php echo htmlspecialchars($price); ?> per day</p>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>

        <?php if (!isset($show_payment_form) && !isset($show_invoice)): ?>
            <!-- Step 1: Rental form -->
            <form action="" method="POST">
                <label for="days">Number of Days:</label>
                <input type="number" name="days" id="days" min="1" required>
                <button type="submit">Confirm Rental</button>
            </form>
        <?php elseif (isset($show_payment_form)): ?>
            <!-- Step 2: Payment form -->
            <h2>Payment Method</h2>
            <p><strong>Total Cost:</strong> <?php echo htmlspecialchars($total_cost); ?> </p>
            <form action="" method="POST">
                <label for="payment_method">Choose Payment Method:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Cash">Cash</option>
                </select>
                <button type="submit">Pay Now</button>
            </form>
        <?php elseif (isset($show_invoice)): ?>
            <!-- Step 3: Invoice -->
            <h2 style="text-align: center; color: #4CAF50;">Invoice</h2>
<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #4CAF50; color: white;">
            <th style="padding: 12px; text-align: left;">Field</th>
            <th style="padding: 12px; text-align: left;">Details</th>
        </tr>
    </thead>
    <tbody>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px; border: 1px solid #ddd;">Customer</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($username); ?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd;">Car Name</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rental_details['name']); ?></td>
        </tr>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px; border: 1px solid #ddd;">Category</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rental_details['category']); ?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd;">Price per Day</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rental_details['price']); ?></td>
        </tr>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px; border: 1px solid #ddd;">Days</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rental_details['days']); ?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #ddd;">Total Cost</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rental_details['total_cost']); ?></td>
        </tr>
        <tr style="background-color: #f9f9f9;">
            <td style="padding: 10px; border: 1px solid #ddd;">Payment Method</td>
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($payment_method); ?></td>
        </tr>
    </tbody>
</table>


            <p>Thank you for renting with us!</p>
        <?php endif; ?>
    </div>
</body>
</html>
