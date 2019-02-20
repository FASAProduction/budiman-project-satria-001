<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_tujuan = $_GET['id_tujuan'];

$query = mysqli_query($kon, "delete from tujuan where id_tujuan='$id_tujuan'") or die(mysqli_error());

if ($query) {
    ?>
<script language="JavaScript">
alert('Anda Berhasil Menghapus Data');
window.location = '../../index.php?act=data_tujuan';
</script>
<?php
}
?>
