<?php
// Sertakan file koneksi
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $new_status = $_POST['new_status'];

    // Query untuk mengubah status kegiatan
    $query = "UPDATE pendaftaran SET status='$new_status' WHERE id=$id_pendaftaran";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Status pendaftaran berhasil diubah!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
