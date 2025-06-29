<?php
include "config.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];

// Ambil data saat ini
$stmt = $connection->prepare("SELECT * FROM penjualan_mobil WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}

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

    $stmt = $connection->prepare("UPDATE penjualan_mobil SET tanggal_penjualan=?, merek_mobil=?, model=?, tahun=?, warna=?, harga=?, nama_pembeli=?, metode_pembayaran=?, status_pengiriman=? WHERE id=?");
    $stmt->bind_param("sssssssssi", $tanggal_penjualan, $merek_mobil, $model, $tahun, $warna, $harga, $nama_pembeli, $metode_pembayaran, $status_pengiriman, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penjualan Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Edit Penjualan Mobil</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="form-control" value="<?= $data["tanggal_penjualan"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Merek Mobil</label>
            <input type="text" name="merek_mobil" class="form-control" value="<?= $data["merek_mobil"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="<?= $data["model"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="<?= $data["tahun"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Warna</label>
            <input type="text" name="warna" class="form-control" value="<?= $data["warna"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" value="<?= $data["harga"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control" value="<?= $data["nama_pembeli"] ?>" required>
        </div>
        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="Tunai" <?= $data["metode_pembayaran"] == "Tunai" ? "selected" : "" ?>>Tunai</option>
                <option value="Kredit" <?= $data["metode_pembayaran"] == "Kredit" ? "selected" : "" ?>>Kredit</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Pengiriman</label>
            <select name="status_pengiriman" class="form-control" required>
                <option value="Terkirim" <?= $data["status_pengiriman"] == "Terkirim" ? "selected" : "" ?>>Terkirim</option>
                <option value="Dalam Pengiriman" <?= $data["status_pengiriman"] == "Dalam Pengiriman" ? "selected" : "" ?>>Dalam Pengiriman</option>
                <option value="Dalam Proses" <?= $data["status_pengiriman"] == "Dalam Proses" ? "selected" : "" ?>>Dalam Proses</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
