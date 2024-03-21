<?php

//impor file konfigurasi yang berisi koneksi ke database
include('config.php');

session_start();

//mengambil id dari parameter GET
$id = $_GET['id'];

//mengamnil data mahasiswa berdasarkan id
$selectQuery = "SELECT * FROM mahasiswa WHERE id='$id'";
$getUser = mysqli_query($conn, $selectQuery);
$rowUser = mysqli_fetch_assoc($getUser);

//memeriksa apakah status mahasoswa adalah "verifikasi"
if($rowUser['status'] == 'Verifikasi') {
    $query = "UPDATE mahasiswa SET status='Belum di Verifikasi' WHERE id='$id'";
} else {
    $query = "UPDATE mahasiswa SET status='Verifikasi' WHERE id='$id'";
}

$sql = mysqli_query($conn, $query);

//memeriksa apakah UPDATE berhasil dieksekusi
if($sql) {
    $_SESSION['result'] = 'Berhasil Mengubah Status';
    header('location:tabel_pendaftaran.php');
}

?>