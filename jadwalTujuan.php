<?php
require 'halo-pelanggan/function/indo_date.php';
require 'halo-pelanggan/function/indo_date2.php';
require 'halo-pelanggan/function/indo_date3.php';
require 'halo-pelanggan/function/rupiah.php';

$tujuan = $_GET['tujuan'];
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
    <title>Daftar Jadwal <?php echo $tujuan; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="img/budimansn.png">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search"
                            placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                <li class="nav-item">
                                    <a class="nav-link" href="./">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="kontak-kami.php">Kontak Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./#tujuan">Daftar Tujuan</a>
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

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)"></div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Listing Destinations Area Start ***** -->
    <section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Daftar Jadwal Bus</h4>
                        <p>Berikut daftar jadwal budiman dengan tujuan <?php echo $tujuan; ?>.</p><br />
                        <p><small><i>Foto hanyalah sampel.</i></small></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Features Area -->
                <?php

				require 'halo-pelanggan/function/kon.php';
$query = mysqli_query($kon, "SELECT jadwal_keberangkatan.*, kendaraan.*, tujuan.*
                FROM jadwal_keberangkatan
                JOIN kendaraan ON jadwal_keberangkatan.id_kendaraan = kendaraan.id_kendaraan
                JOIN tujuan ON jadwal_keberangkatan.id_tujuan = tujuan.id_tujuan
                WHERE nama_tujuan='$tujuan'
                ORDER BY jadwal_keberangkatan.id_jadwal") or die("Gagal query");
while ($r = mysqli_fetch_assoc($query)) {
    if ($r > 0){
    $bayar = $r['harga'] + $r['harga_kelas']  ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-features-area mb-50">
                        <img src="img/bg-img/tujuan-1.jpg" alt="" width="500" height="500">
                        <!-- Price -->
                        <?php
                        $diskon = ($r['diskon']);

                                    if ($r['diskon'] == $diskon){
                                    $total = (($bayar * $diskon)/100);
                                    $hasil = $bayar - $total;
                                    }else{
                                        $hasil == $bayar;
                                        $promo = "";
                                    }
                        ?>

                        <?php
                        if ($diskon > 0){
                            $promo = "<div class='price-start'>
                                                <p>Diskon $r[diskon]% khusus untuk hari ini!</p>
                                                </div>";
                        }else{
                            $promo = "";
                        }
                        ?>
                        <?php echo $promo; ?>
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5><?= $r['nama_tujuan']; ?></h5>
                                <p>Tanggal Berangkat: <b><?= indonesian_date_only($r['tgl_berangkat']); ?></b><br />
                                    Jam Berangkat: <b><?= indonesian_hour_only($r['jam']); ?></b><br />
                                    Merek Kendaraan: <b><?= $r['merek_kendaraan']; ?></b><br />
                                    Nomor Kendaraan: <b><?= $r['nomor_kendaraan']; ?></b><br />
                                    Jumlah Kursi: <b><?= $r['jml_kursi']; ?> Kursi tersedia</b><br />

                                    <div class="feature-favourite">
                                        <a href=""><?php echo rupiah($hasil); ?></a> / Orang
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div>
                    <h3 align="center">Jadwal belum ada.</h3>
                </div>
                <?php
}
}
?>
            </div>
        </div>
    </section>
    <!-- ***** Listing Destinations Area End ***** -->

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
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
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
