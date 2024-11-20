<?php
include 'config.php';

$sql = 'DELETE FROM daftar_lokasi WHERE id_lokasi = ' . $_GET['id'];

mysqli_query($koneksi, $sql);