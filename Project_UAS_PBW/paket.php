<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket - Our Shoes</title>
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
        
        /* Package card styling */
        .package-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        
        .package-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: calc(33.33% - 14px);
            min-width: 250px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .package-card:hover {
            transform: translateY(-5px);
        }
        
        .package-header {
            background-color: #03a9f4;
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        .package-body {
            padding: 15px;
        }
        
        .package-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }
        
        .package-features {
            list-style-type: none;
            padding: 0;
            margin: 15px 0;
        }
        
        .package-features li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        
        .package-features li:last-child {
            border-bottom: none;
        }
        
        .package-action {
            text-align: center;
            padding: 15px;
            background-color: #f9f9f9;
        }
        
        .btn-edit-package {
            background-color: #FFC107;
            color: #333;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .btn-edit-package:hover {
            background-color: #e0a800;
        }
        
        .btn-add-package {
            background-color: #03a9f4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .btn-add-package:hover {
            background-color: #0288d1;
        }
        
        /* Modal styling */
        .modal-header {
            background-color: #03a9f4;
            color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .package-card {
                width: calc(50% - 10px);
            }
        }
        
        @media (max-width: 768px) {
            .package-card {
                width: 100%;
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
                            <a class="nav-link" href="riwayat.php">Riwayat Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link current-page" href="paket.php">Daftar Paket</a>
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
            <h1>Daftar Paket</h1>
            <p>Lihat dan kelola paket layanan cuci sepatu</p>
        </div>
        
        <div class="content-area">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Paket Tersedia</h4>
                <button class="btn-add-package" data-bs-toggle="modal" data-bs-target="#addPackageModal">
                    <i class="fas fa-plus"></i> Tambah Paket Baru
                </button>
            </div>
            
            <div class="package-cards">
                <?php
                // This would normally be populated from a database
                // Here we use dummy data for demonstration
                $packages = [
                    [
                        'id' => 1,
                        'name' => 'Fast Clean',
                        'price' => 'Rp 50.000',
                        'features' => [
                            'Cuci Upper Sepatu',
                            'Tidak termasuk insole',
                            'Selesai dalam 1-2 hari',
                            'Free pengharum sepatu'
                        ]
                    ],
                    [
                        'id' => 2,
                        'name' => 'Deep Clean',
                        'price' => 'Rp 75.000',
                        'features' => [
                            'Cuci Upper & Midsole',
                            'Termasuk insole',
                            'Termasuk remove noda',
                            'Selesai dalam 2-3 hari',
                            'Free pengharum sepatu'
                        ]
                    ],
                    [
                        'id' => 3,
                        'name' => 'Premium Clean',
                        'price' => 'Rp 120.000',
                        'features' => [
                            'Full cleaning (Upper, Midsole, Outsole)',
                            'Termasuk insole dan tali sepatu',
                            'Whitening treatment (untuk sepatu putih)',
                            'Termasuk remove noda membandel',
                            'Selesai dalam 3-4 hari',
                            'Free pengharum sepatu'
                        ]
                    ]
                ];
                
                foreach ($packages as $package) {
                    echo '<div class="package-card">';
                    echo '    <div class="package-header">';
                    echo '        <h3>' . $package['name'] . '</h3>';
                    echo '    </div>';
                    echo '    <div class="package-body">';
                    echo '        <div class="package-price">' . $package['price'] . '</div>';
                    echo '        <ul class="package-features">';
                    
                    foreach ($package['features'] as $feature) {
                        echo '            <li><i class="fas fa-check text-success me-2"></i> ' . $feature . '</li>';
                    }
                    
                    echo '        </ul>';
                    echo '    </div>';
                    echo '    <div class="package-action">';
                    echo '        <button class="btn-edit-package" onclick="editPackage(' . $package['id'] . ')">';
                    echo '            <i class="fas fa-edit"></i> Edit Paket';
                    echo '        </button>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    
    <!-- Add Package Modal -->
    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPackageModalLabel">Tambah Paket Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addPackageForm">
                        <div class="mb-3">
                            <label for="packageName" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="packageName" required>
                        </div>
                        <div class="mb-3">
                            <label for="packagePrice" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="packagePrice" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="packageFeatures" class="form-label">Fitur (satu per baris)</label>
                            <textarea class="form-control" id="packageFeatures" rows="5" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="savePackage()">Simpan</button>
                </div>
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
        
        // Function to handle editing a package
        function editPackage(packageId) {
            // In a real application, this would open a modal with the package details
            alert('Edit paket dengan ID: ' + packageId);
            // Example: Open modal with package data loaded
        }
        
        // Function to save a new package
        function savePackage() {
            // In a real application, this would send form data to the server
            const name = document.getElementById('packageName').value;
            const price = document.getElementById('packagePrice').value;
            
            if (name && price) {
                alert('Paket baru berhasil disimpan!');
                // Example: Submit form via AJAX or form submission
                document.getElementById('addPackageForm').reset();
                // Close modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('addPackageModal'));
                modal.hide();
            } else {
                alert('Harap isi semua field yang diperlukan');
            }
        }
    </script>
</body>
</html>