<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$acak = "n8g3d2g7d33gdkw7hsjghd2etr5quw3";
$acak2 = "j2rwt3iey3lap0kjdnd7nkd6jm7ndkd";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$usia = $_POST['usia'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$pass = md5($acak . md5($_POST['password']) . $acak2);


$sql = "insert into pelanggan (nama_pelanggan, alamat, jk, usia, no_ktp, no_telp, password) 
                values
                ('$nama', '$alamat', '$jk', '$usia', '$ktp', '$telp', '$pass')";
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
            window.location='../../index.php?act=data_pelanggan';
        </script>
        <?php

    }
    ?>