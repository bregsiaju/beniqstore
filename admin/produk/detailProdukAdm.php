<?php
include("../../conn.php");

$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['id_produk'])) {
      //query SQL
      $id_display = $_GET['id_produk'];
      $query = "SELECT * FROM produk WHERE id_produk = $id_display";

      //eksekusi query
      $result = query($query);
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Detail Produk</title>

   <!-- bootstrap css -->
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <!-- myCSS -->
   <link rel="stylesheet" href="../../assets/css/mycss.css">
</head>

<body>
   <nav class="navbar navbar-dark fixed-top" style="background-color: #3f60a0;">
      <div class="container-fluid px-5">
         <h5 class="text-white"><a href="../index.php">Kelola Produk</a> > Detail Produk</h5>
         <a href="../../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
      </div>
   </nav>
   <div class="container mt-5 d-flex justify-content-center">
      <div class="col-sm-9">
         <div class="card ">
            <h5 class="card-header">Detail Produk</h5>
            <div class="card-body">
               <?php foreach ($result as $data) : ?>
                  <div class="row g-0">
                     <div class="col-md-4">
                        <img src="../../home/img/<?= $data['gambar_produk'] ?>" class="img-fluid rounded" alt="gambar produk">
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h4 class="card-title"><?= $data['nama_produk']; ?></h4>
                           <p><strong>Harga</strong><br>Rp<?= number_format($data['harga'], 0, '', '.'); ?></p>
                           <p><strong>Kategori</strong><br><?= $data['kategori']; ?></p>
                           <p><strong>Waktu Pengerjaan</strong><br><?= $data['waktu_pengerjaan']; ?> Hari</p>
                           <p class="card-text"><strong>Deskripsi</strong><br><?= $data['deskripsi']; ?></p>
                           <a href="<?= "editProduk.php?id_produk=" . $data['id_produk']; ?>"><button type="button" class="btn btn-primary float-end">Ubah detail produk</button></a>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>

   <!-- script bootstrap -->
   <script src="../../assets/css/bootstrap.bundle.min.js"></script>
</body>

</html>