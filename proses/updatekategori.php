<?php
session_start();
include"koneksi.php";
$des=$_POST['deskripsi'];
$id=$_GET['id'];
$query=mysql_query("update kategoriBelanja set deskripsi='$des',username='".$_SESSION['username']."',tgl=NOW() where idKategori='$id'");
header("location: $url/page.php?page=kategori");
?>