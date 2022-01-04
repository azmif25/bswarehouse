<h1>Data Kategori</h1>
<hr>

<?php 
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{
	$semuadata[] = $tiap;
}
 ?>


<?php include "tambahkategori.php" ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($semuadata as $key => $value): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_kategori"]; ?></td>
			<td>
				<a href="" class="btn btn-warning btn-xs">Ubah</a>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-danger btn-xs">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

