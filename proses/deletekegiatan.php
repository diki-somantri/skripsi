<?php
include"koneksi.php";
$id=$_GET['id'];
$query=mysql_query("delete from kegiatanBelanja where idKegiatan='$id'");
header("location: $url/page.php?page=kegiatan");
?>