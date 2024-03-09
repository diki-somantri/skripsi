<?php
session_start();
include"koneksi.php";
$des=$_POST['deskripsi'];
if(empty($des)){
		echo "<script>alert('Kategori belanja harus di isi!');window.location = 'http://localhost/ta/page.php?page=forminputkategori';</script>";
		exit();
	}
$query=mysql_query("insert into kategoriBelanja(deskripsi,username) values ('$des','".$_SESSION['username']."')");
header("location: $url/page.php?page=kategori");
?>