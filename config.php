<?php

$koneksi = new mysqli('localhost', 'root', '', 'SIG');

if($koneksi->connect_error) {
    echo "Koneksi gagal!";
    die('Koneksi gagal');
}