<center><h1>Laporan Kas Harian BLUD</h1></center>
<hr style="margin-top: 5px;" />
<form method="POST" action="">
Berdasarkan<br />
Kategori Belanja<select name="kategori" id="kategori" class="form-control" style="width: 300px;">
<option value="">Pilih</option>
<?php
$query=mysql_query("select * from kategoriBelanja");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data=mysql_fetch_array($query)){
        $s =  (isset($_POST['submit']) && $_POST['kategori'] == $data['idKategori'])? " selected" : "";
        echo "<option value='".$data['idKategori']."'".$s.">".$data['deskripsi']."</option>";
    }

}
?>
</select><br />
Kegiatan Belanja<select name="kegiatan" id="kegiatan" class="form-control" style="width: 300px;">
<?php
include "pilihankegiatan.php";
?>
<option id="loading_kegiatan"></option>
</select><br /> 
<div class="row">
<div class="col-xs-1">
Periode
</div>
<div class="col-xs-2">
<input type="text" name="tgl1" class="form-control datepicker-input" style="width: 150px;" value="<?php echo (isset($_POST['submit']))? $_POST['tgl1'] : ""; ?>" readonly=""/>
</div>
<div class="col-xs-1">
s.d
</div>
<div class="col-xs-2">
<input type="text" name="tgl2" class="form-control datepicker-input" style="width: 150px;" value="<?php echo (isset($_POST['submit']))? $_POST['tgl2'] : ""; ?>" readonly=""/>
</div>
</div>
<br />
<?php
if(isset($_POST['submit'])){
?>
<a href="proses/printkas.php?kegiatan=<?php echo $_POST['kegiatan']; ?>&tgl1=<?php echo urlencode($_POST['tgl1']); ?>&tgl2=<?php echo urlencode($_POST['tgl2']); ?>" class="btn btn-default">
 Export Excell   
</a>
<?php
}
?>
<input type="submit"  name="submit" value="Cari Data Laporan" class="btn btn-default"/>
<br />
<br />
</form>

<div class="tabel-responsive" id="view">
<?php 
if(isset($_POST['submit'])){
include "laporankasdata.php"; 
}
?>
</div>
<br />
<br />
<br />            