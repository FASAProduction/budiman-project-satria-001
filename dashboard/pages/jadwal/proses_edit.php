<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_jadwal = $_POST['id_jadwal'];
$tanggal = $_POST['tgl_berangkat'];
$jam = $_POST['jam'];
$id_tujuan = $_POST['id_kendaraan'];
$id_kendaraan = $_POST['id_kendaraan'];
$jml_kursi = $_POST['jml_kursi'];
$diskon = $_POST['diskon'];
	
//update data di database sesuai user_id

$sql = "update jadwal_keberangkatan set
		tgl_berangkat='$tanggal',
		jam='$jam',
        id_tujuan='$id_tujuan',
		id_kendaraan='$id_kendaraan',
		jml_kursi='$jml_kursi',
		diskon='$diskon'
        where id_jadwal = '$id_jadwal'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='../../index.php?act=data_jadwal';
	 </script>
<?php

}
?>