<?php
session_start();
include("../../conn.php");

$result = query("SELECT * FROM faq");
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>FAQ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
   <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
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
                  <a class="nav-link" href="../index.php">Kelola Produk</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../pesanan/order.php">Kelola Pesanan</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Kelola FAQs</a>
               </li>
            </ul>
            <div class="d-flex">
               <a href="../../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
            </div>
         </div>
      </div>
   </nav>
   <div class="container mt-5 mb-5">
      <h3 class="text-center pt-5">Daftar FAQs</h3>
      <a href="add.php"><button type="button" class="btn btn-success mt-2">+ Tambah FAQ</button></a>
      <table class="table table-bordered mt-4 align-middle table-striped">
         <thead class="text-center align-middle">
            <th>Id FAQ</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Aksi</th>
         </thead>
         <tbody>
            <?php foreach ($result as $data) : ?>
               <tr>
                  <td class="text-center"><?= $data['faq_id']; ?></td>
                  <td><?= $data['question']; ?></td>
                  <td class="text-wrap" style="width: 500px;"><?= $data['answer']; ?></td>
                  <td class="text-center">
                     <a href="<?= "update.php?faq_id=" . $data['faq_id']; ?>" class="mb-1"><button type="button" class="btn btn-outline-primary">ubah</button></a>
                     <a href="<?= "delete.php?faq_id=" . $data['faq_id']; ?>" onclick="return confirm('Apakah yakin menghapusnya?')"><button type=" button" class="btn btn-outline-danger">hapus</button></a>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
   <br><br>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>