<?php
if(isset($_POST['idKategori'])){
include "../proses/koneksi.php";
echo"<option value=''>Pilih</option>";
$idKegiatan=$_POST['idKategori'];
$query=mysql_query("select * from kategoriBelanja where idKategori='$idKategori'");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data=mysql_fetch_array($query)){
        echo "<option value='".$data['idKategori']."'>".$data['deskripsi']."</option>";
    }
}
}else{
    echo"WEW";
}
?>
Kategori Belanja<select name="kategori" id="kategori" class="form-control" style="width: 300px;">
<?php
include "pilihankategori.php";
?>
<option id="loading_kategori"></option>
</select><br />