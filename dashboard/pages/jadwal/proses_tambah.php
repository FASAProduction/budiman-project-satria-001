<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$tujuan = $_POST['tujuan'];
$harga = $_POST['harga'];
$id_kendaraan = $_POST['id_kendaraan'];
$jml_kursi = $_POST['jml_kursi'];



$sql = "insert into jadwal_keberangkatan (tgl_berangkat, jam, tujuan, harga, id_kendaraan, jml_kursi)
                values
                ('$tanggal', '$jam', '$tujuan', '$harga', '$id_kendaraan', '$jml_kursi')";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    echo "Gagal Simpan, silahkan diulangi!<br />";
    echo mysqli_error($koneksi);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
} else {
    ?>
        <script language="JavaScript">
            alert('Anda Berhasil Menambah Data');
            window.location='../../index.php?act=data_jadwal';
        </script>
        <?php

    }
    ?>
