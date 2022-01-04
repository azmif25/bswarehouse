<?php
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BSWarehouse</title>
  <?php include "head.php" ?>

</head>

<body>

  <!-- Navigation -->
<?php include "navbar.php" ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

<?php include "kategori.php" ?>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-responsive" src="dekorasi/head.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="dekorasi/head.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="dekorasi/head.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>  

        <div class="row">
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) {?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="card h-100 thumbnail">
              <div class="thumbnail">
              <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>"><img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-thumbnail rounded"></a>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" style="color:black;"><?php echo $perproduk['nama_produk']; ?></a>
                </h5>
                <h6 class="text-right">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h6>
                
              </div>
              <div class="card-footer text-right">                
                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success btn-xs">Beli <i class="fa fa-shopping-basket"></i></a>
              </div>
            </div>
          </div>

          <?php } ?>

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

</html>

