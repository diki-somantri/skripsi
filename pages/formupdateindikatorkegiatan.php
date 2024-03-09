<?php
$id=$_GET['id'];
$query=mysql_query("select * from indikator_kegiatan where id_indikator='$id'");
$data=mysql_fetch_array($query);
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Indikator Kategori</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/updateindikatorkegiatan.php?id=<?php echo $id?>">
Deskripsi <input type="text" name="deskripsi" class="form-control" style="width: 300px;" value="<?php echo $data['deskripsi']?>"/><br />
Kegiatan<select name="kegiatan" class="form-control" style="width: 300px;">
<?php
$query=mysql_query("select * from kegiatan");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data1=mysql_fetch_array($query)){
        if($data['id_kegiatan']==$data1['id_kegiatan']){
            echo "<option value='".$data1['id_kegiatan']."' selected>".$data1['deskripsi']."</option>";
        }else{
            echo "<option value='".$data1['id_kegiatan']."'>".$data1['deskripsi']."</option>";
        }
    }

}
?>
</select><br />
Biaya <input type="text" name="biaya" class="form-control" style="width: 300px;" value="<?php echo $data['biaya']?>"/><br />
Sub Kegiatan <input type="text" name="sub_kegiatan" class="form-control" style="width: 300px;" value="<?php echo $data['sub_kegiatan']?>"/><br />
Tahun <input type="text" name="tahun" class="form-control" style="width: 300px;" value="<?php echo $data['tahun']?>"/><br />
<input type="submit" value="Update" class="btn btn-primary"/>
</form>
