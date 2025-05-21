<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Order - Our Shoes</title>
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
        
        /* Order management section */
        .order-section {
            padding: 30px 20px;
        }
        
        /* Order tabs */
        .order-tabs {
            margin-bottom: 20px;
        }
        
        .nav-tabs .nav-link {
            color: #333;
            font-weight: 500;
            border: none;
            padding: 10px 20px;
        }
        
        .nav-tabs .nav-link.active {
            background-color: #03a9f4;
            color: white;
            border-radius: 5px 5px 0 0;
        }
        
        /* Order table */
        .order-table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .table thead {
            background-color: #03a9f4;
            color: white;
        }
        
        .table th {
            font-weight: 500;
            padding: 12px 15px;
        }
        
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Action buttons */
        .btn-action {
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
        }
        
        .btn-view {
            background-color: #03a9f4;
            color: white;
        }
        
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        
        /* Order status badges */
        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .badge-pending {
            background-color: #ffc107;
            color: black;
        }
        
        .badge-processing {
            background-color: #17a2b8;
            color: white;
        }
        
        .badge-completed {
            background-color: #28a745;
            color: white;
        }
        
        .badge-cancelled {
            background-color: #dc3545;
            color: white;
        }
        
        /* Add new order button */
        .btn-add-order {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
        }
        
        .btn-add-order:hover {
            background-color: #218838;
            color: white;
        }
        
        /* Order filter */
        .order-filter {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .search-box {
            display: flex;
            align-items: center;
        }
        
        .search-box input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 250px;
        }
        
        .search-box button {
            background-color: #03a9f4;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar-nav .nav-item .nav-link.active {
                margin-left: 0;
            }
            
            .order-filter {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .search-box {
                width: 100%;
            }
            
            .search-box input {
                width: 100%;
            }
            
            .table-responsive {
                overflow-x: auto;
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
            <h1>Kelola Order</h1>
            <p>Mengelola pesanan masuk dan mengubah status pesanan</p>
        </div>
        
        <div class="order-section">
            <div class="order-filter">
                <a href="tambah_order.php" class="btn-add-order">
                    <i class="fas fa-plus"></i> Tambah Order Baru
                </a>
                <div class="search-box">
                    <input type="text" placeholder="Cari order...">
                    <button type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
            
            <ul class="nav nav-tabs order-tabs" id="orderTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">Semua</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Menunggu</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button" role="tab">Diproses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Selesai</button>
                </li>
            </ul>
            
            <div class="tab-content" id="orderTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <div class="table-responsive order-table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Paket</th>
                                    <th>Tanggal Order</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-001</td>
                                    <td>Ahmad Fauzi</td>
                                    <td>Deep Clean</td>
                                    <td>21-05-2025</td>
                                    <td><span class="badge badge-pending">Menunggu</span></td>
                                    <td>Rp 45.000</td>
                                    <td>
                                        <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-002</td>
                                    <td>Siti Rahayu</td>
                                    <td>Fast Clean</td>
                                    <td>20-05-2025</td>
                                    <td><span class="badge badge-processing">Diproses</span></td>
                                    <td>Rp 35.000</td>
                                    <td>
                                        <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-003</td>
                                    <td>Budi Santoso</td>
                                    <td>Premium Clean</td>
                                    <td>19-05-2025</td>
                                    <td><span class="badge badge-completed">Selesai</span></td>
                                    <td>Rp 75.000</td>
                                    <td>
                                        <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-004</td>
                                    <td>Diana Putri</td>
                                    <td>Deep Clean</td>
                                    <td>19-05-2025</td>
                                    <td><span class="badge badge-cancelled">Dibatalkan</span></td>
                                    <td>Rp 45.000</td>
                                    <td>
                                        <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-005</td>
                                    <td>Eko Widodo</td>
                                    <td>Fast Clean</td>
                                    <td>18-05-2025</td>
                                    <td><span class="badge badge-completed">Selesai</span></td>
                                    <td>Rp 35.000</td>
                                    <td>
                                        <button class="btn btn-action btn-view"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-action btn-edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-action btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Other tabs would have similar content but filtered by status -->
                <div class="tab-pane fade" id="pending" role="tabpanel">
                    <!-- Pending orders table -->
                </div>
                
                <div class="tab-pane fade" id="processing" role="tabpanel">
                    <!-- Processing orders table -->
                </div>
                
                <div class="tab-pane fade" id="completed" role="tabpanel">
                    <!-- Completed orders table -->
                </div>
            </div>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
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