<?php
if(isset($_GET['page'])){
$page=$_GET['page'];    
}else{
    $page="";
}
switch($page){
    
    case "home" :
    include "pages/home.php";
    break;

    case "profil" :
    include "pages/profil.php";
    break;
        
    case "laporankas" :
    include "pages/laporankas.php";
    break;
        
    case "kategori" :
    include "pages/kategori.php";
    break;
    
    case "formupdatekategori" :
    include "pages/formupdatekategori.php";
    break;

    case "forminputkategori" :
    include "pages/forminputkategori.php";
    break;
   
    case "kas" :
    include "pages/kas.php";
    break;

    case "forminputkas" :
    include "pages/forminputkas.php";
    break;
    
    case "formupdatekas" :
    include "pages/formupdatekas.php";
    break;
    
    case "kegiatan" :
    include "pages/kegiatan.php";
    break;
    
    case "forminputkegiatan" :
    include "pages/forminputkegiatan.php";
    break;
    
    case "formupdatekegiatan" :
    include "pages/formupdatekegiatan.php";
    break;
    
    case "logout" :
    include "proses/logout.php";
    break;

    default:
    include "pages/home.php";
} 
?>