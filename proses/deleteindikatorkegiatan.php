<?php
include"koneksi.php";
$id=$_GET['id'];
$query=mysql_query("delete from indikator_kegiatan where id_indikator='$id'");
header("location: $url/page.php?page=indikatorkegiatan");
?>