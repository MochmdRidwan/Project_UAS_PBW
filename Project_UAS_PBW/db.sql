-- Create database
CREATE DATABASE our_shoes;
USE our_shoes;

-- Table Users
CREATE TABLE Users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin') NOT NULL
);

-- Table Paket
CREATE TABLE Paket (
    id_paket INT AUTO_INCREMENT PRIMARY KEY,
    nama_paket ENUM('cuci cepat', 'cuci pemutih', 'cuci biasa') NOT NULL,
    harga INT NOT NULL,
    estimasi_waktu VARCHAR(100)
);

-- Table Orders
CREATE TABLE Orders (
    id_order INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_paket INT NOT NULL,
    jumlah_sepatu INT(11) NOT NULL,
    harga_total INT NOT NULL,
    status_order ENUM('pending', 'proses', 'selesai', 'dibatalkan') DEFAULT 'pending',
    FOREIGN KEY (id_user) REFERENCES Users(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_paket) REFERENCES Paket(id_paket) ON DELETE CASCADE
);

-- Table Pembayaran
CREATE TABLE Pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_order INT NOT NULL,
    total_bayar INT NOT NULL,
    tanggal_bayar DATE,
    FOREIGN KEY (id_order) REFERENCES Orders(id_order) ON DELETE CASCADE
);

-- Adding indexes for better performance
CREATE INDEX idx_users_email ON Users(email);
CREATE INDEX idx_users_username ON Users(username);
CREATE INDEX idx_orders_status ON Orders(status_order);
CREATE INDEX idx_pembayaran_tanggal ON Pembayaran(tanggal_bayar);

-- Insert sample data for Paket
INSERT INTO Paket (nama_paket, harga, estimasi_waktu) VALUES
('cuci cepat', 35000, '1 hari'),
('cuci pemutih', 45000, '2 hari'),
('cuci biasa', 25000, '3 hari');

-- Insert sample data for Users (Admin account)
INSERT INTO Users (nama, email, username, password, role) VALUES
('Admin', 'admin@ourshoes.com', 'admin', '$2y$10$vI8aWBnW3fID.ZQ4/zo1G.q1lRps.9cGLcZEiGDMVr5yUP1KUOYTa', 'admin'); -- password: admin123

-- Creating additional table for Karyawan based on activity diagram
CREATE TABLE Karyawan (
    id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_telp VARCHAR(15) NOT NULL,
    alamat TEXT,
    posisi VARCHAR(50) NOT NULL,
    tanggal_bergabung DATE NOT NULL
);

-- Adding index for Karyawan
CREATE INDEX idx_karyawan_posisi ON Karyawan(posisi);