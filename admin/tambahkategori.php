<form method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-sm-8">
	<div class="form-group">
		<input type="text" class="form-control" name="nama" placeholder="Tambahkan Kategori">
	</div>
	</div>
	<div class="col-sm-4">
	<button class="btn btn-primary" name="save"><i class="fa fa-plus"></i>Tambahkan</button>
	</div>
	</div>
</form>
<?php
	if (isset($_POST['save'])) {
		$koneksi->query("INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES (NULL, '$_POST[nama]');");
	echo "<script>alert('Data Tersimpan');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
	}
?>