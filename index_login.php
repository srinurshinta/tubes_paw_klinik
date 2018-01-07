<?php
session_start();
if($_SESSION){
	if($_SESSION['level']=="Admin")
	{
		header("location: index_admin.php");
	}
	if($_SESSION['level']=="Dokter")
	{
		header("location: index_dokter.php");
	}
}

include "login.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Halaman Login</title>

    <!-- Bootstrap -->
    <link href="library/vendor/bootstrap/css/font.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="library/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="library/vendor/bootstrap/css/styles.css" />
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

 <section class="container">
   <h2 align="center"><b>Klinik Utama Wijaya<b><br><h5><i>Jln. Raya Tanjungsari No. 349 Sumedang - Jawa Barat</i></h5> </h2>

  <hr/>
   <section class="login-form">
   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="login" role="login">
     <section>

    <h3 align="center">Please Sign in</h3>

          <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-user"></span></div>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control" required />
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required />
            </div>
          </div> 

          <div class="form-group">
            <div class="input-group">
            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-user"></span></div>
              <select name="level" class="form-control" required>
                <option value="">--Pilih Level User--</option>
                <option value="1">Administrator</option>
                <option value="2">Dokter</option> 
              </select> 
            </div>
          </div> 

        <button type="submit" name="submit" class="btn btn-block btn-info">Sign in</button>
  						<?php echo $error; ?>
     </section>   
    </form>
  </section>
</section>
  	
  </body>
</html>
