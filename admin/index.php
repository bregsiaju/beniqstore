<?php

session_start();

include("../connection.php");
include("../functions.php");
include("../conn.php");

$user_data = check_login($con);

$result = query("SELECT * FROM produk")
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Admin</title>

   <!-- CSS Boostrap -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #3f60a0;">
      <div class="container-fluid px-5">
         <h5 class="navbar-brand">Admin Page</h5>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="">Kelola Produk</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Kelola Pesanan</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="faq/FAQ.php">Kelola FAQs</a>
               </li>
            </ul>
            <div class="d-flex">
               <a href="../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
            </div>
         </div>
      </div>
   </nav>
   <div class="container mt-5 mb-5">
      <a href="produk/addProduk.php"><button type="button" class="btn btn-success mt-5">+ Tambah Produk Baru</button></a>
      <table class="table table-bordered mt-4 text-center align-middle table-hover">
         <thead>
            <th>ID Produk</th>
            <th>Foto Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
         </thead>
         <tbody>
            <?php foreach ($result as $data) : ?>
               <tr>
                  <td><?= $data['id_produk']; ?></td>
                  <td>
                     <img src=" ../home/assets/<?= $data['gambar_produk']; ?>" width="100px" alt="Gambar <?= $data['nama_produk']; ?>">
                  </td>
                  <td class="text-start"><?= $data['nama_produk']; ?></td>
                  <td><?= number_format($data['harga'],  0, '', '.'); ?></td>
                  <td><?= $data['kategori']; ?></td>
                  <td>
                     <a href="<?= "produk/detailProdukAdm.php?id_produk=" . $data['id_produk']; ?>" class="mb-1"><button type="button" class="btn btn-outline-info">detail</button></a>
                     <a href="<?= "produk/editProduk.php?id_produk=" . $data['id_produk']; ?>" class="mb-1"><button type="button" class="btn btn-outline-warning">ubah</button></a>
                     <a href="<?= "produk/deleteproduk.php?id_produk=" . $data['id_produk']; ?>" onclick="return confirm('Apakah Anda yakin menghapus produk?')"><button type=" button" class="btn btn-outline-danger">hapus</button></a>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>


   <!-- JS Boostrap -->
   <script src="../assets/css/bootstrap.bundle.min.js"></script>
</body>

</html>