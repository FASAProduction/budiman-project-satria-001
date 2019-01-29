<?php
$conn= mysqli_connect("localhost","root","");
mysqli_select_db($conn,"budiman");


$lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 1 hari

// proses untuk melakukan penghapusan data

$query1 = "DELETE FROM pesan
          WHERE DATEDIFF(CURDATE(), tgl_pesan) > $lama";
$hasil = mysqli_query($conn,$query1);
?>
