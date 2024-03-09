<?php
session_start();
include"koneksi.php";
$tr=$_POST['transaksi'];
$st=$_POST['status'];
$bi=$_POST['biaya'];
$ke=$_POST['kegiatan'];

$tgl=explode("/",$_POST['tgl']);
$tanggal=$tgl[2]."-".$tgl[1]."-".$tgl[0];
if(empty($ke)){
    echo "<script>alert('Kegiatan Harus Diisi!');window.location = '".$url."/page.php?page=forminputkas';</script>";
exit();    
}
$nama_file = date('YmdHis').$_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$tmp_file = $_FILES['foto']['tmp_name'];
$path = "../image/".$nama_file;
move_uploaded_file($tmp_file, $path);


$query=mysql_query("insert into kas(tglTransaksi,transaksi,idKegiatan,status,biaya,username,foto) values ('$tanggal','$tr','$ke','$st','$bi','".$_SESSION['username']."','$nama_file')");
header("location: $url/page.php?page=kas");
?>