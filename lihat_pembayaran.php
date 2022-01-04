<?php
session_start();

include "koneksi.php";

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON 
pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)) 
{
	echo "<script>alert('Belum ada Data Pembayaran')</script>";
	echo "<script>location='riwayat.php'</script>";
	exit();
}

if (empty($_SESSION["pelanggan"]["id_pelanggan"]==$detbay["id_pelanggan"]))
{
	echo "<script>alert('Action Denied');</script>";
	echo "<script>location='riwayat.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>BSWarehouse</title>
		<?php include "head.php" ?>
</head>
<body>

	<?php include 'navbar.php' ?><br>

	<div class="container">
		<h3>Lihat Pembayaran</h3>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay["nama"]; ?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay["bank"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $detbay["tanggal"]; ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detbay['jumlah']); ?></td>
					</tr>
				</table>
				<a href="riwayat.php" class="btn btn-secondary">Back</a>
			</div>
			<div class="col-md-6">
			<img src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</body>
</html>