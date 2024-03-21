<?php
//impor file
include('config.php');

session_start();

// mengirim data ke formulir pendaftaran menggunakan metode POST
$nama = $_POST['nama'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$nim = $_POST['nim'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$berkas = $_FILES['berkas']['name'];

// var_dump($ipk);
// exit;
// Mengonversi nama ke huruf kecil
$convertLowerCase = strtolower($nama);

// Memeriksa apakah tombol "daftar" telah ditekan
if (isset($_POST['daftar'])) {
  // Memeriksa apakah ada kolom yang kosong dalam formulir pendaftaran
    if (empty($nama) || empty($phone_number) || empty($email) || empty($semester) || empty($ipk) || empty($beasiswa) || empty($berkas)) {
        $_SESSION['message'] = ['Data Tidak Boleh Kosong', 'error'];
        header('location:pendaftaran.php');
    } elseif ($berkas != '') { // Jika ada berkas yang diunggah

        $ext_file_required = array('pdf', 'jpg', 'zip');
       // Mengambil ekstensi file yang diunggah
        $get_ext_file = explode('.', $berkas);
        $get_ext = strtolower(end($get_ext_file));
        $get_temp = $_FILES['berkas']['tmp_name'];
        $date = md5(date('Y:m:h h:i:s'));
        $berkasName = $date . '.' . $get_ext;

         // Memeriksa apakah ekstensi file yang diunggah sesuai dengan yang diizinkan
        if (in_array($get_ext, $ext_file_required) === true) {
            // Memindahkan file yang diunggah ke direktori tujuan
            move_uploaded_file($get_temp, 'assets/file/' . $berkasName);
            $query = mysqli_query($conn, "INSERT INTO mahasiswa VALUES('$convertLowerCase','$nim','$nama','$phone_number','$semester','$ipk', '$beasiswa', '$berkasName','$email', 'Belum di Verifikasi')");
            if ($query) {
                // $_SESSION['message'] = ["Pendaftaran Berhasil", 'sukses'];
                header('location:tabel_pendaftaran.php');
            } else {
                $_SESSION['message'] = ["Pendaftaran Gagal", 'error'];
                header('location:pendaftaran.php');
            }
        } else {
            $_SESSION['message'] = ["Berkas yang anda upload bukan JPG / PDF / ZIP", 'error'];
            header('location:pendaftaran.php');
        }
    }
}
