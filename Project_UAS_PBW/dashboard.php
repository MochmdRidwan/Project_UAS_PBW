<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Shoes - Tempat Cuci Sepatu Termurah di Karawang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #03a9f4;
        }
        
        /* Navbar styling */
        .navbar {
            background-color: #ffff00 !important;
            padding: 15px 0;
        }
        
        .navbar-nav .nav-item .nav-link {
            color: #000;
            font-weight: 500;
            margin: 0 5px;
        }
        
        .navbar-nav .nav-item .nav-link.active {
            background-color: #fff;
            border-radius: 20px;
            padding: 8px 16px;
            margin-left: 300px;
        }
        
        /* Custom hamburger icon */
        .navbar-toggler {
            border: none;
            background-color: transparent;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .menu-icon {
            color: #000;
            font-size: 24px;
            margin-left: 30px;
        }
        
        /* Hero section */
        .hero {
            background-color: #fff;
            padding: 60px 20px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: #666;
        }
        
        /* Menu cards */
        .menu-section {
            padding: 30px 20px;
        }
        
        .menu-section h2 {
            margin-bottom: 20px;
        }
        
        .menu-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: flex-start;
        }
        
        .menu-card {
            background-color: #03a9f4;
            color: white;
            border-radius: 8px;
            padding: 20px;
            width: calc(33.33% - 14px);
            min-width: 250px;
            display: flex;
            align-items: flex-start;
        }
        
        .menu-card .icon {
            font-size: 24px;
            margin-right: 15px;
        }
        
        .menu-card-content h3 {
            margin-bottom: 8px;
        }
        
        .menu-card-content p {
            font-size: 0.9rem;
        }
        
        /* Container with blue border */
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            min-height: 100vh;
            border-left: 10px solid #03a9f4;
            border-right: 10px solid #03a9f4;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Our Shoes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars hamburger-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Riwayat Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kelola Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kelola Order</a>
                        </li>
                    </ul>
                    <div class="menu-icon">&#9776;</div>
                </div>
            </div>
        </nav>

        
        <div class="hero">
            <h1>Our Shoes.</h1>
            <p>Tempat cuci sepatu termurah di Karawang</p>
        </div>
        
        <div class="menu-section">
            <h2>Menu</h2>
            
            <div class="menu-cards">
                <div class="menu-card">
                    <div class="icon">&#x23F0;</div>
                    <div class="menu-card-content">
                        <h3>Riwayat</h3>
                        <p>Riwayat transaksi dan print invoice</p>
                    </div>
                </div>
                
                <div class="menu-card">
                    <div class="icon">&#x1F4E6;</div>
                    <div class="menu-card-content">
                        <h3>Paket</h3>
                        <p>melihat detail dan menambah paket</p>
                    </div>
                </div>
                
                <div class="menu-card">
                    <div class="icon">&#x1F464;</div>
                    <div class="menu-card-content">
                        <h3>Karyawan</h3>
                        <p>Mengelola Karyawan dan melihat list karyawan</p>
                    </div>
                </div>
                
                <div class="menu-card">
                    <div class="icon">&#x1F4C4;</div>
                    <div class="menu-card-content">
                        <h3>Kelola Order</h3>
                        <p>Mengelola order yang masuk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php
    // You can add PHP logic here for database connections, processing forms, etc.
    
    // Example database connection (commented out)
    /*
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "our_shoes_db";
    
    $conn = mysqli_connect($host, $username, $password, $database);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Example query
    $sql = "SELECT * FROM packages";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Package ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
        }
    }
    
    mysqli_close($conn);
    */
    
    // Processing form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Example: Add new package
        if (isset($_POST["add_package"])) {
            $packageName = $_POST["package_name"];
            $packagePrice = $_POST["package_price"];
            
            // Insert into database logic would go here
            
            // Redirect to prevent form resubmission
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
    ?>
</body>
</html>