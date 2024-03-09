<div class="row">
                <div class="col-xs-8">
                    <h1>Indikator Kegiatan</h1>
                </div>
                <div class="col-xs-4 text-right" style="margin-top: 20px;">
                    <a href="page.php?page=forminputindikatorkegiatan" class="btn btn-default">Input Indikator Kegiatan</a>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <hr style="margin-top: 5px;" />
            <!-- /.row -->
<div class="tabel-responsive">
<table class="table table-bordered">
<tr>
<th>No Indikator Kegiatan</th>
<th>Deskripsi</th>
<th>Kegiatan</th>
<th>Biaya</th>
<th>Sub Kegiatan</th>
<th>Tahun</th>
<th>Proses</th>
</tr>
<?php

$query=mysql_query("select ik.*,ke.deskripsi as deskripsi_kegiatan from indikator_kegiatan ik,kegiatan ke where ik.id_kegiatan=ke.id_kegiatan");
$baris=mysql_num_rows($query);
if($baris>0){
    $no=1;
    while($data=mysql_fetch_array($query)){
        echo"<tr>
        <td>$no</td>
        <td>".$data['deskripsi']."</td>
        <td>".$data['deskripsi_kegiatan']."</td>
        <td>".$data['biaya']."</td>
        <td>".$data['sub_kegiatan']."</td>
        <td>".$data['tahun']."</td>
        <td>
        <a href='page.php?page=formupdateindikatorkegiatan&id=".$data['id_indikator']."'>Update</a> | 
        <a href='#' onclick=\"yakin('".$data['id_indikator']."','deleteindikatorkegiatan.php');\">Delete</a>
        </td>
        </tr>";
        $no++;
    }
}
?>
</table>
</div>            