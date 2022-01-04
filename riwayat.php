<?php
session_start();
include "koneksi.php";
if (empty($_SESSION["pelanggan"]) OR !isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Please Login First !');</script>";
	echo "<script>location='login.php';</script>";
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
		


<?php include "navbar.php" ?><br>

<div class="container">

<section class="konten">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$nomor =1;  
			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

			$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
			while ($pecah = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
					<td>
						<?php echo $pecah["status_pembelian"]; ?>
						<br>
						<?php if (!empty($pecah['no_resi'])): ?>
						Resi : <?php echo $pecah['no_resi']; ?>
						<?php endif ?>
						</td>
					<td>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></td>
					<td class="text-center">
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">Nota</a>
						<?php if ($pecah['status_pembelian']=="Pending") :?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">
						Konfirmasi Pembayaran
						</a>
						<?php else: ?>
						<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">
							Lihat Pembayaran
						</a>
						<?php endif ?>
					</td> 
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>
</div>

</body>
</html>