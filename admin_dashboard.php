<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <?php
    // Sertakan file koneksi
    include 'connection.php';
    // Query untuk mendapatkan daftar kegiatan
    $query = "SELECT * FROM pendaftaran";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo "Nama Siswa: " . $row['nama_siswa'] . "<br>";
            echo "Umur: " . $row['umur'] . "<br>";
            echo "Tanggal pendaftaran: " . $row['tanggal_pendaftaran'] . "<br>";
            echo "Status: " . $row['status'] . "<br>";
            // Tombol untuk mengubah status hanya untuk admin
            echo "<form action='process_change_status.php' method='post'>";
            echo "<input type='hidden' name='id_pendaftaran' value='" . $row['id'] . "'>";
            echo "<select name='new_status'>";
            echo "<option value='Diterima'>Diterima</option>";
            echo "<option value='Tidak Diterima'>Tidak Diterima</option>";
            echo "</select>";
            echo "<button type='submit'>Ubah Status</button>";
            echo "</form>";

            echo "</p>";
        }
    } else {
        echo "Tidak ada kegiatan.";
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</body>
</html>
