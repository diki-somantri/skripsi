<center><h1>Kategori Belanja</h1></center>
<div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4 text-right" style="margin-top: 20px;">
                    <a href="page.php?page=forminputkategori" class="btn btn-default">Tambah Data <img src="image/Add.ico" width="15" height="15"/></a><br /><br />
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="tabel-responsive">
<table class="table table-bordered">
<tr>
<th>No Kategori</th>
<th>Deskripsi</th>
<th colspan="2" class="text-center">Proses</th>
</tr>
<?php

$query=mysql_query("select * from kategoriBelanja");
$baris=mysql_num_rows($query);
if($baris>0){
    $no=1;
    while($data=mysql_fetch_array($query)){
        echo"<tr>
        <td>$no</td>
        <td>".$data['deskripsi']."</td>
        <td class='text-center'>
        <a href='page.php?page=formupdatekategori&id=".$data['idKategori']."'>Ubah</a></td> 
        </td>
        </tr>";
        $no++;
    }
}
?>
</table>
</div>            