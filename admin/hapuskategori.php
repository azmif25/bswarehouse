<?php 
	$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

	echo "<script>alert('Kategori Telah Dihapus');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";
?>