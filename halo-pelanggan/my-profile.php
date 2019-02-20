<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['no_telp'])) {
    die("Anda belum login! Silahkan login terlebih dahulu!<br/><a href='../masuk/' type='button'>Masuk</a>");//jika belum login jangan lanjut
}

?>

<?php
include 'function/indo_date.php';
include 'function/indo_date2.php';
include 'function/indo_date3.php';
include 'function/rupiah.php';
include 'function/waktu2.php';
include 'function/waktu3.php';
date_default_timezone_set('Asia/Jakarta');
?>

<?php
                                        if ($_SESSION['jk'] == 'Pria') {
                                           $jekel = "Sdr. ";
                                        }else if ($_SESSION['jk'] == 'Wanita') {
                                            $jekel = "Sdri. ";
                                        }else{
                                            $jekel = "Tidak Diketahui.";
                                        }
?>

<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Profil Saya</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="./"><img src="../img/budiman.png" width="100" height="50" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <?php include 'notif.php' ?>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $jekel; ?><?php echo $_SESSION['nama_pelanggan'] ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $_SESSION['no_telp'] ?></span>
                                </div>
                                <a class="dropdown-item" href="my-profile.php"><i class="fas fa-user mr-2"></i>Akun Saya</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pesanan Saya</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include 'function/nav.php' ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Profil Saya </h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="./" class="breadcrumb-link">Dasbor</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo $_SESSION['nama_pelanggan'] ?></h2>
										<?php
											require 'function/kon2.php';
											$query = mysqli_query($kon, "SELECT * FROM pesan where id_pelanggan='$_SESSION[id_pelanggan]'");
											$jumlah = mysqli_num_rows($query);
										?>
                                        <p>
										<?php echo $jumlah; ?> Transaksi.
										<?php
										if ($jumlah > 0){
											echo "<br/><br/><a href='pesan-bus/' class='btn btn-success btn-sm'>Pesan Lagi.
                                         <i class='fa fa-bus'></i>
                                        </a>";
										}else{
											echo "<br/><br/><a href='pesan-bus/' class='btn btn-primary btn-sm'>Pesan Sekarang.
                                         <i class='fa fa-bus'></i>
                                        </a>";
										}
										?>
										</p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Informasi Pelanggan</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-map-marker mr-2"></i><?php echo $_SESSION['alamat'] ?></li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $_SESSION['no_telp'] ?></li>
										<li class="mb-0"><i class="fas fa-fw fa-indent mr-2"></i><?php echo $_SESSION['no_ktp'] ?></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-summary-tab" data-toggle="pill" href="#pills-summary" role="tab" aria-controls="pills-summary" aria-selected="true">Summary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-sms-tab" data-toggle="pill" href="#pills-sms" role="tab" aria-controls="pills-sms" aria-selected="false">SMS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Edit Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-saran-tab" data-toggle="pill" href="#pills-saran" role="tab" aria-controls="pills-saran" aria-selected="false">Kirim Saran</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-summary" role="tabpanel" aria-labelledby="pills-summary-tab">
                                        
                                        <div class="section-block">
                                            <h3 class="section-title">Rincian History Pesanan Saya</h3>
                                        </div>
										<?php
                                    require 'function/kon.php';
                                    $query = mysqli_query($kon, "SELECT transaksi.id_transaksi, transaksi.id_pesan, transaksi.foto, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, tujuan.nama_tujuan
                                    FROM transaksi
                                    JOIN pesan ON pesan.id_pesan = transaksi.id_pesan
                                    JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
                                    JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
                                    JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal
                                    JOIN tujuan ON jadwal_keberangkatan.id_tujuan = tujuan.id_tujuan
                                    where pesan.id_pelanggan='$_SESSION[id_pelanggan]' order by id_transaksi desc") or die("Gagal query");
                                    while ($r = mysqli_fetch_assoc($query)) { 
									if ($r > 0) { ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <i class="fas fa-4x fa-bus"></i>
                                                            </div>
                                                            <div class="media-body ">
                                                                <div class="influencer-profile-data">
                                                                    <h3 class="m-b-10"><?= $r['id_transaksi']; ?> - <?= $r['nama_tujuan']; ?></h3>
                                                                    <p>
                                                                        <span class="m-r-20 d-inline-block">Tanggal Pesan:
                                                                            <span class="m-l-10 text-primary"><?= indonesian_date($r['tgl_transaksi']); ?> (<?= time_since(strtotime($r['tgl_transaksi'])); ?>)</span>
                                                                        </span>
                                                                        <span class="m-r-20 d-inline-block"> Tanggal Berangkat:
                                                                            <span class="m-l-10 text-secondary"><?= indonesian_date_only($r['tgl_berangkat']); ?></span>
                                                                        </span>
                                                                            <span class="m-r-20 d-inline-block">Jam: <span class="m-l-10  text-success"><?= indonesian_hour_only($r['jam']); ?></span>
                                                                        </span>
                                                                        <?php
																		if ($r['foto'] == null){
																			echo "<span class='m-r-20 d-inline-block'>Status: <span class='m-l-10  text-danger'>Belum Bayar</span>
                                                                        </span>";
																		}else{
																			echo "<span class='m-r-20 d-inline-block'>Status: <span class='m-l-10  text-success'>Sudah Bayar</span>
                                                                        </span>";
																		}
																		?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php }else{ ?>
                                            <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="media influencer-profile-data d-flex align-items-center p-2">
                                                            <div class="mr-4">
                                                                <i class="fas fa-4x fa-bus"></i>
                                                            </div>
                                                            <div class="media-body ">
                                                                <div class="influencer-profile-data">
                                                                    <h3 class="m-b-10">Anda belum melakukan transaksi apapun.</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php }
                                    }?>
                                    <p align="center">- Sepertinya sudah sampai akhir. -</p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-sms" role="tabpanel" aria-labelledby="pills-sms-tab">
                                        <div class="card">
                                            <h5 class="card-header">SMS dari P.O Budiman untuk Anda</h5>
											<?php
                                    require 'function/kon.php';
                                    $query = mysqli_query($kon, "SELECT transaksi.id_transaksi, transaksi.id_pesan, transaksi.foto, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, tujuan.nama_tujuan, sms.*
                                    FROM sms
                                    JOIN transaksi ON sms.id_transaksi = transaksi.id_transaksi
									JOIN pesan ON transaksi.id_pesan = pesan.id_pesan
									JOIN pelanggan ON pesan.id_pelanggan = pelanggan.id_pelanggan
									JOIN jadwal_keberangkatan ON pesan.id_jadwal = jadwal_keberangkatan.id_jadwal
									JOIN kendaraan ON pesan.id_kendaraan = kendaraan.id_kendaraan
                                    JOIN tujuan ON jadwal_keberangkatan.id_tujuan = tujuan.id_tujuan
                                    where pesan.id_pelanggan='$_SESSION[id_pelanggan]' order by id_sms desc") or die("Gagal query");
                                    while ($r = mysqli_fetch_assoc($query)) { 
									if ($r > 0) { ?>
                                            <div class="card-body">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“<?= $r['isi_sms']; ?>”</p>
                                                    <span class="text-dark font-weight-bold"><?=time_sejak(strtotime($r['tgl_sms']));?></span><small class="text-mute"> (Admin Pusat P.O Budiman)</small>
                                                </div>
                                            </div>
									<?php }else{
											echo "Belum ada SMS dari Admin.";
									}
									}?>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
                                        <div class="card">
                                            <h5 class="card-header">Akan Segera Datang!</h5>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-saran" role="tabpanel" aria-labelledby="pills-saran-tab">
                                        <div class="card">
                                            <h5 class="card-header">Akan Segera Datang!</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            <!-- ============================================================== -->
            <?php include 'footer.php' ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
   
</body>
 
</html>