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

// Handle "Add to Cart" functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = 1; // Default quantity

    // Check if the product is already in the cart
    $check_query = "SELECT id FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("ii", $user_id, $product_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $stmt_check->close();

    if ($result_check->num_rows > 0) {
        // Update quantity if product exists in the cart
        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
        $stmt_update = $conn->prepare($update_query);
        $stmt_update->bind_param("ii", $user_id, $product_id);
        $stmt_update->execute();
        $stmt_update->close();
        $message = "Quantity updated in cart.";
    } else {
        // Insert new product into the cart
        $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt_insert->execute();
        $stmt_insert->close();
        $message = "Product added to cart.";
    }
}

// Fetch items from the 'upload' table
$sql = "SELECT id, name, description, image_path, price FROM upload";
$result = $conn->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
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

        .menu-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .card h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .card p {
            font-size: 1rem;
            color: #666;
        }

        .card .price {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
            color: #000;
        }

        .card button {
            background-color: #ffcc00;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            margin: 5px;
        }

        .card button:hover {
            background-color: #e6b800;
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
        <h1>Our Menu</h1>
        <?php if (isset($message)): ?>
            <p style="color: green; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <div class="menu-grid">
            <?php foreach ($menu_items as $item): ?>
                <?php $image_path = '/ordering System/uploads/' . basename($item['image_path']); ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($image_path) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <h2><?= htmlspecialchars($item['name']) ?></h2>
                    <p><?= htmlspecialchars($item['description']) ?></p>
                    <p class="price">₹<?= number_format($item['price'], 2) ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                        <button onclick=" window.location.href='add_to_cart.php';">add to cart</button>
                    </form>
                    <button onclick=" window.location.href='buy.php';">Buy Now</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function buyNow(id) {
            alert("Buying item with ID " + id + "!");
            // Implement redirect or checkout logic here
        }
    </script>
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
