<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - HealthyFoodies</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg,rgb(160, 163, 157), #56ab2f);
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
        .contact-container {
            text-align: center;
            padding: 50px 20px;
        }
        .contact-container h1 {
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 20px;
        }
        .contact-container p {
            font-size: 1.2em;
            line-height: 1.8;
            color: #fff;
            max-width: 800px;
            margin: 0 auto;
        }
        .contact-form {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 30px auto;
        }
        .contact-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .contact-form button {
            background-color: #56ab2f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .contact-form button:hover {
            background-color: #a8e063;
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

    <!-- Contact Us Section -->
    <div class="contact-container">
        <h1>Contact <span class="highlight">HealthyFoodies</span></h1>
        <p>
            Got a question? Feedback? Or just want to say hi? Fill out the form below and our team will get back to you as soon as possible.
        </p>
        <div class="contact-form">
            <form action="contact_handler.php" method="POST">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="5" required placeholder="Type your message here"></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
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
