<?php
include 'config.php';

$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$gambar = $_GET['gambar'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$sql = 'INSERT INTO daftar_lokasi VALUES (null, "' . $nama . '", "' . $deskripsi . '", "' . $lat . '", "' . $lng . '", "' . $gambar . '")';

mysqli_query($koneksi, $sql);