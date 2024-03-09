<?php
session_start();
include"koneksi.php";
$des=$_POST['deskripsi'];
$id=$_GET['id'];
$kategori=$_POST['kategori'];
$query=mysql_query("update kegiatanBelanja set deskripsi='$des',idKategori='$kategori',username='".$_SESSION['username']."',tgl=NOW() where idKegiatan='$id'");
header("location: $url/page.php?page=kegiatan");
?>