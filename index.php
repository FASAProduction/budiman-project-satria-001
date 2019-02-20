<?php
require 'halo-pelanggan/function/indo_date.php';
require 'halo-pelanggan/function/indo_date2.php';
require 'halo-pelanggan/function/indo_date3.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>P.O Budiman</title>

    <!-- Favicon -->
    <link rel="icon" href="img/budimansn.png">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>


    <!-- ***** Search Form Area ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="./"><img src="img/budiman.png" alt="P.O Budiman" width="150"
                                height="150"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav"
                            aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item active">
                                    <a class="nav-link" href="./">Beranda <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="kontak-kami.php">Kontak Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tujuan">Daftar Tujuan</a>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="masuk/">Masuk</a>
                            </div>
                            <div class="dorne-signin-btn">
                                <a href="daftar/">Daftar</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/busbudiman.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2>Daftar Dan Pesan.</h2>
                        <h4>Daftar dan dapatkan kemudahan dalam memesan bus dari Budiman.</h4>
                    </div>


                </div>
            </div>
        </div>

    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Catagory Area Start ***** -->
    <section class="dorne-catagory-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="all-catagories">
                        <div class="row">
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-1.png" alt="">
                                        <a href="#">
                                            <h6>Pesan Mudah</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-2.png" alt="">
                                        <a href="#">
                                            <h6>Harga Terjangkau</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.6s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-3.png" alt="">
                                        <a href="#">
                                            <h6>Terpercaya</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Catagory Area End ***** -->

    <!-- ***** About Area Start ***** -->
    <section class="dorne-about-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content text-center">
                        <h2>Selamat datang di <br><span>P.O Budiman</span></h2>
                        <p>PT.HS BUDIMAN 45 adalah perusahaan yang bergerak dibidang jasa transportasi
                            angkutan antar kota antar propinsi yang berpusat di Kota Tasikmalaya - Jawa Barat,
                            Awal PO.BUDIMAN berdiri pada tahun 1992 , seiring dengan perkembangannya perusahaan
                            bertransformasi menjadi PT.HS.BUDIMAN 45, dengan mengembangkan usaha selain Bus Cepat
                            Budiman (REGULER) dengan berbagai Kelas Mulai dari Best In Class, Super Executive,
                            First Class, Executive dan Bisnis Class, PARIWISATA , juga tersedia SHUTTLE BUDIMAN,
                            dan TAKSI BUDIMAN.

                            <br /><br />Dapatkan fitur menarik dari kami hanya dengan mendaftar menjadi pelanggan.<br />
                            Jika ingin memesan, harap mendaftar menjadi pelanggan P.O Budiman terlebih dahulu.</p><br />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area End ***** -->

    <!-- ***** Editor Pick Area Start ***** -->
    <section class="dorne-editors-pick-area bg-img bg-overlay-9 section-padding-100" id="tujuan"
        style="background-image: url(img/bekasi.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span></span>
                        <h4>Daftar Kota Tujuan Kami</h4>
                        <p>Berikut daftar kota tujuan kami. Klik pada salah satu tujuan untuk melihat jadwal.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                require 'halo-pelanggan/function/kon2.php';
                $query1 = mysqli_query($kon, "SELECT jadwal_keberangkatan.*, kendaraan.*, tujuan.*, COUNT(nama_tujuan) as jumlah
                                              FROM jadwal_keberangkatan
                                                JOIN kendaraan ON jadwal_keberangkatan.id_kendaraan = kendaraan.id_kendaraan
                                                JOIN tujuan ON jadwal_keberangkatan.id_tujuan = tujuan.id_tujuan
                                            GROUP BY nama_tujuan
                ");
                while ($r = mysqli_fetch_assoc($query1)) {
                    if ($r > 0){
            ?>
                <div class="col-12 col-lg-6">
                    <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.2s">
                        <a href="jadwalTujuan.php?tujuan=<?= $r['nama_tujuan']; ?>">
                            <img src="img/bg-img/tujuan-1.jpg" alt="">
                        </a>
                        <div class="editors-pick-info">
                            <div class="places-total-destinations d-flex">
                                <a
                                    href="jadwalTujuan.php?tujuan=<?= $r['nama_tujuan']; ?>"><?= $r['nama_tujuan']; ?></a>
                                <a href="jadwalTujuan.php?tujuan=<?= $r['nama_tujuan']; ?>"><?= $r['jumlah']; ?>
                                    jadwal</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-12 col-lg-6">
                    <div class="single-editors-pick-area wow fadeInUp" data-wow-delay="0.2s">
                        <div class="editors-pick-info">
                            <div class="places-total-destinations d-flex">
                                Tidak Ada Jadwal
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <!-- ***** Editor Pick Area End ***** -->


    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> P.O Budiman. All rights reserved.
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
