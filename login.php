<?php
session_start();

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>BSWarehouse</title>
		<?php include "head.php" ?>
</head>
<?php include "navbar.php" ?>
<body>



<div class="container">
	<div class="row">


	    <div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 box">
            <br />
            <div class="panel panel-default">
                <div class="panel-heading" align="center">
                    <h3>Login Pelanggan</h3>
                </div>
                <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                    	<label>E-mail</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Type Your E-Mail" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        	<label>Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Type Your Password" required="" />
                        </div>
                    </div>
                     <div class="text-center">
                    <button type="reset" class="btn btn-warning">Reset <i class="fa fa-refresh"></i></button>
                   
                    <button class="btn btn-primary" name="login">Login <i class="fa fa-sign-in"></i></button>
                    </div><hr>
                    <a href="index.php" class="text-info"><i class="fa fa-arrow-left"> Kembali ke Home</i></a>
                </form>
                </div>
            </div>
        </div>
  </div>
</div>


<?php  
if (isset($_POST["login"])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE
		email_pelanggan='$email' AND password_pelanggan='$password'");

	$akunygcocok = $ambil->num_rows;

	if ($akunygcocok==1) 
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('Login Success.');</script>";


			if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
			{
				echo "<script>location='checkout.php';</script>";
			}
			else
			{
				echo "<script>location='riwayat.php';</script>";	
			}

		echo "<script>location='checkout.php';</script>";

	}
	else
	{
		echo "<script>alert('Login failed, Check your Account');</script>";
		echo "<script>location='login.php';</script>";
	}
}
?>


</body>
</html>