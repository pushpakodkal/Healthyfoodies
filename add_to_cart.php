<?php
session_start();

// Database connection setup
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = "pushpa@20!!"; // Update with your MySQL password
$dbname = "order_system";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming user_id is 1 for demo purposes. Replace with actual logged-in user ID.
$user_id = 1; 

// Fetch cart items for the user
$sql_cart = "SELECT c.id AS cart_id, c.quantity, u.name, u.price, u.image_path, u.description 
             FROM cart c 
             JOIN upload u ON c.product_id = u.id 
             WHERE c.user_id = ?";
$stmt_cart = $conn->prepare($sql_cart);
$stmt_cart->bind_param("i", $user_id);
$stmt_cart->execute();
$cart_items = $stmt_cart->get_result();
$stmt_cart->close();

// Handle delete functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_cart_id'])) {
    $delete_cart_id = $_POST['delete_cart_id'];
    $sql_delete = "DELETE FROM cart WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $delete_cart_id);
    $stmt_delete->execute();
    $stmt_delete->close();

    // Refresh the page to reflect changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #ff6f61;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .cart {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .cart-items {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .cart-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
        }

        .cart-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .cart-item h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .cart-item p {
            font-size: 1rem;
            color: #666;
        }

        .cart-item .price {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
            color: #000;
        }

        .cart-item .quantity {
            font-size: 1rem;
            margin: 10px 0;
        }

        .cart-item .subtotal {
            font-size: 1.2rem;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 20px;
        }

        .cart-item form {
            margin-top: 10px;
        }

        .cart-item button {
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 1rem;
            cursor: pointer;
        }

        .cart-item button:hover {
            background-color: #e65c5c;
        }

        .cart-total {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .checkout-button {
            background-color: #ffcc00;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1.2rem;
            cursor: pointer;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>

<div class="navbar">
        <div class="logo">HealthyFoodies</div>
        <div>
        <a href="about_us.php">About Us</a>
        <a href="Contact_us.php">Contact Us</a>
            <a href="add_to_cart.php">View Cart</a>
            <a href="order.php">My Orders</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
<div class="container">
    <h1>Your Cart</h1>
    <div class="cart">
        <?php if ($cart_items->num_rows > 0): ?>
            <h2>Your Cart Items</h2>
            <div class="cart-items">
                <?php 
                $total_price = 0;
                while ($cart_item = $cart_items->fetch_assoc()): 
                    $subtotal = $cart_item['quantity'] * $cart_item['price'];
                    $total_price += $subtotal;
                ?>
                    <div class="cart-item">
                        <img src="<?= '/ordering System/uploads/' . basename($cart_item['image_path']) ?>" alt="<?= $cart_item['name'] ?>">
                        <h2><?= $cart_item['name'] ?></h2>
                        <p><?= $cart_item['description'] ?></p>
                        <p class="price">₹<?= number_format($cart_item['price'], 2) ?></p>
                        <p class="quantity">Quantity: <?= $cart_item['quantity'] ?></p>
                        <p class="subtotal">Subtotal: ₹<?= number_format($subtotal, 2) ?></p>
                        <form method="POST">
                            <input type="hidden" name="delete_cart_id" value="<?= $cart_item['cart_id'] ?>">
                            <button type="submit">Remove</button>
                        </form>
                        <button onclick=" window.location.href='buy.php';">Buy Now</button>

                    </div>
                <?php endwhile; ?>
            </div>

            <div class="cart-total">
                <p>Total Price: ₹<?= number_format($total_price, 2) ?></p>
            </div>

            <button class="checkout-button">Proceed to Checkout</button>

        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<footer style="background-color: #333; color: #fff; padding: 20px 0; text-align: left;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- About Section -->
        <div style="flex: 1; margin: 10px; min-width: 200px;">
            <h3 style="border-bottom: 2px solid #f4f4f4; padding-bottom: 5px; margin-bottom: 10px;">About HealthyFoodies </h3>
            <p style="font-size: 14px; line-height: 1.6;">
            A HealthyFoodies is a digital platform designed to facilitate the process of ordering food from restaurants or food providers. It aims to simplify the customer experience, enhance operational efficiency, and bridge the gap between customers and food service providers.
            </p>
        </div>

        <!-- Quick Links Section -->
        <div style="flex: 1; margin: 10px; min-width: 200px;">
            <h3 style="border-bottom: 2px solid #f4f4f4; padding-bottom: 5px; margin-bottom: 10px;">Quick Links</h3>
            <ul style="list-style: none; padding: 0; font-size: 14px; line-height: 1.6;">
                <li style="margin-bottom: 8px;"><a href="about_us.php" style="color: #fff; text-decoration: none; transition: color 0.3s;">About Us</a></li>
               <li style="margin-bottom: 8px;"><a href="contact_us.php" style="color: #fff; text-decoration: none; transition: color 0.3s;">Contact</a></li>
                <li style="margin-bottom: 8px;"><a href="faq.php" style="color: #fff; text-decoration: none; transition: color 0.3s;">FAQ</a></li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div style="flex: 1; margin: 10px; min-width: 200px;">
            <h3 style="border-bottom: 2px solid #f4f4f4; padding-bottom: 5px; margin-bottom: 10px;">Contact Us</h3>
            <p style="font-size: 14px; line-height: 1.6;"><strong>Email:</strong> support@e-commerce.com</p>
            <p style="font-size: 14px; line-height: 1.6;"><strong>Phone:</strong> +91 9876543210</p>
            <p style="font-size: 14px; line-height: 1.6;"><strong>Address:</strong> 123, DD Hills😂, Tumkur, India</p>
        </div>

        <!-- Social Media Section -->
        <div style="flex: 1; margin: 10px; min-width: 200px;">
            <h3 style="border-bottom: 2px solid #f4f4f4; padding-bottom: 5px; margin-bottom: 10px;">Follow Us</h3>
            <div style="display: flex; gap: 15px; font-size: 24px;">
                <a href="#" style="color: #fff; text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="color: #fff; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: #fff; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" style="color: #fff; text-decoration: none;"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div style="text-align: center; margin-top: 20px; font-size: 14px;">
        <p>© 2024 HireHub. All rights reserved. Designed with ❤ in India.</p>
    </div>
</footer>
</body>
</html>
