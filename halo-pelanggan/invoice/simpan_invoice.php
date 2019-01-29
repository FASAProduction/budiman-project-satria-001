<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$id_transaksi = $_POST['id_transaksi'];
$id_pesan = $_POST['id_pesan'];
$id_jadwal = $_POST['id_jadwal'];
$jml_penumpang = $_POST['jml_penumpang'];


$sql = "INSERT INTO transaksi (id_transaksi, id_pesan, foto)
        VALUES
        ('$id_transaksi', '$id_pesan', '')";
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
            alert('Baik. Anda bisa mengunggah bukti pembayaran Anda nanti.');
            window.location='../my-transaction-list/index.php';
        </script>
        <?php
    }
    ?>
