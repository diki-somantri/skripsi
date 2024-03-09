<?php
session_start();
include "koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];
$query=mysql_query("select * from user where username='$user'");
$baris=mysql_num_rows($query);
if($baris>0){
    $data=mysql_fetch_array($query);
    if($data['password']==md5($pass)){
        $_SESSION['username']=$data['username'];
        $_SESSION['nama']=$data['nama'];
        header("location: http://localhost/ta/page.php");
    }else{
        header("location: http://localhost/ta/index.php?pesan=Password Salah !");
    }
}else{
        header("location: http://localhost/ta/index.php?pesan=Username Salah !");
}
?>