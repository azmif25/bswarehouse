<?php 
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();


$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc()) 
{
	$fotoproduk[] = $tiap;
}
 ?>

<table class="table">
	<tr>
		<th>Kategori</th>
		<td><?php echo $detailproduk["nama_kategori"]; ?></td>
	</tr>
	<tr>
		<th>Produk</th>
		<td><?php echo $detailproduk["nama_produk"]; ?></td>
	</tr>
	<tr>
		<th>Harga</th>
		<td>Rp. <?php echo number_format($detailproduk["harga_produk"]); ?></td>
	</tr>
	<tr>
		<th>Berat</th>
		<td><?php echo $detailproduk["berat_produk"]; ?></td>
	</tr>
	<tr>
		<th>Deskripsi</th>
		<td><?php echo $detailproduk["deskripsi_produk"]; ?></td>
	</tr>
	<tr>
		<th>Stok</th>
		<td><?php $stokk = $koneksi->query("SELECT SUM(IF((id_produk) = $id_produk, stok, 0)) AS stokku from size"); 
					$hasil = $stokk->fetch_assoc();
					echo $hasil['stokku'];
			?></td>
	</tr>
</table>

<div class="row">
	<?php foreach ($fotoproduk as $key => $value) : ?>
		<div class="col-md-2 text-center">
			<img src="../foto_produk/<?php echo $value["nama_produk_foto"]; ?>" alt="" class="img-responsive"><br>
			<a href="index.php?halaman=hapusfotoproduk&idfoto=<?php echo $value['id_produk_foto'] ?>&idproduk=<?php echo $id_produk; ?>" class="btn btn-danger">Delete</a>
		</div>
	<?php endforeach ?>
</div>

<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>File Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
</form>
<?php 
if (isset($_POST["simpan"])) 
{
		$nama = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];

		move_uploaded_file($lokasi, "../foto_produk/".$nama);

	$koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES('$id_produk','$nama')");

	echo "<script>alert('Foto Produk Berhasil DiSimpan');</script>";
	echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
}
 ?>