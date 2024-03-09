<div class="row">
                <div class="col-lg-12">
                   <center> <h1 class="page-header">Input Kegiatan Belanja</h1> </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/inputkegiatan.php">
Kegiatan Belanja<input required type="text" name="deskripsi" class="form-control" style="width: 300px;"/><br />
Kategori Belanja<select name="kategori" class="form-control" style="width: 300px;">
<?php
$query=mysql_query("select * from kategoriBelanja");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data=mysql_fetch_array($query)){
        echo "<option value='".$data['idKategori']."'>".$data['deskripsi']."</option>";
    }

}
?>
</select><br />
<input type="submit" value="Simpan" class="btn btn-primary"/>
<a href="page.php?page=kegiatan" class="btn btn-primary"/>Batal</a>
</form>