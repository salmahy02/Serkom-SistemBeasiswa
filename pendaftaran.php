<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="assets/css/style.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
  <title>KampusKuAja</title>
</head>


    <!-- Navbar Start -->
<body>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="assets/image/logoo.png" alt="">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="assets/image/logoo.png" alt="">
              
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pendaftaran.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tabel_pendaftaran.php">Hasil Pendaftaran</a>  
          </li>
                </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <!-- Navbar End -->
    
    <hr class="border border-black border-3 opacity-75">
    <h1 class="text-center">Daftar Beasiswa</h1>
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mt-5 px-3 mb-5" style="width: 50%;">
                <div class="border-bottom">
                    <p>Registrasi Beasiswa</p>
                </div>
                <?php
                // Menampilkan pesan yang disimpan dalam sesi
                if (isset($_SESSION['message'])) {
                    if ($_SESSION['message'][1] == 'sukses') {
                ?>
                <!-- Menampilkan pesan sukses jika ada -->
                        <div class="alert alert-success mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                    <?php
                    } else {
                    ?>
                    <!-- Menampilkan pesan error jika ada -->
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- Form pendaftaran beasiswa -->
                <div class="card-body">
                    <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Nama<span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="mb-3 d-none">
                            <label for="nim" class="form-label">NIM<span class="text-danger">*</span></label>
                            <input type="number" name="nim" id="nim" class="form-control" value="324437347">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukkan Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">nomor HP<span class="text-danger">*</span></label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester saat ini<span class="text-danger">*</span></label>
                            <select class="form-select" name="semester">
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php
                                for ($i = 1; $i < 9; $i++) {  // Menampilkan opsi semester
                                ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ipk" class="form-label">IPK Terakhir<span class="text-danger">*</span></label>
                            <div class="d-flex justify-content-between">
                                <input type="text" readonly name="ipk" id="ipk" class="form-control">
                                <a class="btn btn-info btn-sm" href="#" onclick="generateipk()">IPK</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="beasiswa" class="form-label">Pilihan Beasiswa<span class="text-danger">*</span></label>
                            <select name="beasiswa" class="form-select" id="beasiswa" disabled=false>
                                <option readonly selected>-- Pilih Beasiswa --</option>
                                <option value="akademik">Akademik</option>
                                <option value="non-akademik">Non Akademik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="berkas" class="form-label">Upload Berkas Syarat<span class="text-danger">*</span></label>
                            <input type="file" name="berkas" id="berkas" class="form-control" disabled=false>
                        </div>
                        <div class="mt-4 mb-2 d-flex justify-content-end row">
                            <button class="btn btn-primary col-5" id="daftar" name="daftar" disabled='false'>Daftar</button>
                            <a href="index.php" class="btn btn-outline-secondary offset-2 col-5" id="cancel" disabled='false'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
    function generateipk() {
        // Mendapatkan inputan manual dari pengguna
        const ipkInput = parseFloat(prompt("Masukkan nilai IPK:"));

        // Validasi nilai IPK
        if (isNaN(ipkInput) || ipkInput < 0 || ipkInput > 4) {
            alert("Nilai IPK tidak valid. Silakan masukkan nilai IPK antara 0 dan 4.");
            return;
        }

        // Menetapkan nilai IPK ke input field
        document.getElementById('ipk').value = ipkInput.toFixed(1);

        // Memeriksa apakah IPK memenuhi syarat untuk beasiswa
        if (ipkInput >= 3.0) {
            document.getElementById('beasiswa').disabled = false;
            document.getElementById('berkas').disabled = false;
            document.getElementById('daftar').disabled = false;
        } else {
            document.getElementById('beasiswa').disabled = true;
            document.getElementById('berkas').disabled = true;
            document.getElementById('daftar').disabled = true;
        }
    }
</script>
<footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2024<a href="https://www.bootstrapdash.com/" class="px-1">KampuskuAja.</a>All rights reserved.</p>
      </footer>
 
  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="assets/vendors/aos/js/aos.js"></script>
  <script src="assets/js/landingpage.js"></script>
</body>

</html>