<?php
include"koneksi.php";
$id=$_GET['id'];
$query=mysql_query("delete from kategoriBelanja where idKategori='$id'");
header("location: $url/page.php?page=kategori");
?>