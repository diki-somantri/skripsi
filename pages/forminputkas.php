<div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Input Kas Harian BLUD</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<form method="post" action="proses/inputkas.php" enctype="multipart/form-data" name="inputkas">
<div class="row">
<div class="col-sm-6">
Tanggal <input required type="text" name="tgl" class="form-control datepicker-input" style="width: 300px;" readonly=""/><br />
Transaksi <input required type="text" name="transaksi" class="form-control" style="width: 300px;"/><br />
Kategori Belanja<select name="kategori" id="kategori" class="form-control" style="width: 300px;">
<option value="">Pilih</option>
<?php
$query=mysql_query("select * from kategoriBelanja");
$baris=mysql_num_rows($query);
if($baris>0){
    while($data=mysql_fetch_array($query)){
        echo "<option value='".$data['idKategori']."'>".$data['deskripsi']."</option>";
    }

}
?>
</select><br />
Kegiatan Belanja<select name="kegiatan" id="kegiatan" class="form-control" style="width: 300px;" >
<?php
include "pilihankegiatan.php";
?>
<option id="loading_kegiatan"></option>
</select><br /> 
Status <select name="status" class="form-control" style="width: 300px;"/>
<option value="Debit">Debit</option>
<option value="Kredit" selected="">Kredit</option>
</select>
<br />
Biaya <input required type="text" id="biaya" name="biaya" class="form-control" style="width: 120px;" oninput="Validation('biaya','a')" maxlength="11"/>

</div>
<div class="col-sm-6">
<div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" style="width: 150px;height: 150px;">
      <img id="blah" src="image/noimage.png" style="width: 140px;height:140px">
    </a>
  </div>
</div>
Bukti Kas<br />
<input type="file" name="foto" id="foto"/>
</div>
</div>
<br />
<input type="submit" value="Simpan" class="btn btn-primary"/>
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