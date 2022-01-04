<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>BSWarehouse</title>
		<?php include "head.php" ?>
</head>
<body>
	<?php include 'navbar.php' ?><br>

	<div class="container">
		<div class="row">
			<div class="container col-lg-offset-3 col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Register Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								
									<input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">E-mail</label>
								<input type="email" class="form-control" name="email" placeholder="Masukan E-mail" required>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								
									<input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
								
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								
									<textarea class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea>
							
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">No. Telepon / Hp</label>
								
									<input type="number" class="form-control" name="telepon" placeholder="Masukan No. Telepon / Hp" required>
								
							</div>
							<div class="form-group text-right">
								
									<button class="btn btn-primary" name="daftar">Daftar</button>
								
							</div>
						</form>
						<?php  
						if (isset($_POST["daftar"])) 
						{
							$nama = $_POST["nama"];
							$email =  $_POST["email"];
							$password =  $_POST["password"];
							$alamat =  $_POST["alamat"];
							$telepon =  $_POST["telepon"];

							$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
							$yangcocok = $ambil->num_rows;
							if ($yangcocok==1) 
							{
								echo "<script>alert('Register failed, E-mail Sudah Digunakan');</script>";
								echo "<script>location='daftar.php';</script>";
							}
							else
							{
								$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
									VALUES ('$email','$password','$nama','$telepon','$alamat')");

										echo "<script>alert('Register Success, Please Login');</script>";
										echo "<script>location='login.php';</script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
<?php include "footer.php" ?>

</body>
</html>