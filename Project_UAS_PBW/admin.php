<?php
// Start the session to manage user logins if needed
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin - Our Shoes</title>
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
        
        /* Admin card styling */
        .admin-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .admin-card-header {
            background-color: #03a9f4;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-card-body {
            padding: 15px;
        }
        
        .admin-card-footer {
            padding: 15px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .admin-info {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }
        
        .admin-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #757575;
        }
        
        .admin-details h4 {
            margin-bottom: 5px;
        }
        
        .admin-details p {
            margin-bottom: 2px;
            color: #666;
        }
        
        .btn-admin {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }
        
        .btn-edit {
            background-color: #FFC107;
            color: #333;
        }
        
        .btn-delete {
            background-color: #F44336;
            color: white;
        }
        
        .btn-add-admin {
            background-color: #03a9f4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .btn-add-admin:hover {
            background-color: #0288d1;
        }
        
        /* Modal styling */
        .modal-header {
            background-color: #03a9f4;
            color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .admin-info {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            
            .admin-details {
                margin-top: 10px;
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
                            <a class="nav-link" href="paket.php">Daftar Paket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link current-page" href="admin.php">Kelola Admin</a>
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
            <h1>Kelola Admin</h1>
            <p>Mengelola akun admin dan memberikan hak akses</p>
        </div>
        
        <div class="content-area">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Daftar Admin</h4>
                <button class="btn-add-admin" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                    <i class="fas fa-plus"></i> Tambah Admin Baru
                </button>
            </div>
            
            <?php
            // This would normally be populated from a database
            // Here we use dummy data for demonstration
            $admins = [
                [
                    'id' => 1,
                    'name' => 'Admin Utama',
                    'username' => 'admin1',
                    'email' => 'admin1@ourshoes.id',
                    'role' => 'Super Admin',
                    'last_login' => '2025-05-21 08:30:15'
                ],
                [
                    'id' => 2,
                    'name' => 'Operator Kasir',
                    'username' => 'kasir1',
                    'email' => 'kasir@ourshoes.id',
                    'role' => 'Kasir',
                    'last_login' => '2025-05-20 17:45:22'
                ],
                [
                    'id' => 3,
                    'name' => 'Manajer Toko',
                    'username' => 'manajer',
                    'email' => 'manajer@ourshoes.id',
                    'role' => 'Manajer',
                    'last_login' => '2025-05-19 14:12:08'
                ]
            ];
            
            foreach ($admins as $admin) {
                echo '<div class="admin-card">';
                echo '    <div class="admin-card-header">';
                echo '        <h4>' . $admin['role'] . '</h4>';
                echo '        <span>ID: ' . $admin['id'] . '</span>';
                echo '    </div>';
                echo '    <div class="admin-card-body">';
                echo '        <div class="admin-info">';
                echo '            <div class="admin-avatar">';
                echo '                <i class="fas fa-user"></i>';
                echo '            </div>';
                echo '            <div class="admin-details">';
                echo '                <h4>' . $admin['name'] . '</h4>';
                echo '                <p><i class="fas fa-user-tag me-2"></i> Username: ' . $admin['username'] . '</p>';
                echo '                <p><i class="fas fa-envelope me-2"></i> Email: ' . $admin['email'] . '</p>';
                echo '                <p><i class="fas fa-clock me-2"></i> Login terakhir: ' . $admin['last_login'] . '</p>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '    <div class="admin-card-footer">';
                echo '        <button class="btn-admin btn-edit" onclick="editAdmin(' . $admin['id'] . ')">';
                echo '            <i class="fas fa-edit"></i> Edit';
                echo '        </button>';
                echo '        <button class="btn-admin btn-delete" onclick="deleteAdmin(' . $admin['id'] . ')">';
                echo '            <i class="fas fa-trash"></i> Hapus';
                echo '        </button>';
                echo '    </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    
    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Tambah Admin Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAdminForm">
                        <div class="mb-3">
                            <label for="adminName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="adminName" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="adminUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="adminEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminRole" class="form-label">Role</label>
                            <select class="form-select" id="adminRole" required>
                                <option value="">Pilih Role</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="saveAdmin()">Simpan</button>
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
        
        // Function to handle editing an admin
        function editAdmin(adminId) {
            // In a real application, this would open a modal with the admin details
            alert('Edit admin dengan ID: ' + adminId);
            // Example: Load admin data from server and show in modal
        }
        
        // Function to handle deleting an admin
        function deleteAdmin(adminId) {
            // In a real application, this would show a confirmation dialog
            const confirmDelete = confirm('Apakah Anda yakin ingin menghapus admin ini?');
            
            if (confirmDelete) {
                alert('Admin dengan ID: ' + adminId + ' telah dihapus');
                // Example: Send delete request to server and remove from UI
            }
        }
        
        // Function to save a new admin
        function saveAdmin() {
            // In a real application, this would send form data to the server
            const name = document.getElementById('adminName').value;
            const username = document.getElementById('adminUsername').value;
            const email = document.getElementById('adminEmail').value;
            const password = document.getElementById('adminPassword').value;
            const role = document.getElementById('adminRole').value;
            
            if (name && username && email && password && role) {
                alert('Admin baru berhasil ditambahkan!');
                // Example: Submit form via AJAX or form submission
                document.getElementById('addAdminForm').reset();
                // Close modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('addAdminModal'));
                modal.hide();
            } else {
                alert('Harap isi semua field yang diperlukan');
            }
        }
    </script>
</body>
</html>