<?php
include"koneksi.php";
$des=$_POST['deskripsi'];
$kegiatan=$_POST['kegiatan'];
$bi=$_POST['biaya'];
$sub=$_POST['sub_kegiatan'];
$ta=$_POST['tahun'];


if(empty($des)){
		echo "<script>alert('Deskripsi harus diisi!');window.location = 'http://localhost/rskgm/page.php?page=forminputindikatorkegiatan';</script>";
		exit();
	}else if(! preg_match("/^([a-z])+$/i",$des)){
    	echo "<script>alert('Deskripsi harus berupa huruf!');window.location = 'http://localhost/rskgm/page.php?page=forminputindikatorkegiatan';</script>";
		exit();
}else if(empty($kegiatan)){
		echo "<script>alert('Kegiatan harus diisi!');window.location = 'http://localhost/rskgm/page.php?page=forminputindikatorkegiatan';</script>";
		exit();
}else if(empty($bi)){
		echo "<script>alert('Biaya harus diisi!');window.location = 'http://localhost/rskgm/page.php?page=forminputindikatorkegiatan';</script>";
		exit();
}else if(empty($ta)){
		echo "<script>alert('Tahun harus diisi!');window.location = 'http://localhost/rskgm/page.php?page=forminputindikatorkegiatan';</script>";
		exit();
}
$query=mysql_query("insert into indikator_kegiatan(id_kegiatan,deskripsi,biaya,sub_kegiatan,tahun) values ('$kegiatan','$des','$bi','$sub','$ta')");
header("location: $url/page.php?page=indikatorkegiatan");
?>