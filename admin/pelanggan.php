<h2>Data Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT *FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<th><?php echo $nomor; ?></th>
			<th><?php echo $pecah['nama_pelanggan']; ?></th>
			<th><?php echo $pecah['email_pelanggan']; ?></th>
			<th><?php echo $pecah['telepon_pelanggan']; ?></th>
			<th>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" 
				class="btn btn-danger">Hapus</a>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>"
				class="btn btn-warning">Ubah</a>
			</th>
		</tr>
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Data</a>