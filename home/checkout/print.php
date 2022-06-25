<?php
session_start();
include("../../conn.php");


if (!isset($_SESSION['pelanggan'])) {
   echo "<script>alert('error');</script>";
   echo "<script>location='../../login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Resi</title>

   <!-- css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="../../assets/css/custom.css">
   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <!-- Jquery -->
   <script src="../../assets/js/jquery-3.6.0.min.js"></script>
   <link rel="stylesheet" href="../style/print.css" media="print">
</head>

<body>
   <script src="https://www.paypal.com/sdk/js?client-id=AfA2E9dq-AsFiL7_fZKqTR0R_BUx8lqZErrChqQqsI4ScQ2oOd4p3ofCdjNWoBalAH7rX3MFrgzgZpVG&currency=USD"></script>
   <section class="h-100 h-custom" style="background-color: #eee;">
      <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
               <div class="card">
                  <div class="card-body p-4">

                     <div class="row">

                        <div class="col-lg-7">
                           <h5 class="mb-3" class="text-body"><i class="fa-solid fa"></i></i> BENIQ Shop Invoice </a>
                           </h5>
                           <hr>
                           <div class='d-flex justify-content-between align-items-center mb-4'>
                              <div>
                                 <p class='mb-1'>Daftar Pembelian Anda</p>
                              </div>
                           </div>
                           <?php $totalbelanja = 0; ?>
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
                                             <?php $_SESSION['kategori'] = $pecah['kategori']; ?>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-row align-items-center">
                                          <div style="width: 50px;">
                                             <h5 class="fw-normal mb-0"><?= $jumlah; ?></h5>
                                          </div>
                                          <div style="width: 80px;">
                                             <h7 class="mb-0"><?= number_format($subharga,  0, '', '.'); ?></h7>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php $totalbelanja += $subharga; ?>
                           <?php endforeach ?>
                        </div>

                        <div class="col-lg-5">
                           <div class="card bg-custom text-white rounded-3">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Pembayaran Berhasil</h5>
                                 </div>
                                 <hr class="my-4">
                                 <form method="post" class="mt-4">
                                    <div class="form-outline form-white mb-4">
                                       <label class="form-label" for="typeName">Nama Penerima</label>
                                       <input type="text" id="typeName" class="form-control form-control-lg" value="<?php echo $_SESSION['users']['full_name']; ?>">
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                       <label class="form-label" for="typeText">HP</label>
                                       <input type="text" id="typeText" class="form-control form-control-lg" value="<?php echo $_SESSION['users']['hp']; ?>">
                                    </div>
                                 </form>

                                 <hr class="my-4">
                                 <label class="form-label" for="typeText">Total Belanja : </label>
                                 <label class="form-label" for="typeText">Rp<?php echo number_format($totalbelanja, 0, '', '.') ?> </label><br>

                                 <hr class="my-4">
                                 <button onclick="window.print();" class="btn btn-primary">Print</button>
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