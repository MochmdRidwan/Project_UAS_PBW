-- Membuat database (opsional)
CREATE DATABASE IF NOT EXISTS Our_Shoes_db;
USE Our_Shoes_db;

-- Tabel Admin
CREATE TABLE Admin (
    id_admin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin') NOT NULL
);

-- Tabel Paket
CREATE TABLE Paket (
    id_paket INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_paket ENUM('cuci cepat', 'cuci pemutih', 'cuci biasa'),
    harga INT NOT NULL,
    estimasi_waktu VARCHAR(100)
);

-- Tabel Orders
CREATE TABLE Orders (
    id_order INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_admin INT NOT NULL,
    id_paket INT NOT NULL,
    nama_pemesan VARCHAR(100) NOT NULL,
    jumlah_sepatu INT(11) NOT NULL,
    harga_total INT NOT NULL,
    status_order ENUM('pending', 'proses', 'selesai', 'di batalkan'),
    tanggal_order DATE,
    FOREIGN KEY (id_admin) REFERENCES Admin(id_admin),
    FOREIGN KEY (id_paket) REFERENCES Paket(id_paket)
);

-- Tabel Pembayaran
CREATE TABLE Pembayaran (
    id_pembayaran INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_order INT NOT NULL,
    total_bayar INT NOT NULL,
    tanggal_bayar DATE,
    FOREIGN KEY (id_order) REFERENCES Orders(id_order)
);
