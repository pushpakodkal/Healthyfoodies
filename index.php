<!-- <!-- <?php
// session_start(); -->

// If the user is already logged in, redirect them to their dashboard
// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
//     exit();
// }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthyFoodies - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu0uCz6whvIUgEjq6mzb3O2iYv4GSzdD9EtvbObQ4rmqlsLFrOxjY32ejJ9z0loqu31sE&usqp=CAU');
    background-size: cover;  /* Ensures the background image covers the entire page */
    background-position: center center;  /* Centers the background image */
    background-repeat: no-repeat;  /* Prevents the image from repeating */
}


       

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #28a745;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }

        .login-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .login-buttons a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .login-buttons a:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #28a745;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to HealthyFoodies</h1>
</header>

<div class="container">
    <h2>About HealthyFoodies</h2>
    <p>Welcome to HealthyFoodies, the ultimate online food ordering system where you can enjoy healthy and delicious meals from local restaurants and sellers. Whether you're looking for a nutritious breakfast, a wholesome lunch, or a healthy dinner, HealthyFoodies has a wide variety of meals to choose from, all prepared with fresh, organic ingredients.</p>
    
    <p>As a customer, you can easily browse menus, place orders, and have your meals delivered straight to your door. If you're a seller, you can register and list your food items, manage orders, and reach more customers who are looking for healthy options.</p>

    <div class="login-buttons">
        <a href="userreg.php">Login as User</a>
        <a href="sellerregister.php">Login as Seller</a>
    </div>
</div>



</body>
</html>
