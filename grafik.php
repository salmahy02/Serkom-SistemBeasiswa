<?php
// impor file
include('config.php');
session_start();

// Establish database connection
$db = mysqli_connect("localhost", "root", "", "db_ujian");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Define functions at the top of the script
function totalData($akademik, $nonakademik)
{
    $total = $akademik + $nonakademik;
    return $total;
}

// Hitung Jumlah Data penerima beasiswa akademik
$queryAkademik = "SELECT COUNT(*) FROM `mahasiswa` WHERE beasiswa = 'akademik'";
$sqlAkademik = mysqli_query($db, $queryAkademik);
$akademik = mysqli_fetch_assoc($sqlAkademik);
$jmlAkademik = $akademik['COUNT(*)'];

// Hitung jumlah data penerima beasiswa non akademik
$queryNonakademik = "SELECT COUNT(*) FROM `mahasiswa` WHERE beasiswa = 'non-akademik'";
$sqlNonakademik = mysqli_query($db, $queryNonakademik);
$nonakademik = mysqli_fetch_assoc($sqlNonakademik);
$jmlNonakademik = $nonakademik['COUNT(*)'];

// kakulasi total perhitungan
$total = totalData($jmlAkademik, $jmlNonakademik);

// Close database connection
mysqli_close($db);
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


    <section class="content-section">
        <h1 class="text-center mt-3">Grafik Pendaftar Beasiswa</h1>
        <p class="text-center">Banyak Data <?= $total; ?></p>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <!-- Tampil Chart -->
                    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
                    <a href="tabel_pendaftaran.php" class="btn btn-primary d-block">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Chart script and other JavaScript includes -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Beasiswa', 'Jumlah'],
            ['akademik', <?= $jmlAkademik ?>],
            ['non-akademik', <?= $jmlNonakademik ?>],
        ]);

        // Set Options
        const options = {
            title: 'Grafik Jumlah Penerima Beasiswa',
            is3D: true, // Add this line to make it a 3D pie chart
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
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