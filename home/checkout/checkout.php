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
   <title>Keranjang</title>

   <!-- css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="../../assets/css/custom.css">
   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
   <!-- Jquery -->
   <script src="../../assets/js/jquery-3.6.0.min.js"></script>
   <script src="../../assets/js/storage.js"></script>
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
                           <h5 class="mb-3"><a href="../home.php" class="text-body"><i class="fa-solid fa-arrow-left-long"></i></i> Continue Shopping</a>
                           </h5>
                           <hr>
                           <div class='d-flex justify-content-between align-items-center mb-4'>
                              <div>
                                 <p class='mb-1'>Checkout Pembelian Anda</p>
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

                           <div class="mt-4">
                              <h5>Pilih opsi pengiriman</h5>
                           </div>

                           <?php
                           //Get Data Provinsi
                           $curl = curl_init();

                           curl_setopt_array($curl, array(
                              CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => "",
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 30,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => "GET",
                              CURLOPT_HTTPHEADER => array(
                                 "key:d42c6a6b7db90bdf7699ac3b3b678cff"
                              ),
                           ));

                           $response = curl_exec($curl);
                           $err = curl_error($curl);
                           ?>
                           <label>Provinsi</label><br>
                           <select name='provinsi' id='provinsi' class="form-control">";
                              <option>Pilih Provinsi</option>
                              <?php
                              $get = json_decode($response, true);
                              for ($i = 0; $i < count($get['rajaongkir']['results']); $i++) :
                              ?>
                                 <option value="<?php echo $get['rajaongkir']['results'][$i]['province_id']; ?>"><?php echo $get['rajaongkir']['results'][$i]['province']; ?></option>
                              <?php endfor; ?>
                           </select><br>

                           <label>Kabupaten</label><br>
                           <select id="kabupaten" name="kabupaten" class="form-control">
                              <!-- Data kabupaten akan diload menggunakan AJAX -->
                           </select> <br>

                           <label>Kurir</label><br>
                           <select class="form-control" id="kurir" name="kurir">
                              <option value="">Pilih Kurir</option>
                              <option value="jne">JNE</option>
                              <option value="tiki">TIKI</option>
                              <option value="pos">POS INDONESIA</option>
                           </select>

                           <div id="tampil_ongkir"> </div>

                           <script>
                              $('#provinsi').change(function() {

                                 //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
                                 var prov = $('#provinsi').val();
                                 var nama_provinsi = $(this).attr("nama_provinsi");
                                 $.ajax({
                                    type: 'GET',
                                    url: 'ambil-kabupaten.php',
                                    data: 'prov_id=' + prov,
                                    success: function(data) {
                                       //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                                       $("#kabupaten").html(data);
                                    }
                                 });
                              });

                              $('#kurir').change(function() {

                                 //Mengambil value dari option select provinsi asal, kabupaten, kurir kemudian parameternya dikirim menggunakan ajax
                                 var kab = $('#kabupaten').val();
                                 var kurir = $('#kurir').val();

                                 $.ajax({
                                    type: 'POST',
                                    url: 'tabel-ongkir.php',
                                    data: {
                                       'kab_id': kab,
                                       'kurir': kurir
                                    },
                                    success: function(data) {
                                       //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                                       $("#tampil_ongkir").html(data);

                                    }
                                 });
                              });
                           </script>
                        </div>

                        <div class="col-lg-5">
                           <div class="card bg-custom text-white rounded-3">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Bayar Sekarang</h5>
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
                                 <div id="paypal-button-container">
                                 </div>
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

   <!-- Script JS -->
   <script>
      paypal.Buttons({
         // Sets up the transaction when a payment button is clicked
         createOrder: (data, actions) => {
            return actions.order.create({
               purchase_units: [{
                  amount: {
                     value: '100',
                  }
               }]
            });
         },
         // Finalize the transaction after payer approval
         onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
               // Successful capture! For dev/demo purposes:
               console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
               const transaction = orderData.purchase_units[0].payments.captures[0];
               alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
               window.location.href = 'print.php';
            });
         },
         onCancel: function(data) {
            window.location.href = 'gagal.php';
         }
      }).render('#paypal-button-container');
   </script>
</body>

</html>