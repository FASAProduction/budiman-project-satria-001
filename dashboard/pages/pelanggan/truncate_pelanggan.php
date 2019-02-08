<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$query = mysqli_query($kon, "TRUNCATE TABLE pelanggan") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Semua Data');
	 	window.location='../../index.php?act=data_pelanggan';
	</script>
	<?php 
}
?>