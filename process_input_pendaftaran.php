<?php
session_start();
include 'connection.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nama_siswa = $_POST['nama_siswa'];
        $umur = $_POST['umur'];
        $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
            if(isset($_SESSION['user_id'])){
                $user_id =$_SESSION['user_id'];
                $query = "INSERT INTO pendaftaran (
                    user_id,
                    nama_siswa,
                    umur,
                    tanggal_pendaftaran
                )VALUES(
                    '$user_id',
                    '$nama_siswa',
                   '$umur',
                    '$tanggal_pendaftaran'
                )";
                    if (mysqli_query($conn,$query)) {
                        echo "Data berhasil disimpan";
                    }else {
                        echo "Error: " . mysqli_error($conn);
                    }
            }
    } 
?>