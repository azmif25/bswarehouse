<h2>Data Pembayaran</h2>
<?php 
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

echo "<pre>";
print_r($detail);
echo "</pre>";
?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['nama']; ?></td>
			</tr>
			<tr>
				<th>BANK</th>
				<td><?php echo $detail['bank']; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($detail['jumlah']); ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['tanggal']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-3">
		<img src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" alt="" class="img-responsive">
	</div>
</div>

<form method="post">
<div class="form-group">
	<label>No. Resi Pengiriman</label>
	<input type="text" class="form-control" name="resi">
</div>
<div class="form-group">
	<label>Status</label>
	<select class="form-control" name="status">
		<option value="">-Pilih Status-</option>
		<option value="Telah DiKonfirmasi">Pembayaran Telah Dikonfirmasi</option>
		<option value="Barang telah Dikirim">Barang Telah Di Kirim</option>
		<option value="Dibatalkan">Pesanan Dibatalkan</option>
	</select>
</div>
<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"])) 
{
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET no_resi='$resi', status_pembelian='$status'
		WHERE id_pembelian='$id_pembelian'");

	echo "<script>alert('Data pembelian Terupdate');</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>