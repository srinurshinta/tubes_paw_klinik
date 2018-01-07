<?php 
@session_start();
include ('cek_dokter.php');
include "inc/koneksi.php";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Halaman Utama Dokter</title>
  <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Halaman Utama Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-fluid">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Klinik Utama Waluya</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="?page=home"><span class="glyphicon glyphicon-home"></span>     Home <span class="sr-only">(current)</span></a></li>
          <li><a href="?page=pasien&action=rekam_medis"><span class="glyphicon glyphicon-user"></span>     Rekam Medis</a></li>
          <li><a href="?page=obat&action=daftar_obat"><span class="glyphicon glyphicon-tint"></span>     Obat</a></li>
          <li><a href="?page=kunjungan&action=daftar_pengunjung"><span class="glyphicon glyphicon-user"></span>     Kunjungan</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['username']; ?></a></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>     Logout</a></li>          
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div id="isi">
  <?php
  $page = @$_GET['page'];
  $action = @$_GET['action'];
  if($page == "pasien"){
    if($action == "rekam_medis"){
      include "dokter/daftar_pasien.php";
    } else if($action == "data_rm"){
      include "dokter/data_rekam_medis.php";
    } else if($action == "rm"){
      include "dokter/tambah_rekam_medis.php";
    } else if($action == "obat"){
      include "dokter/tambah_obat.php";
    }

  } else if($page == "kunjungan"){
    if($action == "daftar_pengunjung"){
      include "dokter/daftar_pengunjung.php";
    }

  } else if($page == "obat"){
    if($action == "daftar_obat"){
      include "dokter/daftar_obat.php";
    }
  }
  ?>
    
  </div>


    <div class="container-fluid">
      <div class="row copy text-center">
        <p>All Right Reserved 2017 | <a href=""></a></p>
        
      </div>
    </div>




    
  </div><!-- container fluid semua -->






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jqueryo.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>