<?php
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

session_start();
$login = mysql_query("select * from admin where username='$username' and password='$password'");
if (mysql_num_rows($login) > 0){
$ambil = mysql_fetch_array($login);
$_SESSION['id_admin'] = $ambil['id_admin'];
$_SESSION['username'] = $ambil['username'];
$_SESSION['nama_admin'] = $ambil['nama_admin'];
$_SESSION['hak_akses'] = $ambil['ha'];
if($ambil['hak_akses']=="Super Admin"){
header("location:../dashboard/");
}
}else{
echo "<script>alert('Username atau Password salah')</script>";
echo "<meta http-equiv='refresh' content='0 url=./'>";
}

?>