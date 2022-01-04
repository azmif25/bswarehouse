<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color : #99e6ff;">
    <div class="container">
            <a class="nav-link" href="index.php"><i class="fa fa-home" style="color: green;"></i>
              <span class="sr-only">(current)</span>
            </a>
      <a class="navbar-brand" href="index.php">BSWarehouse</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="text-shadow: 5px 5px 5px #c2d6d6;">
        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["pelanggan"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayat.php"><i class="fa fa-history"></i> Riwayat Belanja</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Login</a></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar.php"><i class="fa fa-user-plus"></i> Daftar</a></a>
          </li>
          <?php endif  ?>
          <li class="nav-item">
            <a class="nav-link" href="keranjang.php"><i class=" fa fa-shopping-basket"></i> Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php"><i class="fa fa-cart-arrow-down"></i> Checkout</a>
          </li>
        </ul> 



    </div>       

      </div>
                <form action="pencarian.php" method="get" class="navbar-form navbar-right">
      <div class="from-group">
      <label class="sr-only" for="inlineFormInputGroupUsername">Search</label>
      <div class="input-group">
        <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="keyword" placeholder="Cari Produk">
          <div class="input-group-prepend">
          <button class="btn btn-secondary btn-xs" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa fa-search"></i></button>
          </div>
          </div>
      </form>
    </div>
</nav>


