<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Our Shoes</title>
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
        
        /* Active link styling */
        .navbar-nav .nav-item .nav-link.current-page {
            background-color: #fff;
            border-radius: 20px;
            padding: 8px 16px;
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
            padding-bottom: 30px;
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
            color: #333;
        }
        
        /* Content area */
        .content-area {
            padding: 20px;
        }
        
        /* Table styling */
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .transaction-table th, 
        .transaction-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .transaction-table th {
            background-color: #03a9f4;
            color: white;
        }
        
        .transaction-table tr:hover {
            background-color: #f1f1f1;
        }
        
        .btn-print {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-print:hover {
            background-color: #45a049;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .transaction-table {
                display: block;
                overflow-x: auto;
            }
            
            .navbar-nav .nav-item .nav-link.current-page {
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
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link current-page" href="riwayat.php">Riwayat Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paket.php">Daftar Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Kelola Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">Kelola Order</a>
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
            <h1>Riwayat Transaksi</h1>
            <p>Lihat semua transaksi dan cetak invoice pelanggan</p>
        </div>
        
        <div class="content-area">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari transaksi..." id="searchInput">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <select class="form-select w-auto d-inline-block">
                        <option value="all">Semua Status</option>
                        <option value="selesai">Selesai</option>
                        <option value="proses">Dalam Proses</option>
                        <option value="antri">Antri</option>
                    </select>
                </div>
            </div>
            
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Paket</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // This would normally be populated from a database
                    // Here we use dummy data for demonstration
                    $transactions = [
                        ['id' => 'TRX001', 'date' => '2025-05-20', 'customer' => 'Budi Santoso', 'package' => 'Deep Clean', 'total' => 'Rp 75.000', 'status' => 'Selesai'],
                        ['id' => 'TRX002', 'date' => '2025-05-19', 'customer' => 'Ani Wijaya', 'package' => 'Fast Clean', 'total' => 'Rp 50.000', 'status' => 'Selesai'],
                        ['id' => 'TRX003', 'date' => '2025-05-19', 'customer' => 'Dian Purnama', 'package' => 'Premium Clean', 'total' => 'Rp 120.000', 'status' => 'Dalam Proses'],
                        ['id' => 'TRX004', 'date' => '2025-05-18', 'customer' => 'Eko Prasetyo', 'package' => 'Deep Clean', 'total' => 'Rp 75.000', 'status' => 'Antri'],
                        ['id' => 'TRX005', 'date' => '2025-05-18', 'customer' => 'Fitri Anggraini', 'package' => 'Fast Clean', 'total' => 'Rp 50.000', 'status' => 'Selesai'],
                    ];
                    
                    foreach ($transactions as $transaction) {
                        echo '<tr>';
                        echo '<td>' . $transaction['id'] . '</td>';
                        echo '<td>' . $transaction['date'] . '</td>';
                        echo '<td>' . $transaction['customer'] . '</td>';
                        echo '<td>' . $transaction['package'] . '</td>';
                        echo '<td>' . $transaction['total'] . '</td>';
                        echo '<td>' . $transaction['status'] . '</td>';
                        echo '<td>
                                <button class="btn-print" onclick="printInvoice(\'' . $transaction['id'] . '\')">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                              </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
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
        
        // Function to handle invoice printing
        function printInvoice(transactionId) {
            // In a real application, this would redirect to an invoice page or open a print dialog
            alert('Mencetak invoice untuk transaksi ' + transactionId);
            // Example: window.location.href = 'print_invoice.php?id=' + transactionId;
        }
    </script>
</body>
</html>