<?php
session_start();
require '../../conn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Keranjang</title>

   <!-- CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="../../assets/css/custom.css">
   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
</head>

<body>
   <section class="h-100 h-custom" style="background-color: #eee;">
      <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
               <div class="card">
                  <div class="card-body p-4">
                     <div class="row">
                        <div class="col-lg-7">
                           <h5 class="mb-3"><a href="../home.php" class="text-body"><i class="fa-solid fa-arrow-left-long"></i> Continue Shopping</a></h5>
                           <hr>
                           <div class='d-flex justify-content-between align-items-center mb-4'>
                              <div>
                                 <p class='mb-1'>Shopping Cart Anda</p>
                              </div>
                           </div>
                           <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                              <!-- Menampilkan produk berdasarkan id_produk -->
                              <?php
                              $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                              $pecah = $ambil->fetch_assoc();
                              $subharga = $pecah['harga'] * $jumlah;
                              ?>

                              <div class="card mb-3">
                                 <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                       <div class="d-flex flex-row align-items-center">
                                          <div>
                                             <img src="../img/<?= $pecah['gambar_produk']; ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                          </div>
                                          <div class="ms-4">
                                             <h5><?= $pecah['nama_produk']; ?></h5>
                                             <p class="small mb-0"><?= $pecah['kategori']; ?></p>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-row align-items-center">
                                          <div style="width: 50px;">
                                             <h5 class="fw-normal mb-0"><?= $jumlah; ?></h5>
                                          </div>
                                          <div style="width: 80px;">
                                             <h7 class="mb-0"><?= number_format($subharga,  0, '', '.'); ?></h7>
                                          </div>
                                          <div style="width: 40px;">
                                             <a href="hapuskeranjang.php?id=<?= $id_produk ?>" class="btn btn-danger btn-xs">X</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php endforeach ?>
                        </div>
                        <div class="col-lg-5">
                           <div class="card bg-custom text-white rounded-3">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">BENIQ Shop</h5>
                                 </div>
                                 <hr class="my-4">

                                 <img src="../../assets/img/logo.png" alt="logo" style="width: 400px;">

                                 <hr class="my-4">

                                 <a href="checkout.php">
                                    <button type="button" class="btn btn-outline-light btn-block btn-lg">
                                       <span>Checkout <i class="fa-solid fa-arrow-right-long"></i></span>
                                    </button>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>