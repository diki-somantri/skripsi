<table class="table table-bordered">
<tr>
<th rowspan="2">No Kas</th>
<th rowspan="2">Tanggal</th>
<th rowspan="2">Transaksi</th>
<th rowspan="2">Kegiatan Belanja</th>
<th colspan="2">Status</th>
<th rowspan="2">Saldo</th>
<th rowspan="2">Foto</th>
<th rowspan="2">Proses</th>
</tr>
<tr>
<th>Debit</th>
<th>Kredit</th>
</tr>
<?php
if(isset($_POST['cari']))
    include "../proses/koneksi.php";
    
$where = (isset($_POST['cari']))? " AND (k.transaksi like '%".$_POST['cari']."%' or kb.deskripsi like '%".$_POST['cari']."%' or k.biaya like '%".$_POST['cari']."%' or k.tglTransaksi like '%".$_POST['cari']."%')" : "";
//echo "select k.*,kb.deskripsi from kas k,kegiatanBelanja kb where k.idKegiatan=kb.idKegiatan$where order by tgl";
$query=mysql_query("select k.*,kb.deskripsi from kas k,kegiatanBelanja kb where k.idKegiatan=kb.idKegiatan$where order by k.tgl") or die(mysql_error());
$baris=mysql_num_rows($query);
if($baris>0){
    $no=1;
    $cek=mysql_query("select YEAR(tglTransaksi) as tahun from kas GROUP BY YEAR(tglTransaksi)");
    $saldo = array();
    while($c = mysql_fetch_array($cek)){
        $saldo[$c['tahun']] = 0;
    }
    while($data=mysql_fetch_array($query)){
        echo"<tr>
        <td>$no</td>
        <td>".date('d/m/Y',strtotime($data['tglTransaksi']))."</td>
        <td>".$data['transaksi']."</td>
        <td>".$data['deskripsi']."</td>";
        
        if($data['status'] == "Debit"){
            $saldo[date('Y', strtotime($data['tglTransaksi']))] += $data['biaya'];
            echo "<td>".number_format($data['biaya'],0,'','.')."</td><td></td>";
        }else{
            $saldo[date('Y', strtotime($data['tglTransaksi']))] -= $data['biaya'];
            echo "<td></td><td>".number_format($data['biaya'],0,'','.')."</td>";
        }
        
        echo "<td>".number_format($saldo[date('Y', strtotime($data['tglTransaksi']))],0,'','.')."</td>
        <td><a href='javascript:void();' onclick='tingali(\"image/".$data['foto']."\");' data-toggle='modal' data-target='#myModal'><img src='image/".$data['foto']."' width='100'></a></td>
        <td>
        <a href='page.php?page=formupdatekas&id=".$data['idKas']."'>Ubah</a> | 
        <a href='#' onclick=\"yakin('".$data['idKas']."','deletekas.php');\">Hapus</a>
        </td>
        </tr>";
        $no++;
    }
}
?>
</table>