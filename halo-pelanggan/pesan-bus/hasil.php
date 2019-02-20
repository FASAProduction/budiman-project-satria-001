<?php
require '../function/kon.php';
$tgl_berangkat = $_GET['tgl_berangkat'];
$tujuan = $_GET['tujuan'];
$pelanggan = $_SESSION['id_pelanggan'];
$sql = "SELECT *, nama_tujuan, merek_kendaraan, nomor_kendaraan, kelas_kendaraan
        FROM `jadwal_keberangkatan`, kendaraan, tujuan
        WHERE jadwal_keberangkatan.id_tujuan=tujuan.id_tujuan
            AND kendaraan.id_kendaraan=jadwal_keberangkatan.id_kendaraan
            AND jadwal_keberangkatan.id_tujuan = '$tujuan'
            AND tgl_berangkat = '$tgl_berangkat'";
$query2 = mysqli_query($kon, $sql) or die("Gagal query");
$data = mysqli_num_rows($query2);
if ($data > 0) {
  $query = mysqli_query($kon, "SELECT *, nama_tujuan, merek_kendaraan, harga, harga_kelas, nomor_kendaraan, kelas_kendaraan
                               FROM `jadwal_keberangkatan`, kendaraan, tujuan
                               WHERE jadwal_keberangkatan.id_tujuan=tujuan.id_tujuan
                                    AND kendaraan.id_kendaraan=jadwal_keberangkatan.id_kendaraan
                                    AND jadwal_keberangkatan.id_tujuan = '$tujuan'
                                    AND tgl_berangkat = '$tgl_berangkat'") or die("Gagal query");
  while ($r = mysqli_fetch_assoc($query)) {
      $bayar = $r['harga'] + $r['harga_kelas'];
    if($r['merek_kendaraan'] != null){
          ?>
          <?php
          $diskon = ($r['diskon']);

          if ($r['diskon'] == $diskon){
          $total = (($bayar * $diskon)/100);
          $hasil = $bayar - $total;
          }else{
              $hasil == $bayar;
          }
          ?>

          <?php
          if ($diskon > 0){
            $promo = "<span class='badge badge-success'>Diskon $diskon%</span>";
          }else{
              $promo = "";
          }
          ?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="mb-0">Tujuan: <?= $r['nama_tujuan']; ?> <?php echo $promo; ?></h4>

        </div>
        <div class="card-body">
            <p class="card-text">
                Tanggal Berangkat: <b><?= $r['tgl_berangkat']; ?></b><br />
                Jam Berangkat: <b><?= $r['jam']; ?></b><br />
                Merek Kendaraan: <b><?= $r['merek_kendaraan']; ?></b><br />
                Nomor Kendaraan: <b><?= $r['nomor_kendaraan']; ?></b><br />
                Kelas: <b><?= $r['kelas_kendaraan']; ?></b>
            </p>
            <button class="btn btn-primary">
                <?= rupiah($hasil); ?>
            </button>
            <a href="../cart/index.php?id_jadwal=<?= $r['id_jadwal']; ?>
                    &&id_kendaraan=<?= $r['id_kendaraan']; ?>
                    &&tujuan=<?= $r['nama_tujuan']; ?>
                    &&id_pelanggan=<?= $pelanggan; ?>
                    &&total=<?= $hasil ?>"
                class="btn btn-success">Pesan</a>
        </div>
    </div>
</div>
<?php
}else {
?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="mb-0">Jadwal Tidak Ditemukan</h4>
        </div>
    </div>
</div>
<?php
}
    }
  }
?>
