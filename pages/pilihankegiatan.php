<?php
include "../proses/koneksi.php";
$idKategori=(isset($data['idKategori']))? $data['idKategori'] : $_POST['idKategori'];
$query=mysql_query("select * from kegiatanBelanja where idKategori='$idKategori'");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data1=mysql_fetch_array($query)){
        if(isset($data['idKategori'])){
            if($data['idKegiatan']==$data1['idKegiatan']){
                echo "<option value='".$data1['idKegiatan']."' selected>".$data1['deskripsi']."</option>";
            }else{
                echo "<option value='".$data1['idKegiatan']."'>".$data1['deskripsi']."</option>";
            }
        }else{
            echo "<option value='".$data1['idKegiatan']."'>".$data1['deskripsi']."</option>";
        }
    }

}
?>