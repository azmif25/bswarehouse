<?php include 'koneksi.php' ?>
<?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
	OR deskripsi_produk LIKE '%$keyword%'");
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
</head>
<body>

	<?php include "navbar.php" ?><br>

		
<body>

  <!-- Navigation -->
<?php include "navbar.php" ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">BSWarehouse</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

<h3>Hasil Pencarian : "<?php echo $keyword ?>"</h3><hr>

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

