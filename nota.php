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

	<section>
		<div class="container">
			
<h2>Detail Pembelian</h2>
<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
		ON pembelian.id_pelanggan=pelanggan.id_pelanggan
		WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();

	$idpelangganygbeli = $detail["id_pelanggan"];
	$idpelangganyglogin = $_SESSION["pelanggan"]["id_pelanggan"];

	if ($idpelangganygbeli!==$idpelangganyglogin) 
	{
		echo "<script>alert('Action Denied')</script>";
		echo "<script>location='riwayat.php'</script>";
	}
?>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
			Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
			Total : <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
			<p>
				<?php echo $detail['telepon_pelanggan']; ?> <br>
				<?php echo $detail['email_pelanggan']; ?>
			</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong><br>
		Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat : <?php echo $detail['alamat_pengiriman']; ?>
	</div>
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>berat</th>
			<th>jumlah</th>
			<th>subBerat</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>	
		<?php $nomor=1; ?>	
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'") ?>
			<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['berat']; ?> Gram</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> Gram</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++ ?>
		<?php }?>
	</tbody>
</table>

	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran sebesar Rp. <?php echo number_format($detail['total_pembelian']); ?>-; <br>
				Dengan melakukan Transfer ke : <br>
				<strong>BANK KU 999-666-999-666 AN. Sumeewe Till Dawn</strong>
			</p>
		</div>
	</div>

		</div>
	</section>

</body>
</html>