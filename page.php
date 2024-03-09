<?php
session_start();
include "proses/koneksi.php";
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSKGM Kota Bandung</title>

    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="js/datepicker/datepicker.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background:#F1F1F1;">

<div class="container">
<!-- HEADER -->
<div id="header">
<div class="row" style="">
    <div class="col-xs-4" style="padding: 30px;">
        <img src="image/header.png">
    </div>

    <div class="col-xs-8">
<nav id="menu" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul id="menunav" class="nav navbar-nav navbar-left">
        <li><a href="page.php?page=home">Home</a></li>
        <li id="menudrop" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master</a>
          <ul class="dropdown-menu">
            <li><a href="page.php?page=kategori">Kategori Belanja</a></li>
            <li><a href="page.php?page=kegiatan">Kegiatan Belanja</a></li>
          </ul>
        </li>
        <li><a href="page.php?page=kas">Kas BLUD</a></li>
        <li><a href="page.php?page=laporankas">Laporan Kas BLUD</a></li>
        <li><a href="page.php?page=logout">Logout</a></li>
        </li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    </div>
</div>
</div>

<!-- CONTENT -->
<?php
if(isset($_GET['page'])){
    $sty = (($_GET['page'] == "home" or $_GET['page'] == ""))? "" : " style='padding: 20px;background: white;'";
}else{
    $sty = "";
}
?>
<div id="content"<?php echo $sty; ?>>
<?php
include"content.php";
?>
</div>

<!-- FOOTER -->
<div id="footer">
<div class="row">
<div class="col-xs-10">
</div>
<div class="col-xs-2">
Copyright Diki Somantri
</div>
</div>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    
    <script src="js/datepicker/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
    function yakin(id, url){
        var tanya = window.confirm("Apakah anda yakin ingin menghapus data ini?");
        if(tanya){
            window.location = "<?php echo $url; ?>/proses/"+url+"?id="+id;
        }
    }
    </script>

</body>

</html>
<?php
}else{
    header("location: http://localhost/ta/index.php");
}
?>