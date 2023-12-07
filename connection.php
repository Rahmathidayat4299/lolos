<?php
// Konfigurasi koneksi database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'psbdayat';

// Buat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
