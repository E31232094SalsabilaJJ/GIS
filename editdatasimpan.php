<?php
include 'config.php';

$sql = 'UPDATE daftar_lokasi SET nama_lokasi = "' . $_GET['nama'] . '", deskripsi = "' . $_GET['deskripsi'] . '", gambar = "' . $_GET['gambar'] . '", latitude = "' . $_GET['lat'] . '", longitude = "' . $_GET['lng'] . '" WHERE id_lokasi = "'. $_GET['id'] . '"';

mysqli_query($koneksi, $sql);

echo "Simpan data berhasil";