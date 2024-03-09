<?php
include "../proses/koneksi.php";
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=kas".date('dmYs').".xls");
?>

<table>
<tr>
<td colspan="8" style="background: #C0504D;color:white" align="center">KAS HARIAN</td>
</tr>
<tr>
<td colspan="8" style="background: #C0504D;color:white" align="center" >BLUD RSKGM</td>
</tr>
<tr></tr>
</table>
<table border="1">
<tr>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">No Kas</td>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Tanggal</td>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Transaksi</td>
<td colspan="2" rowspan="1" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Uraian</td>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Debit</td>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Kredit</td>
<td rowspan="2" style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Saldo</td>
</tr>
<tr>
<td style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Belanja</td>
<td style="vertical-align:middle;background: #9BBB59;color:white;" align="center">Rincian</td>
</tr>
<?php
$where = "";

if(isset($_GET['kegiatan']) && ! empty($_GET['kegiatan']) )
    $where .= " and kb.idKegiatan='".$_GET['kegiatan']."'";   

if(isset($_GET['tgl1']) && ! empty($_GET['tgl2']) && ! empty($_GET['tgl1'])){
$tgl1=explode("/",$_GET['tgl1']);
$tanggal1=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];
$tgl2=explode("/",$_GET['tgl2']);
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
<table>
<tr>
<td colspan="5"></td>
<td colspan="3" align="center">Bandung </td>
</tr>
<tr>
<td colspan="5"></td>
<td colspan="3" align="center">Direktur Rumah Sakit Khusus Gigi dan Mulut</td>
</tr>
<tr>
<td colspan="5"></td>
<td colspan="3" align="center">Kota Bandung</td>
</tr>
<tr>
<td colspan="5"></td>
<td colspan="3" rowspan="3" align="center"></td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
<td colspan="5"></td>
<td colspan="3" align="center">drg. Hj. Rabaah Puspita Paramita, MM.</td>
</tr>
<tr>
<td colspan="5"></td>
<td colspan="3" align="center">NIP. 19590701 194603 2 005</td>
</tr>
</table>