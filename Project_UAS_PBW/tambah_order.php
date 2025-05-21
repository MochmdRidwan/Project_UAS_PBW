<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order Baru - Our Shoes</title>
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
        
        /* Page header */
        .page-header {
            background-color: #fff;
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .page-header p {
            font-size: 1.1rem;
            color: #666;
        }
        
        /* Form section */
        .form-section {
            padding: 30px 20px;
        }
        
        .order-form {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
        }
        
        .form-check-input {
            margin-right: 10px;
        }
        
        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-submit:hover {
            background-color: #218838;
        }
        
        .btn-cancel {
            background-color: #dc3545;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        
        .btn-cancel:hover {
            background-color: #c82333;
        }
        
        /* Form sections */
        .form-section-title {
            border-bottom: 2px solid #03a9f4;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #03a9f4;
        }
        
        .form-section-content {
            margin-bottom: 30px;
        }
        
        /* Price calculation card */
        .price-card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .price-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        
        .price-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0 8px;
            font-weight: bold;
            font-size: 18px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar-nav .nav-item .nav-link.active {
                margin-left: 0;
            }
            
            .btn-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-cancel, .btn-submit {
                width: 100%;
                margin-right: 0;
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

        <div class="page-header">
            <h1>Tambah Order Baru</h1>
            <p>Isi form berikut untuk membuat pesanan baru</p>
        </div>
        
        <div class="form-section">
            <form class="order-form" action="process_order.php" method="post">
                
                <!-- Customer Information -->
                <div class="form-section-content">
                    <h3 class="form-section-title">Informasi Pelanggan</h3>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customerName" class="