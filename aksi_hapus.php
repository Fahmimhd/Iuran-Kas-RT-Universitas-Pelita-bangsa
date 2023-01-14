<?php
// koneksi database
include 'koneksi.php';
// menangkap data id yang di kirim dari url
$bhapus = $_GET['id_wrg'];
// menghapus data dari database
mysqli_query($koneksi, "delete from twrg where id='$bhapus'id_wrg");
// mengalihkan halaman kembali ke index.php
header("location:index.php"); 
?>