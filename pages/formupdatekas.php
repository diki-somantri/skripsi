<?php
$id=$_GET['id'];
$query=mysql_query("select k.*,kb.idKategori from kas k,kegiatanBelanja kb where k.idKas='$id' and kb.idKegiatan=k.idKegiatan");
$data=mysql_fetch_array($query);
?>
<div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Ubah Kas Harian BLUD</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/updatekas.php?id=<?php echo $id?>" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-6">
Tanggal <input required type="text" name="tgl" class="form-control datepicker-input" style="width: 300px;" value="<?php echo date("d/m/Y",strtotime($data['tgl']));?>" readonly=""/><br />
Transaksi <input required type="text" name="transaksi" class="form-control" style="width: 300px;" value="<?php echo $data['transaksi']?>"/><br />

Kategori Belanja<select name="kategori" id="kategori" class="form-control" style="width: 300px;">
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
Kegiatan Belanja<select name="kegiatan" id="kegiatan" class="form-control" style="width: 300px;">
<?php
include "pilihankegiatan.php";
?>
</select><br />

Statu <select name="status" class="form-control" style="width: 300px;"/>
<?php
$status=array('Debit','Kredit');
foreach($status as $dk){
         if($data['status']==$dk){
            echo "<option value='".$dk."' selected>".$dk."</option>";
        }else{  
            echo "<option value='".$dk."'>".$dk."</option>";
        }
        }
    ?>
</select><br />
Biaya <input required type="text" id="biaya" name="biaya" class="form-control" style="width: 120px;" value="<?php echo $data['biaya']?>" oninput="Validation('biaya','a')" maxlength="11"/><br />
</div>
<div class="col-sm-6">
<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" style="width: 150px;height: 150px;">
      <img src="image/<?php echo $data['foto']?>" style="width: 140px;height:140px" id="blah">
    </a>
  </div>
</div>
Bukti Kas<br />
<input type="file" name="foto" id="foto" value="test"/>
</div>
</div>
<input type="submit" value="Ubah" class="btn btn-primary"/>
<a href="page.php?page=kas" class="btn btn-primary"/>Batal</a>
</form>
<script>
function Validation(id,valid){
    if(valid == "h"){
        cek = /[^a-zA-Z\ ]/;
    }else{
        cek = /[^0-9]/;
    }
    txt = document.getElementById(id).value;
    execute = txt.replace(cek,"");
    document.getElementById(id).value = execute;
}

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#foto").change(function(){
    readURL(this);
});


</script>