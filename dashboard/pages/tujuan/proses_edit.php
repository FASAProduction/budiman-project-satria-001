<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_tujuan = $_POST['id_tujuan'];
$nama_tujuan = $_POST['nama_tujuan'];
$harga = $_POST['harga'];

//update data di database sesuai user_id

$sql = "update tujuan set
		nama_tujuan='$nama_tujuan',
		harga='$harga'
        where id_tujuan = '$id_tujuan'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>

<script language="JavaScript">
alert('Anda Berhasil Mengubah Data');
window.location = '../../index.php?act=data_tujuan';
</script>
<?php

}
?>
