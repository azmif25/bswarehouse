<?php include 'koneksi.php' ?>
<?php 
$keyword = $_GET["id"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori='$keyword'");
while ($pecah = $ambil->fetch_assoc()) 
{
	$semuadata[]=$pecah;
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>BSWarehouse</title>
    <?php include "head.php" ?>
<body>



		
<body>

  <!-- Navigation -->
<?php include "navbar.php" ?><br>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

	<?php include "kategori.php" ?>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

<h3>Kategori : <?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$keyword'");
$kat = $ambil->fetch_assoc(); 
 echo $kat['nama_kategori'] ?></h3><hr>

        <div class="row">
<?php foreach ($semuadata as $key => $value): ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="card h-100 thumbnail">
              <div class="thumbnail">
              <a href="detail.php?id=<?php echo $value['id_produk']; ?>"><img src="foto_produk/<?php echo $value['foto_produk']; ?>" alt="" class="img-thumbnail rounded"></a>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="detail.php?id=<?php echo $value['id_produk']; ?>" style="color:black;"><?php echo $value['nama_produk']; ?></a>
                </h5>
                <h6 class="text-right">Rp. <?php echo number_format($value['harga_produk']); ?></h6>
                
              </div>
              <div class="card-footer text-right">                
                <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-success btn-xs">Beli <i class="fa fa-shopping-basket"></i></a>
              </div>
            </div>
          </div>

          <?php endforeach ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php include "footer.php" ?>


</body>

