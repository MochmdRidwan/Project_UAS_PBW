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
            margin-left: 350px;
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
            cursor: pointer;
            position: relative;
        }
        
        /* Dropdown for logout */
        .menu-dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
        }
        
        .menu-dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        
        .menu-dropdown a:hover {
            background-color: #f1f1f1;
        }
        
        .show {
            display: block;
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
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
            background-color: #0288d1;
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
        
        /* Active page indicator for navbar */
        .nav-link.current-page {
            background-color: #fff;
            border-radius: 20px;
            padding: 8px 16px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-card {
                width: 100%;
            }
            
            .navbar-nav .nav-item .nav-link.active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">Our Shoes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars hamburger-icon"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'current-page' : ''; ?>" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'riwayat.php' ? 'current-page' : ''; ?>" href="riwayat.php">Riwayat Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'paket.php' ? 'current-page' : ''; ?>" href="paket.php">Daftar Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'current-page' : ''; ?>" href="admin.php">Kelola Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'order.php' ? 'current-page' : ''; ?>" href="order.php">Kelola Order</a>
                        </li>
                    </ul>
                    <div class="menu-icon" onclick="toggleDropdown()">&#9776;
                        <div id="logoutDropdown" class="menu-dropdown">
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
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
                <a href="riwayat.php" class="menu-card">
                    <div class="icon">&#x23F0;</div>
                    <div class="menu-card-content">
                        <h3>Riwayat</h3>
                        <p>Riwayat transaksi dan print invoice</p>
                    </div>
                </a>
                
                <a href="paket.php" class="menu-card">
                    <div class="icon">&#x1F4E6;</div>
                    <div class="menu-card-content">
                        <h3>Paket</h3>
                        <p>melihat detail dan menambah paket</p>
                    </div>
                </a>
                
                <a href="admin.php" class="menu-card">
                    <div class="icon">&#x1F464;</div>
                    <div class="menu-card-content">
                        <h3>Admin</h3>
                        <p>Mengelola Admin dan melihat list Admin</p>
                    </div>
                </a>
                
                <a href="order.php" class="menu-card">
                    <div class="icon">&#x1F4C4;</div>
                    <div class="menu-card-content">
                        <h3>Kelola Order</h3>
                        <p>Mengelola order yang masuk</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle dropdown menu for logout
        function toggleDropdown() {
            document.getElementById("logoutDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.menu-icon')) {
                var dropdowns = document.getElementsByClassName("menu-dropdown");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>