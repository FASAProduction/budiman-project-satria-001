<?php
include 'kon.php';

$acak = "n8g3d2g7d33gdkw7hsjghd2etr5quw3";
$acak2 = "j2rwt3iey3lap0kjdnd7nkd6jm7ndkd";
// menyimpan data kedalam variabel
$nama_pelanggan  	= $_POST['nama_pelanggan'];
$alamat             = $_POST['alamat'];
$jk   	            = $_POST['jk'];
$tgl_lahir   	    = $_POST['tgl_lahir'];
$no_ktp  			= $_POST['no_ktp'];
$no_telp  			= $_POST['no_telp'];
$password  			= md5($acak . md5($_POST['password']) . $acak2);
// query SQL untuk insert data
$query="INSERT INTO pelanggan SET nama_pelanggan='$nama_pelanggan',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir',no_ktp='$no_ktp',no_telp='$no_telp',password='$password'";
mysqli_query($kon, $query);
// mengalihkan ke halaman index.php
header ('location:../masuk/');
?>
