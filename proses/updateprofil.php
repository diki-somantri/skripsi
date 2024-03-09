<?php
session_start();
include"koneksi.php";
$us=$_POST['username'];
$na=$_POST['nama'];
$pa=$_POST['password'];
if(isset($pa)){
$query=mysql_query("update user set nama='$na',password=md5'($pa)' where username='$us'");    
}else{
$query=mysql_query("update user set nama='$na' where username='$us'");    
}
$_SESSION['nama']=$na;
header("location: $url/page.php?u=$us");
?>