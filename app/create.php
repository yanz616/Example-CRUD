<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_penjualan = $_POST["tanggal_penjualan"];
    $merek_mobil = $_POST["merek_mobil"];
    $model = $_POST["model"];
    $tahun = $_POST["tahun"];
    $warna = $_POST["warna"];
    $harga = $_POST["harga"];
    $nama_pembeli = $_POST["nama_pembeli"];
    $metode_pembayaran = $_POST["metode_pembayaran"];
    $status_pengiriman = $_POST["status_pengiriman"];

    $stmt = $connection->prepare(
        "INSERT INTO penjualan_mobil (tanggal_penjualan, merek_mobil, model, tahun, warna, harga, nama_pembeli, metode_pembayaran, status_pengiriman) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "sssssssss",
        $tanggal_penjualan,
        $merek_mobil,
        $model,
        $tahun,
        $warna,
        $harga,
        $nama_pembeli,
        $metode_pembayaran,
        $status_pengiriman
    );
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penjualan Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Tambah Data Penjualan Mobil</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Merek Mobil</label>
            <input type="text" name="merek_mobil" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Warna</label>
            <input type="text" name="warna" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="Tunai">Tunai</option>
                <option value="Kredit">Kredit</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Pengiriman</label>
            <select name="status_pengiriman" class="form-control" required>
                <option value="Terkirim">Terkirim</option>
                <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                <option value="Dalam Proses">Dalam Proses</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
