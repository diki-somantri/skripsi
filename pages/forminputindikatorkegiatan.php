<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Indikator Kegiatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/inputindikatorkegiatan.php">
Deskripsi <input type="text" name="deskripsi" class="form-control" style="width: 300px;"/><br />
Kategori<select name="kategori" id="kategori" class="form-control" style="width: 300px;">
<option value="">Pilih</option>
<?php
$query=mysql_query("select * from kategori_belanja");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data=mysql_fetch_array($query)){
        echo "<option value='".$data['id_kategori']."'>".$data['deskripsi']."</option>";
    }
}
?>
</select><br />
Kegiatan<select name="kegiatan" id="kegiatan" class="form-control" style="width: 300px;">
<?php
include "pilihankegiatan.php";
?>
<option id="loading_kegiatan"></option>
</select><br />
Biaya <input type="text" name="biaya" class="form-control" style="width: 300px;"/><br />
Sub Kegiatan <input type="text" name="sub_kegiatan" class="form-control" style="width: 300px;"/><br />
Tahun <select name="tahun" class="form-control" style="width: 300px;">
<option value="">Pilih</option>
<?php
$kurang=date('Y')-5;
$lebih=date('Y')+5;
for($y=$kurang;$y<=$lebih;$y++){
    echo "<option value='$y'> $y </option>";
}
?>
</select>
<br />
<input type="submit" value="Insert" class="btn btn-primary"/>
</form>