<center><h1>Kas Harian BLUD</h1></center>
<div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4 text-right" style="margin-top: 20px;">
                    <a href="page.php?page=forminputkas" class="btn btn-default">Tambah Data <img src="image/Add.ico" width="15" height="15"/></a>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            Cari Data Kas
            <input type="text" name="cari" id="cari" oninput="Validation('cari')"/> <span id="loading_cari"></span>
            <br />
            <br />
<div class="tabel-responsive" id="view">
<?php include "kasdata.php"; ?>
</div>            

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <img id="img" src="" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<script>
function tingali(gambarna){
    $("#img").attr('src', gambarna);
}
$(document).ready(function(){ 
$("#cari").keyup(function(){
    if($("#cari").val() != ""){
    $("#loading_cari").html("Loading...");
    $.ajax({
       type:'POST',
       url:'http://localhost/ta/pages/kasdata.php',
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
    cek = /[^a-zA-Z\ 0-9\-]/;
    
    txt = document.getElementById(id).value;
    execute = txt.replace(cek,"");
    document.getElementById(id).value = execute;
}

</script>

