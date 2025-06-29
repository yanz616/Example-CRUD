<?php
$hostname = "mariadb-wira";
$username = "root";
$password = "12341234";
$database = "showroom_mobil";
$connection = new mysqli($hostname, $username, $password, $database);
if ($connection->connect_error) {
    die("Koneksi gagal :" . $connection->connect_error);
}
