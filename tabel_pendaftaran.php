<?php

include('config.php')
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <title>KampusKuAja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="assets/css/style.min.css">
  
  <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
            <a class="nav-link" href="pendaftaran.php">Daftar<span class="sr-only">(current)</span></a>
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

    <div class="container">
        <div class="card mt-3">
            <h4 class="text-center mt-4">Daftar Mahasiwa</h4>
            <div class="card-body">
                <?php
                if (isset($_SESSION['result'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['result']; ?>
                        <?php unset($_SESSION['result']); ?>
                    </div>
                <?php
                }
                ?>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                            <th>Semester</th>
                            <th>IPK</th>
                            <th>Beasiswa</th>
                            <th>Status</th>
                            <th>Berkas</th>
                            <th>Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, 'SELECT * FROM mahasiswa');
                        $i = 1;
                        $status = '';
                        
                        // $count = mysqli_num_rows($query);
                        while ($user = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $user['name'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['phone_number'] . " </td>";
                            echo "<td>" . $user['semester'] . " </td>";
                            echo "<td>" . $user['ipk'] . " </td>";
                            echo "<td>" . $user['beasiswa'] . " </td>";
                            echo "<td>". $user['status'] . "</td>";
                            echo "<td>" . "<a href='assets/file/$user[berkas]' class='btn btn-sm btn-primary'>Berkas</a>" . "</td>";
                            if($user['status'] == "Verifikasi") {
                                echo "<td>" . "<a href='verifikasi.php?id=$user[id]' class='btn btn-danger btn-sm'>Batalkan</a>"  . "</td>";
                            } else {
                                echo "<td>" . "<a href='verifikasi.php?id=$user[id]' class='btn btn-success btn-sm'>Verifikasi</a>"  . "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <!-- Tombol untuk menuju halaman grafik -->
     <div class="text-center mt-4">
          <a href="grafik.php" class="btn btn-primary">Lihat Grafik</a>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
<footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2024<a href="https://www.bootstrapdash.com/" class="px-1">KampuskuAja.</a>All rights reserved.</p>
      </footer>
 
  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="assets/vendors/aos/js/aos.js"></script>
  <script src="assets/js/landingpage.js"></script>

</html>