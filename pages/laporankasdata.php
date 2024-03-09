<table class="table table-bordered">
<tr>
<th rowspan="2">No Kas</th>
<th rowspan="2">Tanggal</th>
<th rowspan="2">Transaksi</th>
<th colspan="2" rowspan="1">Uraian</th>
<th rowspan="2">Debit</th>
<th rowspan="2">Kredit</th>
<th rowspan="2">Saldo</th>
</tr>
<tr>
<th>Belanja</th>
<th>Rincian</th>
</tr>
<?php
$where = "";

if(isset($_POST['kegiatan']) && ! empty($_POST['kegiatan']) )
    $where .= " and kb.idKegiatan='".$_POST['kegiatan']."'";   

if(isset($_POST['tgl1']) && ! empty($_POST['tgl2']) && ! empty($_POST['tgl1'])){
$tgl1=explode("/",$_POST['tgl1']);
$tanggal1=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];
$tgl2=explode("/",$_POST['tgl2']);
$tanggal2=$tgl2[2]."-".$tgl2[1]."-".$tgl2[0];
    $where .= " and k.tglTransaksi between '".date("Y-m-d",strtotime($tanggal1))."' and '".date("Y-m-d",strtotime($tanggal2))."'";
}
//echo "select k.*,kb.deskripsi as kegiatan ,kt.deskripsi as kategori from kas k,kegiatanBelanja kb,kategoriBelanja kt where k.idKegiatan=kb.idKegiatan and kt.idKategori=kb.idKategori$where order by k.tgl";exit();
//echo "select k.*,kb.deskripsi from kas k,kegiatanBelanja kb where k.idKegiatan=kb.idKegiatan$where order by k.tgl";
//exit(); 
$query=mysql_query("select k.*,kb.deskripsi as kegiatan ,kt.deskripsi as kategori from kas k,kegiatanBelanja kb,kategoriBelanja kt where k.idKegiatan=kb.idKegiatan and kt.idKategori=kb.idKategori$where order by k.tgl") or die(mysql_error());
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
        <td>".$data['kategori']."</td>
        <td>".$data['kegiatan']."</td>";
        
        if($data['status'] == "Debit"){
            $saldo[date('Y', strtotime($data['tglTransaksi']))] += $data['biaya'];
            echo "<td>".number_format($data['biaya'],0,'','.')."</td><td></td>";
        }else{
            $saldo[date('Y', strtotime($data['tglTransaksi']))] -= $data['biaya'];
            echo "<td></td><td>".number_format($data['biaya'],0,'','.')."</td>";
        }
        
        echo "<td>".number_format($saldo[date('Y', strtotime($data['tglTransaksi']))],0,'','.')."</td>
        </tr>";
        $no++;
    }
}
?>
</table>