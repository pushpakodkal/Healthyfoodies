<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - HealthyFoodies</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg,rgb(158, 163, 151), #56ab2f);
            color: #333;
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
        .about-container {
            text-align: center;
            padding: 50px 20px;
        }
        .about-container h1 {
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 20px;
        }
        .about-container p {
            font-size: 1.2em;
            line-height: 1.8;
            color: #fff;
            max-width: 800px;
            margin: 0 auto;
        }
        .about-container .highlight {
            color: #ffeb3b;
            font-weight: bold;
        }
        .team-section {
            margin-top: 40px;
            padding: 20px;
            text-align: center;
        }
        .team-section h2 {
            font-size: 2em;
            color: #fff;
        }
        .team-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .team-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
        }
        .team-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }
        .team-card h3 {
            font-size: 1.2em;
            color: #56ab2f;
        }
        .team-card p {
            font-size: 0.9em;
            color: #777;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 20px;
            margin-top: 50px;
        }
        footer a {
            color: #a8e063;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
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

    <!-- About Us Section -->
    <div class="about-container">
        <h1>Welcome to <span class="highlight">HealthyFoodies</span>!</h1>
        <p>
            At <span class="highlight">HealthyFoodies</span>, we are passionate about bringing you fresh, delicious, and nutritious meals straight to your doorstep. Our mission is to make healthy eating simple and accessible for everyone.
            Whether you're looking for quick bites or gourmet delights, we have it all!
        </p>
        <p>
            With a focus on quality, sustainability, and customer satisfaction, <span class="highlight">HealthyFoodies</span> is committed to providing an exceptional food experience. Join us in our journey to redefine healthy eating, one meal at a time.
        </p>
    </div>

    <!-- Meet Our Team Section -->
    <div class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-cards">
            <div class="team-card">
                <img src="https://plus.unsplash.com/premium_photo-1661508620175-3ae20da61cda?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YnVzaW5lc3MlMjBtYW58ZW58MHx8MHx8fDA%3D" alt="CEO">
                <h3>John Doe</h3>
                <p>CEO & Founder</p>
            </div>
            <div class="team-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC4bd9IHC1omIQdUSisIwP8c-gcUEs0kEZD2BM40vMXkUAlzz-VCOG8JKpSSLEKts4Ub8&usqp=CAU" alt="Chef">
                <h3>Sarah Lee</h3>
                <p>Head Chef</p>
            </div>
            <div class="team-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZJk1qZ8t_3tAbL6InIn_xtegetN0Q1LOO4T2qZGPW10mTq0I2_kMmWBVTRjzjH4zqW1o&usqp=CAU" alt="Manager">
                <h3>Mark Smith</h3>
                <p>Operations Manager</p>
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
