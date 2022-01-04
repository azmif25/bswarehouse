<?php 

$kategori = array();
$ambilkat = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambilkat->fetch_assoc()) 
{
  $kategori[] = $tiap;
}

 ?>

      <div class="col-lg-3 text-center">

        <h1 class="my-4"><img src="dekorasi/logo.png" class="image-thumbnail" width="150"></h1>
        <div class="list-group">
          <?php foreach ($kategori as $key => $value) : ?>
          <a href="perkategori.php?id=<?php echo $value['id_kategori']; ?>" class="list-group-item" style="color : black;"><?php echo $value["nama_kategori"]; ?></a>
          <?php endforeach ?>
        </div>

      </div>