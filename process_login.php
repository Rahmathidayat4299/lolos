<?php
// Sertakan file koneksi
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Query untuk mencari user berdasarkan username dan password
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // Periksa apakah data ditemukan
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Simpan informasi user dalam sesi (session)
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            // Alihkan ke halaman sesuai peran (user atau admin)
            if ($user['role'] === 'admin') {
                header('Location: admin_dashboard.php');
                echo "anda adalah admin.";
            } else {
                header('Location: user_dashboard.php');
                echo "anda adalah user.";
            }
        } else {
            echo "Login failed. Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
