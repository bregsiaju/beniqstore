<?php
session_start();
include("../../conn.php");

$result = query("SELECT * FROM pembelianbaru");

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
   <title>Daftar Pesanan</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #3f60a0;">
      <div class="container-fluid px-5">
         <h5 class="navbar-brand">Admin Page</h5>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" href="../index.php">Kelola Produk</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Kelola Pesanan</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../faq/FAQ.php">Kelola FAQs</a>
               </li>
            </ul>
            <div class="d-flex">
               <a href="../../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
            </div>
         </div>
      </div>
   </nav>
   <!-- end navbar -->
   <!-- order table -->
   <div class="container mt-5 mb-5">
      <h3 class="text-center pt-5">Daftar Pesanan</h3>
      <table class="table table-bordered mt-4 align-middle table-striped">
         <thead class="text-center align-middle">
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>No HP</th>
            <th>Harga</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Tanggal Beli</th>
            <th>Status</th>
         </thead>
         <tbody>
            <?php foreach ($result as $data) : ?>
               <tr>
                  <td class="text-center"><?= $data['id_trans']; ?></td>
                  <td><?= $data['namapembeli']; ?></td>
                  <td><?= $data['hp']; ?></td>
                  <td><?= number_format($data['harga'],  0, '', '.'); ?></td>
                  <td><?= $data['produk']; ?></td>
                  <td class="text-center"><?= $data['jumlah']; ?></td>
                  <td><?= $data['tgl_pembelian']; ?></td>
                  <!-- <td class="text-wrap" style="width: 500px;"><?= $data['answer']; ?></td> -->
                  <td class="text-center">
                     <?php if ($data['status'] === "Diproses") { ?>
                        <a href="<?= "upd_status.php?id_trans=" . $data['id_trans'] . "&status=" . $data['status']; ?>"><button type=" button" class="btn btn-warning btn-sm"><?= $data['status'] ?></button></a>
                     <?php } else if ($data['status'] === "Selesai") { ?>
                        <a href="<?= "upd_status.php?id_trans=" . $data['id_trans'] . "&status=" . $data['status']; ?>"><button type=" button" class="btn btn-success btn-sm"><?= $data['status'] ?></button></a>
                     <?php } ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <!-- end order table -->
</body>

</html>