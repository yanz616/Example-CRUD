<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $connection->prepare("DELETE FROM penjualan_mobil WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: index.php");
exit();
?>
