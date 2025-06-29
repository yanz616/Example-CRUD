-- Membuat database jika belum ada
CREATE DATABASE IF NOT EXISTS showroom_mobil;

-- Menggunakan database
USE showroom_mobil;

-- Hapus tabel jika sudah ada sebelumnya
DROP TABLE IF EXISTS penjualan_mobil;

-- Membuat tabel penjualan mobil
CREATE TABLE penjualan_mobil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_penjualan DATE NOT NULL,
    merek_mobil VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    tahun VARCHAR(4) NOT NULL,
    warna VARCHAR(50) NOT NULL,
    harga INT NOT NULL,
    nama_pembeli VARCHAR(100) NOT NULL,
    metode_pembayaran VARCHAR(50) NOT NULL,
    status_pengiriman VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data awal ke tabel penjualan_mobil
INSERT INTO penjualan_mobil (
    tanggal_penjualan,
    merek_mobil,
    model,
    tahun,
    warna,
    harga,
    nama_pembeli,
    metode_pembayaran,
    status_pengiriman
)
VALUES
    (
        '2025-06-15',
        'Toyota',
        'Avanza G',
        '2023',
        'Hitam',
        255000000,
        'Budi Santoso',
        'Kredit',
        'Terkirim'
    ),
    (
        '2025-06-18',
        'Honda',
        'Brio RS',
        '2024',
        'Merah',
        225000000,
        'Rina Wijayanti',
        'Tunai',
        'Dalam Proses'
    );
