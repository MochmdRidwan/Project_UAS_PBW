<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Our Shoes</title>
    <style>
        body {
            background-color: #00aaff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffec00;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
        }
        .login-container h1 {
            font-family: 'Arial', sans-serif;
            color: #1e90ff;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            width: 80%;
            margin: 10px 0;
            border: 2px solid #1e90ff;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0d7eae;
        }
    </style>
</head>
<body>

<?php
    // Initialize variables for username and password
    $username = "";
    $password = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Placeholder for authentication logic
        if ($username === "admin" && $password === "admin123") {
            // This is where you could redirect the user to a dashboard or some other page
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
?>

<div class="login-container">
    <h1>Our Shoes.</h1>
    <h2>Login Admin</h2>

    <?php if ($error): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
