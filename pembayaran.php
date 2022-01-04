<?php
session_start();
include "koneksi.php";
if (empty($_SESSION["pelanggan"]) OR !isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Please Login First !');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli) 
{
	echo "<script>alert('Action Denied');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BSWarehouse</title>
		<?php include "head.php" ?>
	</head>
<body>

	<?php include"navbar.php" ?><br>

	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim Bukti Pembayaran Anda Disini</p>
		<div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>BANK</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>JUMLAH</label>
				<input type="number" class="form-control" name="jumlah">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">*Foto bukti harus JPG maksimal 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div>
	<?php  
		if (isset($_POST["kirim"])) 
		{
			$namabukti = $_FILES["bukti"]["name"];
			$lokasibukti = $_FILES["bukti"]["tmp_name"];
			$namafix = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

			$nama = $_POST["nama"];
			$bank = $_POST["bank"];
			$jumlah = $_POST["jumlah"];
			$tanggal = date("Y-m-d");

			$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
						VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");
			$koneksi->query("UPDATE pembelian SET status_pembelian='Konfirmasi Pembayaran' WHERE id_pembelian='$idpem'");
				echo "<script>alert('Terima Kasih Sudah Mengirimkan Bukti Pembayaran');</script>";
				echo "<script>location='riwayat.php';</script>";
		}
	?>
</body>
</html>