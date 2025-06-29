<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penjualan Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">🚗 Daftar Penjualan Mobil</h2>
        <a href="create.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Penjualan
        </a>
    </div>

    <div class="row g-4">
        <?php
        $result = $connection->query("SELECT * FROM penjualan_mobil ORDER BY tanggal_penjualan DESC");
        while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <i class="bi bi-car-front-fill"></i> <?= htmlspecialchars($row["merek_mobil"]) ?> <?= htmlspecialchars($row["model"]) ?>
                    </h5>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i> Tanggal: <span class="badge bg-info text-dark"><?= $row["tanggal_penjualan"] ?></span></p>
                    <p class="mb-1"><i class="bi bi-person-badge"></i> Pembeli: <strong><?= htmlspecialchars($row["nama_pembeli"]) ?></strong></p>
                    <p class="mb-1"><i class="bi bi-palette-fill"></i> Warna: <?= htmlspecialchars($row["warna"]) ?> | Tahun: <?= $row["tahun"] ?></p>
                    <p class="mb-1"><i class="bi bi-cash-coin"></i> Harga: Rp<?= number_format($row["harga"], 0, ',', '.') ?></p>
                    <p class="mb-1"><i class="bi bi-credit-card"></i> Metode: <?= htmlspecialchars($row["metode_pembayaran"]) ?></p>
                    <p class="mb-1"><i class="bi bi-truck"></i> Status: <span class="badge bg-secondary"><?= htmlspecialchars($row["status_pengiriman"]) ?></span></p>
                    <p class="text-muted small mt-2"><i class="bi bi-clock-history"></i> Dibuat: <?= $row["created_at"] ?></p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between">
                    <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="bi bi-trash3"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
