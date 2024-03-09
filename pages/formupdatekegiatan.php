<?php
$id=$_GET['id'];
$query=mysql_query("select * from kegiatanBelanja where idKegiatan='$id'");
$data=mysql_fetch_array($query);
?>
<div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Ubah Kegiatan Belanja</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/updatekegiatan.php?id=<?php echo $id?>">
Kegiatan Belanja <input type="text" name="deskripsi" class="form-control" style="width: 300px;" value="<?php echo $data['deskripsi']?>"/><br />
Kategori Belanja<select name="kategori" class="form-control" style="width: 300px;">
<?php
$query=mysql_query("select * from kategoriBelanja");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data1=mysql_fetch_array($query)){
        if($data['idKategori']==$data1['idKategori']){
            echo "<option value='".$data1['idKategori']."' selected>".$data1['deskripsi']."</option>";
        }else{
            echo "<option value='".$data1['idKategori']."'>".$data1['deskripsi']."</option>";
        }
    }

}
?>
</select><br />
<input type="submit" value="Ubah" class="btn btn-primary"/>
<a href="page.php?page=kegiatan" class="btn btn-primary"/>Batal</a>
</form>
