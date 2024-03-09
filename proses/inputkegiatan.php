<?php
session_start();
include"koneksi.php";
$des=$_POST['deskripsi'];
$kategori=$_POST['kategori'];
if(empty($des)){
		echo "<script>alert('Deskripsi harus di isi!');window.location = 'http://localhost/ta/page.php?page=forminputkegiatan';</script>";
		exit();
	}
$query=mysql_query("insert into kegiatanBelanja(deskripsi,idKategori,username) values ('$des','$kategori','".$_SESSION['username']."')");
header("location: $url/page.php?page=kegiatan");
?>