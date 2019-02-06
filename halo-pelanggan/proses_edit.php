<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$acak = "n8g3d2g7d33gdkw7hsjghd2etr5quw3";
$acak2 = "j2rwt3iey3lap0kjdnd7nkd6jm7ndkd";

//tangkap data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$tgl_lahir = $_POST['tgl_lahir'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$pass = md5($acak . md5($_POST['password']) . $acak2);
	
//update data di database sesuai user_id

$sql = "update pelanggan set
		nama_pelanggan='$nama',
		alamat='$alamat',
        jk='$jk',
        tgl_lahir='$tgl_lahir',
		no_ktp='$ktp',
		no_telp='$telp',
		password='$pass'
        where id_pelanggan = '$id_pelanggan'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='my-profile.php';
	 </script>
<?php

}
?>