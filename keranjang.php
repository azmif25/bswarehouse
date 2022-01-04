<?php
session_start();

include "koneksi.php";

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Karanjang kosong, Silahkan Berbelanja dulu !');</script>";
	echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BSWarehouse</title>
		<?php include "head.php" ?>
</head>
<body>
<br>

<?php include "navbar.php" ?>

		<section>
			<div class="container">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Total</th>
							<th>SubTotal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
						<?php 
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;
						 ?>
						 <tr>
						 	<td><?php echo $nomor ; ?></td>
						 	<td><?php echo $pecah["nama_produk"]; ?></td>
						 	<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
						 	<td><?php echo $jumlah; ?></td>
						 	<td><?php echo number_format($subharga); ?></td>
						 	<td>
						 		<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
						 	</td>
						 </tr>
						 <?php $nomor++; ?>
						<?php endforeach ?>
					</tbody>
				</table>

				<a href="index.php" class="btn btn-info">Lanjutkan Belanja</a>
				<a href="checkout.php" class="btn btn-primary">Checkout</a>
			</div>
		</section>
</body>
</html>
