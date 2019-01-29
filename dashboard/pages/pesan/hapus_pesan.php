<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_pesan = $_GET['id_pesan'];
$id_jadwal = $_GET['id_jadwal'];
$jml_penumpang = $_GET['jml_penumpang'];

$lama = 1; // lama data adalah 1 hari

$query = "delete from pesan where id_pesan='$id_pesan' and DATEDIFF(CURDATE(), tgl_pesan) > $lama";
$kekka = mysqli_query ($kon, $query);
$query = "update jadwal_keberangkatan set jml_kursi = jml_kursi + $jml_penumpang where id_jadwal = '$id_jadwal'";
$kekka2 = mysqli_query ($kon, $query);

if (!$kekka && !$kekka2) {
	echo "Gagal Hapus, silahkan diulangi!<br />";
    echo mysqli_error($kon);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
}else{
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_pesan';
	</script>
<?php } 
?>