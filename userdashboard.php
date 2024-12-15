<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #8e9eab, #eef2f3);
        }

        /* Navigation Bar */
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

        /* Dashboard Section */
        .dashboard-container {
            text-align: center;
            padding: 50px 20px;
        }

        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .menu-item {
            margin: 15px;
            padding: 20px;
            width: 250px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.3);
        }

        .menu-item a {
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            transition: color 0.3s ease;
        }

        .menu-item a:hover {
            color: #ff6f61;
        }

        .menu-item i {
            font-size: 50px;
            color: #ff6f61;
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 10px;
            margin-top: 50px;
            position: relative;
        }

        footer a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .social-icons {
            margin: 15px 0;
        }

        footer .social-icons a {
            text-decoration: none;
            color: white;
            margin: 0 10px;
            font-size: 24px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #ff6f61;
            transform: scale(1.2);
        }
    </style>

</head>
<body>
    <!-- Navbar -->
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

    <!-- Dashboard Section -->
    <div class="dashboard-container">
        <h1>Welcome to Your Dashboard</h1>
        <div class="menu">
            <div class="menu-item">
                <i class="fas fa-box-open"></i>
                <a href="menu.php">View Items</a>
            </div>
            <div class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                <a href="add_to_cart.php">View Cart</a>
            </div>
            <div class="menu-item">
                <i class="fas fa-receipt"></i>
                <a href="order.php">View Orders</a>
            </div>
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
