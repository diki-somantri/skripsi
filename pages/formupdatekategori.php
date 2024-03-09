<?php
$id=$_GET['id'];
$query=mysql_query("select * from kategoriBelanja where idKategori='$id'");
$data=mysql_fetch_array($query);
?>
<div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Ubah Kategori Belanja</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/updatekategori.php?id=<?php echo $id?>">
Kategori Belanja <input type="text" name="deskripsi" class="form-control" style="width: 300px;" value="<?php echo $data['deskripsi']?>"/><br /><br />
<input type="submit" value="Ubah" class="btn btn-primary"/>
<a href="page.php?page=kategori" class="btn btn-primary"/>Batal</a>
</form>
