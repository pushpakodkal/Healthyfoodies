<?php
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

$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle file upload
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/ordering System/uploads/"; // Full path to 'uploads' directory

    // Ensure the uploads directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate file
    $mime = mime_content_type($_FILES["image"]["tmp_name"]);
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (getimagesize($_FILES["image"]["tmp_name"]) !== false) {
        if (in_array($mime, $allowed_types)) {
            if ($_FILES["image"]["size"] <= 5000000) { // Limit file size to 5MB
                if (!file_exists($target_file)) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // Insert data into the database using prepared statements
                        $sql = "INSERT INTO upload (name, description, image_path, price) 
                                VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssd", $name, $description, $target_file, $price);

                        if ($stmt->execute()) {
                            $message = "Food item uploaded successfully!";
                        } else {
                            $message = "Error: " . $stmt->error;
                        }
                    } else {
                        $message = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $message = "Sorry, file already exists.";
                }
            } else {
                $message = "Sorry, your file is too large.";
            }
        } else {
            $message = "Only JPG, PNG, and GIF files are allowed.";
        }
    } else {
        $message = "File is not an image.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Item Upload</title>
    <style>
     body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        } 


        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="number"], input[type="file"], textarea {
            padding: 10px;
            margin-bottom: 20px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ffcc00;
            color: #fff;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e6b800;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: green;
        }

        .message.error {
            color: red;
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
            <a href="menu.php"> view menu</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>


    <div class="container">
        <h2>Upload Food Item</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="name">Food Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>

            <label for="price">Amount per Item (₹):</label>
            <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($_POST['price'] ?? ''); ?>" required step="0.01">

            <label for="description">Description:</label>
            <textarea name="description" id="description" required rows="4"><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>

            <label for="image">Food Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <input type="submit" value="Submit Food Item">
        </form>

        <div class="message <?php echo strpos($message, 'Error') !== false || strpos($message, 'Sorry') !== false ? 'error' : ''; ?>">
            <?php
                if (!empty($message)) {
                    echo htmlspecialchars($message);
                }
            ?>
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
