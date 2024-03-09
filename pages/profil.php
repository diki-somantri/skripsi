<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php 
$query=mysql_query("select * from user where username='".$_SESSION['username']."'");
$data=mysql_fetch_array($query); 
?>    
<form method="post" action="proses/updateprofil.php">
Username <input type="text" name="username" class="form-control" style="width: 300px;" value="<?php echo $data['username'];?>" readonly="readonly"/><br />
Nama <input type="text" name="nama" class="form-control" style="width: 300px;" value="<?php echo $data['nama'];?>"/><br />
Isi password jika ingin di ubah<br />
Password <input type="password" name="password" class="form-control" style="width: 300px;"/><br />
<input type="submit" value="Ubah" class="btn btn-primary"/>
<a href="page.php?page=home" class="btn btn-primary"/>Batal</a>
</form>