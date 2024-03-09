$(document).ready(function(){ 

$(".datepicker-input").each(function(){ $(this).datepicker();});

$("#loading_kegiatan").html("");
$("#kategori").change(function(){
    if($("#kategori").val() != ""){
    $("#loading_kegiatan").html("Loading...");
    $.ajax({
       type:'POST',
       url:'http://localhost/ta/pages/pilihankegiatan.php',
       data:{idKategori:$("#kategori").val()},
       success:function(hasil){
        //alert(hasil);//
    $("#loading_kegiatan").html("");
        $("#kegiatan").html(hasil);
       } 
    }); 
    }   
}); 
 
});