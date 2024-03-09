<table class="table table-bordered">
<tr>
<th>No Kegiatan</th>
<th>Kegiatan Belanja</th>
<th>Kategori Belanja</th>
<th>Proses</th>
</tr>
<?php
if(isset($_POST['cari']))
include "../proses/koneksi.php";
$where = (isset($_POST['cari']))? " AND (ke.deskripsi like '%".$_POST['cari']."%' or ka.deskripsi like '%".$_POST['cari']."%')" : "";
$query=mysql_query("select ke.*,ka.deskripsi as kategoriBelanja from kegiatanBelanja ke,kategoriBelanja ka where ke.idKategori=ka.idKategori $where") or die(mysql_error());
$baris=mysql_num_rows($query);
if($baris>0){
    $no=1;
    while($data=mysql_fetch_array($query)){
        echo"<tr>
        <td>$no</td>
        <td>".$data['deskripsi']."</td>
        <td>".$data['kategoriBelanja']."</td>
        <td>
        <a href='page.php?page=formupdatekegiatan&id=".$data['idKegiatan']."'>Ubah</a>
        </td>
        </tr>";
        $no++;
    }
}
?>
</table>