<?php
session_start();
include "koneksi.php";

$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc()) 
{
	$fotoproduk[] = $tiap;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>BSWarehouse</title>
		<?php include "head.php" ?>
	</head>
	<body>

<?php include "navbar.php" ?>

<section class="konten">
	<br>
	<div class="container">

<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right"><br>
<article class="gallery-wrap"> 

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="foto_produk/<?php echo $detail["foto_produk"]; ?>"
        alt="First slide">
    </div>
    <!--/First slide-->
     <?php foreach ($fotoproduk as $key => $value) : ?>
    <!--Second slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="foto_produk/<?php echo $value["nama_produk_foto"]; ?>"
        alt="Second slide">
    </div>
    <!--/Second slide-->
<?php endforeach ?>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
 <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3"><?php echo $detail["nama_produk"]; ?></h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span class="currency">Rp. </span><span class="num"><?php echo number_format($detail["harga_produk"]); ?>,-</span>
	</span> 
</p> <!-- price-detail-wrap .// -->

<dl class="param param-feature">
  <dt>Brand</dt>
  <dd><?php echo $detail["nama_kategori"]; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Color</dt>
  <dd><?php echo $detail["colorway"]; ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo $detail["deskripsi_produk"]; ?> </p></dd>
</dl>

<hr>
	<div class="row">
			<div class="col-sm-7">
			<dl class="param param-inline">

			<?php 
					$ukuran = array();
					$ambilsize = $koneksi->query("SELECT * FROM size WHERE id_produk='$id_produk'");
					while ($every = $ambilsize->fetch_assoc()) 
					{
						$ukuran[] = $every;
					}
			?>
				  <dt>Size: </dt>
				  <dd>
				 <?php foreach ($ukuran as $key => $nilai) : ?>
					<label class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <span class="form-check-label"><?php echo $nilai["size"]; ?></span>
					</label>           
				<?php endforeach ?>
				  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
		<div class="col-sm-5">
			<dl class="param param-inline">
			  <dt>Quantity: </dt>
			  <dd>

				<form method="post" class="text-center">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" value="1" max="<?php echo $detail['stok_produk'];  ?>" class="form-control" name="jumlah">
							<div class="input-group-btn">
								<button class="btn btn-secondary btn-xs" name="beli"><i class=" fa fa-shopping-basket"></i></button><br>
								
							</div>
							
						</div><hr>
						<button class="btn btn-info btn-xs" name="buy"><i class="fa fa-shopping-cart"></i> Buy Now</button>	
					</div>
				</form>
			  </dd>
			</dl>  <!-- item-property .// -->
		</div> <!-- col.// -->
<a href="index.php"><i class="fa fa-mail-reply"></i> <strong style="color : black;">Back To Home</strong></a>
	</div> <!-- row.// -->

</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

	</div>
</section>


<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="admin/assets/js/bootstrap.min.js"></script>
<script src="admin/assets/js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="container">


	

</div>
				<?php 
				if (isset($_POST["beli"])) 
				{
					$jumlah = $_POST["jumlah"];
					$_SESSION["keranjang"][$id_produk] = $jumlah;

						echo "<script>alert('Produk Telah Masuk ke Keranjang Belanja');</script>";
						echo "<script>location='keranjang.php';</script>";
				}elseif (isset($_POST["buy"])) 
				{
										$jumlah = $_POST["jumlah"];
					$_SESSION["keranjang"][$id_produk] = $jumlah;

						echo "<script>alert('Produk Telah Masuk ke Keranjang Belanja');</script>";
						echo "<script>location='checkout.php';</script>";
				}
				 ?>	

 <br>
<?php include "footer.php" ?>
	</body>
</html>

<!--<div class="img-big-wrap">
  <div> <a href="#"><img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-fluid"></a></div>
</div> <!-- slider-product.//
<div class="img-small-wrap">
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
</div> -->
