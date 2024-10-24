<?php
 require 'system/functions.php';
 session_start();
 $userMenu->checkUserLogin("index.php");

 if(isset($_GET['id'])){
    $prdID = $_GET['id']; $prd = $database->query("SELECT * FROM `products` WHERE id = $prdID")[0];
 } else {
    header("Location: index.php"); 
    exit;
 }


 if(isset($_POST["buy-submit"])){
    if( $productMenu->orderProduct($_POST) > 0 ) {
        echo "
            <script>
                alert('Product has successfully ordered!');
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Product has failed to be ordered!');
            </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <title>Klik Indomaret</title>
    <link rel="shortcut icon" href="assets/ui/Untitled.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    nav {
        background: url(assets/ui/bg_header.jpg);
    }
    </style>

</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php"><img src="assets/ui/logo.webp" style="width: 7rem;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-basket"></i> Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="products.php?category=Makanan"><i class="bi bi-egg-fried"></i> Makanan</a></li>
                            <li><a class="dropdown-item" href="products.php?category=Minuman"><i class="bi bi-cup-straw"></i> Minuman</a></li>
                            <li><a class="dropdown-item" href="products.php?category=Kesehatan"><i class="bi bi-prescription2"></i> Kesehatan</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-nav me-auto my-2 my-lg-0 ">
                    <form action="search.php" method="get" class="d-flex mx-auto">
                        <input name="keywords" class="form-control me-2 shadow-sm" style="width: 50vw;" type="text"
                            placeholder="Mau beli apa hari ini?" aria-label="Search">
                        <button name="search" title="Cari" class="btn btn-light shadow-sm" type="submit"><i
                                class="bi bi-search" style="color:#ffbf00;"></i></button>
                    </form>
                </div>
                <div class="navbar-nav">
                    <?php if(isset($_SESSION["user-login"])) {?>
                    <a href="system/logout.php" title="Logout"
                        class="btn btn-light btn-outline-secondary me-2 shadow-sm">
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                    <a href="#" title="profile" class="btn btn-light btn-outline-primary me-2 shadow-sm">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <?php } else { ?>
                    <a href="#" class="btn btn-light btn-outline-primary me-2 shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#userLogin">
                        Masuk
                    </a>
                    <a href="#" class="btn btn-light btn-outline-primary me-2 shadow-sm">
                        Daftar
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <main class="container-fluid mt-5 p-5 bg-light pt-5 pb-5">
        <!-- Product section-->
        <section class="py-5">
            <div class="container-fluid bg-body p-5 rounded shadow px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="img/<?=$prd['prd-thumb']?>"
                            alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?=$prd['prd-nama']?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp. <?=number_format($prd['prd-harga']);?></span>
                        </div>
                        <p class="lead"><?=$prd['prd-details']?></p>
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#userBuy">
                                <i class="bi bi-cart"></i> Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container-fluid px-4 px-lg-5 mt-5">
                <div class="row mx-auto">
                    <?php $prdName = $prd['prd-kategori'];?>
                    <?php $categories = $database->query("SELECT * FROM `categories` WHERE `cat-name` = '$prdName'"); foreach($categories as $cat) : ?>
                    <?php $catIcon = $cat['cat-icon'];?>
                    <h1 class="mb-4 mt-5"><i class="<?=$catIcon?> me-4"></i>Produk Serupa</h1>
                    <?php $products = $database->query("SELECT * FROM `products` WHERE `prd-kategori` = '$prdName' LIMIT 0, 6"); foreach($products as $prd) :?>
                    <div class="col-md-2 g-8">
                        <div class="card mb-3 mx-auto shadow-sm" style="max-width: 540px;">
                            <div class="row-12">
                                <div class="col-lg-12 d-flex justify-content-center align-items-center ">
                                    <img src="img/<?=$prd['prd-thumb'];?>" class="img-thumbnail rounded" alt="...">
                                </div>
                                <div class="col-12">
                                    <div class="card-body">
                                        <div style="height: 2rem;"><span style="font-size :0.8rem;"
                                                class="fw-bold d-block"><?=$prd['prd-nama'];?></span></div>
                                        <span class="card-text mt-2 mb-3 d-block"> Rp.
                                            <?=number_format($prd['prd-harga']);?></span>
                                        <div class="row">
                                            <div class="col-12 mx-auto">
                                                <a href="buy.php?id=<?=$prd['id']?>"
                                                    class="btn btn-sm btn-primary w-100">Beli Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php $catName = $cat['cat-name']; ?>
                    <a href="products.php?<?="category=$catName"?>">Cek Selengkapnya</a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer bg-body text-center">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <img src="assets/ui/logo.webp" alt="" height="50px" class="mb-3">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
            data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #3b5998;"
              href="#!"
              role="button"
              ><i class="bi bi-facebook"></i></a>
      
            <!-- Google -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #dd4b39;"
              href="#!"
              role="button"
              ><i class="bi bi-google"></i></a>
      
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="#!"
              role="button"
              ><i class="bi bi-instagram"></i></a>

            <!-- Whatsapp -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: lime;"
              href="#!"
              role="button"
              ><i class="bi bi-whatsapp"></i></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2024 Copyright:
          <a class="text-body" href="index.html">Klik Indomaret</a>
        </div>
        <!-- Copyright -->
      </footer>
    <div class="modal fade" id="userBuy" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5">
                <div class="row text-dark">
                    <div class="col-md-9 mx-auto mb-3">
                        <h1 class="h3 fw-bold text-center">Pesan Sekarang</h1>
                    </div>

                    <form action="" method="post">
                        <input type="hidden" name="username" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{echo $_COOKIE['username'];}; ?>">
                        <input type="hidden" name="prd-nama" value="<?=$prd['prd-nama']?>">
                        <input type="hidden" name="prd-harga" value="<?=$prd['prd-harga']?>">
                        <div class="col-md-9 mx-auto mb-3">
                            <label for="ord-qty" class="form-label">Jumlah Pesanan</label>
                            <input type="number" name="ord-qty" class="form-control" id="ord-qty" autocomplete="off" required>
                        </div>
                        <div class="col-md-9 mx-auto mb-5">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="ord-address"  id="alamat" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-9 mx-auto">
                            <button type="submit" name="buy-submit"
                                class="form-control btn btn-primary btn-block">Pesan Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>