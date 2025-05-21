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
            width: 350px;
        }
        .login-container h1 {
            font-family: 'Arial', sans-serif;
            color: #1e90ff;
            margin-bottom: 5px;
        }
        .login-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
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
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0d7eae;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
    // Start session
    session_start();
    
    // Check if user is already logged in
    if (isset($_SESSION['admin_id'])) {
        header("Location: dashboard.php");
        exit();
    }
    
    // Database connection parameters
    $db_host = "localhost";
    $db_user = "root";  // Change this to your database username
    $db_pass = "";      // Change this to your database password
    $db_name = "Our_Shoes_db";
    
    // Initialize variables
    $username = "";
    $error = "";
    
    // Process login form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to database
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Get user input
        $username = $conn->real_escape_string($_POST['username']);
        $password = $_POST['password'];
        
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id_admin, name, password, role FROM Admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            
            // Verify password (using password_verify if passwords are hashed)
            // Note: In a real application, passwords should be hashed in the database
            if (password_verify($password, $admin['password']) || $password === $admin['password']) {
                // Password is correct, start a new session
                session_start();
                
                // Store admin data in session variables
                $_SESSION['admin_id'] = $admin['id_admin'];
                $_SESSION['admin_name'] = $admin['name'];
                $_SESSION['admin_role'] = $admin['role'];
                
                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Password salah. Silakan coba lagi.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
        
        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
?>

<div class="login-container">
    <h1>Our Shoes.</h1>
    <h2>Login Admin</h2>

    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>