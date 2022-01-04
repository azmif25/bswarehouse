<?php 
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{
	$datakategori[] = $tiap;
}
 ?>

<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option class="form-control">Pilih Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>
			<option value="<?php echo $value["id_kategori"]; ?>"><?php echo $value["nama_kategori"]; ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Sepatu</label>
		<input type="text" class="form-control" name="nama" >
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" >
	</div>
	<div class="form-group">

		<label>Size</label>
		<div class="ukuran-input" style="margin-bottom: 10px;">
			<input type="number" class="form-control" name="size[]" >
		</div>
			<span class="btn btn-primary btn-ukuran" style="margin-bottom: 10px;">
		<i class="fa fa-plus"></i>
		</span>
	</div>

	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" >
	</div>	<div class="form-group">
		<label>Stok </label>
		<input type="number" class="form-control" name="stok" >
	</div>	
	<div class="form-group">
		<label>Foto</label>
		<div class="letak-input">
			<input type="file" class="form-control" name="foto[]" >
		</div>
		<p class="text-danger">*Foto maksimal 2MB</p>

		<span class="btn btn-primary btn-tambah">
		<i class="fa fa-plus"></i>
		</span>
	
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
	if (isset($_POST['save'])) 
	{
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasifoto[0], "../foto_produk/".$namafoto[0]);
		$koneksi->query("INSERT INTO produk
			(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori)
			VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$namafoto[0]','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]')");

		$id_produk_barusan = $koneksi->insert_id;

		foreach ($namafoto as $key => $tiapnama) 
		{
			$tiap_lokasi = $lokasifoto[$key];
			move_uploaded_file($tiap_lokasi, "../foto_produk/".$tiapnama);

			$koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
				VALUES ('$id_produk_barusan','$tiapnama')");
		}

		$sizee = $_POST['size'];
		$stock = $_POST['stok'];
		foreach ($sizee as $key => $isii) {
			$koneksi->query("INSERT INTO size (id_produk,size) VALUES ('$id_produk_barusan','$isii')");
		}		
		foreach ($stock as $key => $val) {
			$koneksi->query("INSERT INTO size (stok) VALUES ('$val')");
		}

		echo "<div class='alert alert-info'>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	}
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click",function(){
			$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>")
		})
	})
</script>
<script>
	$(document).ready(function(){
		$(".btn-ukuran").on("click",function(){
			$(".ukuran-input").append("<input type='number' class='form-control' name='size[]'>")
		})
	})
</script>		