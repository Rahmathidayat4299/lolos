<?php
// Sertakan file koneksi
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password']; // Hash password
    $role = $_POST['role'];

    // Query untuk menambahkan pengguna ke tabel users
    $query = "INSERT INTO users (username, password, role) 
              VALUES ('$username', '$password', '$role')";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
