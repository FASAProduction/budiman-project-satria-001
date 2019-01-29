<?php
include "koneksi.php";

$acak = "n8g3d2g7d33gdkw7hsjghd2etr5quw3";
$acak2 = "j2rwt3iey3lap0kjdnd7nkd6jm7ndkd";

$no_telp = $_POST['no_telp'];
$password = md5($acak . md5($_POST['password']) . $acak2);

session_start();
$query = "select * from pelanggan where no_telp='$no_telp' and password='$password'";
// echo $query;
// die;
$login = mysqli_query($kon, $query);
if (mysqli_num_rows($login) > 0) {
    $ambil = mysqli_fetch_array($login);
    $_SESSION['id_pelanggan'] = $ambil['id_pelanggan'];
    $_SESSION['no_telp'] = $ambil['no_telp'];
    $_SESSION['nama_pelanggan'] = $ambil['nama_pelanggan'];
    $_SESSION['no_ktp'] = $ambil['no_ktp'];
    $_SESSION['alamat'] = $ambil['alamat'];
    $_SESSION['tgl_lahir'] = $ambil['tgl_lahir'];
    $_SESSION['jk'] = $ambil['jk'];
    header("location:../halo-pelanggan/");
} else {
    echo "<script>alert('Username atau Password salah')</script>";
    echo "<meta http-equiv='refresh' content='0 url=./'>";
}

?>