<?php
require '../function/kon.php';
$jam = $_GET['jam'];
$tgl_berangkat = $_GET['tgl_berangkat'];
$tujuan = $_GET['tujuan'];
$pelanggan = $_SESSION['id_pelanggan'];
$kelas_kendaraan = $_GET['kelas_kendaraan'];
$sql = "SELECT kendaraan.*, jadwal_keberangkatan.*, SUM(harga+harga_kelas) AS total
                             FROM jadwal_keberangkatan,kendaraan
                             WHERE tgl_berangkat='$tgl_berangkat' AND kelas_kendaraan='$kelas_kendaraan' AND jam='$jam' AND tujuan='$tujuan'";
$query2 = mysqli_query($kon, $sql) or die("Gagal query");
$data = mysqli_num_rows($query2);
if ($data > 0) {
  $query = mysqli_query($kon, "SELECT kendaraan.*, jadwal_keberangkatan.*, SUM(harga+harga_kelas) AS total
                               FROM jadwal_keberangkatan,kendaraan
                               WHERE tgl_berangkat='$tgl_berangkat' AND kelas_kendaraan='$kelas_kendaraan' AND jam='$jam' AND tujuan='$tujuan'") or die("Gagal query");
  while ($r = mysqli_fetch_assoc($query)) {
    if($r['merek_kendaraan'] != null){
          ?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="mb-0">Tujuan: <?= $r['tujuan']; ?></h4>

        </div>
        <div class="card-body">
            <p class="card-text">
            Tanggal Berangkat: <?= $r['tgl_berangkat']; ?><br/>
            Jam Berangkat: <?= $r['jam']; ?><br/>
            Merek Kendaraan: <?= $r['merek_kendaraan']; ?><br/>
            Nomor Kendaraan: <?= $r['nomor_kendaraan']; ?><br/>
            Kelas: <?= $r['kelas_kendaraan']; ?>
            </p>
            <button class="btn btn-primary">
                <?= rupiah($r['total']); ?>
            </button>
            <a href="../cart/index.php?id_jadwal=<?= $r['id_jadwal']; ?>
                    &&id_kendaraan=<?= $r['id_kendaraan']; ?>
                    &&tujuan=<?= $r['tujuan']; ?>
                    &&id_pelanggan=<?= $pelanggan; ?>
                    &&total=<?= $r['total']; ?>"
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
