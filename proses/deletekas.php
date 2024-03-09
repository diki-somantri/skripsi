<?php
include"koneksi.php";
$id=$_GET['id'];
$query=mysql_query("delete from kas where idKas='$id'");
header("location: $url/page.php?page=kas");
?>