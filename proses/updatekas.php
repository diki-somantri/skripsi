<?php
include"koneksi.php";
$id=$_GET['id'];
$tr=$_POST['transaksi'];
$st=$_POST['status'];
$bi=$_POST['biaya'];
$ke=$_POST['kegiatan'];

$tgl=explode("/",$_POST['tgl']);
$tanggal=$tgl[2]."-".$tgl[1]."-".$tgl[0];

$nama_file = date('YmdHis').$_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$tmp_file = $_FILES['foto']['tmp_name'];
$path = "../image/".$nama_file;
$fa = $_FILES['foto']['name'];
if(empty($fa)){
$query=mysql_query("update kas set tgltransaksi='$tanggal',transaksi='$tr',idKegiatan='$ke',status='$st',biaya='$bi',username='".$_SESSION['username']."',tgl=NOW() where idKas='$id'");
}else{
    $query=mysql_query("update kas set tgltransaksi='$tanggal',transaksi='$tr',idKegiatan='$ke',status='$st',biaya='$bi',username='".$_SESSION['username']."',tgl=NOW(),foto='$nama_file' where idKas='$id'");
move_uploaded_file($tmp_file, $path);
}

header("location: $url/page.php?page=kas");
?>