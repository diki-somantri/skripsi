<?php
include"koneksi.php";
$des=$_POST['deskripsi'];
$kegiatan=$_POST['kegiatan'];
$bi=$_POST['biaya'];
$sub=$_POST['sub_kegiatan'];
$ta=$_POST['tahun'];
$id=$_GET['id'];
$query=mysql_query("update indikator_kegiatan set id_kegiatan='$kegiatan',deskripsi='$des',biaya='$bi',sub_kegiatan='$sub',tahun='$ta' where id_indikator='$id'");
header("location: $url/page.php?page=indikatorkegiatan");
?>