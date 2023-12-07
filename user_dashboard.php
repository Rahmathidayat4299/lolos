<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>
    <?php
     // Pastikan sesi dimulai sebelum ini
     session_start();
     // Sertakan file koneksi
     include 'connection.php';
     // Ambil ID pengguna dari sesi
     $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
     // Query untuk mendapatkan daftar kegiatan pengguna yang sedang login
     $query = "SELECT * FROM pendaftaran WHERE user_id = '$user_id'";
     $result = mysqli_query($conn, $query);
 
     if ($result && mysqli_num_rows($result) > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
             echo "<p>";
             echo "Nama siswa: " . $row['nama_siswa'] . "<br>";
             echo "Umur: " . $row['umur'] . "<br>";
             echo "Tanggal pendaftaran: " . $row['tanggal_pendaftaran'] . "<br>";
             echo "Status: " . $row['status'] . "<br>";
 
             // User tidak memiliki tombol untuk mengubah status
             // Tampilkan tombol download jika status sudah approval
             if ($row['status'] == 'Disetujui') {
                 echo '<form method="post" action="download.php">';
             echo '<input type="hidden" name="kegiatan_id" value="' . $row['id'] . '">';
             echo '<button type="submit" name="download_surat">Download Surat</button>';
             echo '</form>';
             }
             echo "</p>";
         }
     } else {
         echo "Tidak ada kegiatan.";
     }
  echo "<a href='input_pendaftaran.html'>Input pendaftaran</a>";
    ?>
</body>
</html>