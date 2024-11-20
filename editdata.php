<?php
include 'config.php';

$sql = 'SELECT * FROM daftar_lokasi WHERE id_lokasi = ' . $_GET['id'];

$result = mysqli_query($koneksi, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo json_encode([
        'id_lokasi' => $row['id_lokasi'],
        'nama_lokasi' => $row['nama_lokasi'],
        'deskripsi' => $row['deskripsi'],
        'lat' => $row['latitude'],
        'lng' => $row['longitude'],
    ]);
}