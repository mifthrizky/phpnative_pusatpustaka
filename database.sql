-- CREATE DB
CREATE DATABASE IF NOT EXISTS db_pusatpustaka;
USE db_pusatpustaka;

-- CREATE TABLE PENGGUNA
CREATE TABLE IF NOT EXISTS pengguna(
    id_pengguna INT PRIMARY KEY AUTO_INCREMENT,
    nama_lengkap VARCHAR(100) NOT NULL, 
    username VARCHAR(50) NOT NULL UNIQUE,
    pasword VARCHAR(255) NOT NULL,
    role ENUM('admin', 'petugas') NOT NULL,
    foto VARCHAR(255),
    dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CREATE TABLE KATEGORI
CREATE TABLE IF NOT EXISTS kategori(
    id_kategori INT PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL UNIQUE
);

-- CREATE TABLE PENERBIT
CREATE TABLE IF NOT EXISTS penerbit(
    id_penerbit INT PRIMARY KEY AUTO_INCREMENT,
    nama_penerbit VARCHAR(100) NOT NULL UNIQUE,
    alamat TEXT,
    email VARCHAR(100)
);

-- CREATE TABLE BUKU
CREATE TABLE IF NOT EXISTS buku(
    id_buku INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    id_kategori INT,
    id_penerbit INT,
    penulis VARCHAR(100) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    stok INT NOT NULL,
    sampul VARCHAR(255),
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE SET NULL,
    FOREIGN KEY (id_penerbit) REFERENCES penerbit(id_penerbit) ON DELETE SET NULL
);  

-- CREATE TABLE PEMINJAMAN
CREATE TABLE IF NOT EXISTS peminjaman(
    id_peminjaman INT PRIMARY KEY AUTO_INCREMENT,
    id_buku INT,
    id_pengguna INT,
    nama_peminjam VARCHAR(100),
    tgl_pinjam DATE NOT NULL,
    tgl_kembali DATE DEFAULT NULL,
    status ENUM('dipinjam', 'dikembalikan') DEFAULT 'dipinjam',
    FOREIGN KEY (id_buku) REFERENCES buku(id_buku) ON DELETE SET NULL,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna) ON DELETE SET NULL
);