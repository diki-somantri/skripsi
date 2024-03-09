<center><h1>Kegiatan Belanja</h1></center>
<div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4 text-right" style="margin-top: 20px;">
                    <a href="page.php?page=forminputkegiatan" class="btn btn-default">Tambah Data <img src="image/Add.ico" width="15" height="15"/></a>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            Cari Data Kegiatan
            <input type="text" name="cari" id="cari" oninput="Validation('cari')"/> <span id="loading_cari"></span>
            <br />
            <br />
<div class="tabel-responsive" id="view">
<?php include "kegiatandata.php"; ?>
</div>
<script>
$(document).ready(function(){ 
$("#cari").keyup(function(){
    if($("#cari").val() != ""){
    $("#loading_cari").html("Loading...");
    $.ajax({
       type:'POST',
       url:'http://localhost/ta/pages/kegiatandata.php',
       data:{cari:$("#cari").val()},
       success:function(hasil){
        //alert(hasil);//
    $("#loading_cari").html("");
        $("#view").html(hasil);
       } 
    }); 
    }   
});
});

function Validation(id){
    cek = /[^a-zA-Z\ 0-9]/;
    
    txt = document.getElementById(id).value;
    execute = txt.replace(cek,"");
    document.getElementById(id).value = execute;
}
</script>            