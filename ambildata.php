<?php
include 'config.php';

$sql = 'SELECT * FROM daftar_lokasi';

$result = mysqli_query($koneksi, $sql);

$data = [];
while($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'id' => $row['id_lokasi'],
        'nama_lokasi' => $row['nama_lokasi'],
        'deskripsi' => $row['deskripsi'],
        'lat' => $row['latitude'],
        'lng' => $row['longitude'],
        'gambar' => $row['gambar'],
    ];
}

echo json_encode($data);