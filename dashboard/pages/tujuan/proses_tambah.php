<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$nama_tujuan = $_POST['nama_tujuan'];
$harga = $_POST['harga'];



$sql = "insert into tujuan (nama_tujuan, harga)
                values
                ('$nama_tujuan', '$harga')";
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
window.location = '../../index.php?act=data_tujuan';
</script>
<?php

    }
    ?>
