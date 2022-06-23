<?php

use LDAP\Result;

include("../../conn.php");

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nama_produk = $_POST['nama_produk'];
   $harga = $_POST['harga'];
   $kategori = $_POST['kategori'];
   $waktu_pengerjaan = $_POST['waktu_pengerjaan'];
   $deskripsi = $_POST['deskripsi'];
   $gambar_produk = $_POST['gambar_produk'];
   //query SQL
   $sql = "INSERT INTO produk (nama_produk, harga, kategori, waktu_pengerjaan, deskripsi, gambar_produk) VALUES ('$nama_produk', '$harga', '$kategori', '$waktu_pengerjaan', '$deskripsi', '$gambar_produk')";

   //eksekusi query
   $result = query($sql);
   if ($result) {
      $status = 'ok';
   } else {
      $status = 'err';
   }
   header('Location: ../index.php?status=' . $status);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Produk</title>

   <!-- CSS Boostrap -->
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <!-- myCSS -->
   <link rel="stylesheet" href="../../assets/css/mycss.css">
</head>

<body>
   <nav class="navbar navbar-dark fixed-top" style="background-color: #3f60a0;">
      <div class="container-fluid px-5">
         <h5 class="text-white"><a href="../index.php">Kelola Produk</a> > Tambah Produk Baru</h5>
         <a href="../../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
      </div>
   </nav>
   <div class="container mt-5 d-flex justify-content-center">
      <div class="col-sm-9">
         <div class="card ">
            <h5 class="card-header">Input data produk</h5>
            <div class="card-body">
               <form action="" method="POST">
                  <div class="mb-3">
                     <label for="nama_produk" class="col-form-label">Nama Produk</label>
                     <input type="text" name="nama_produk" placeholder="Masukkan nama produk" class="form-control" required>
                  </div>
                  <div class="mb-3">
                     <label for="harga" class="col-form-label">Harga</label>
                     <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" placeholder="Masukkan harga produk" class="form-control" required>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="kategori" class="col-form-label">Kategori Produk</label>
                     <input type="text" name="kategori" placeholder="Masukkan nama kategori" class="form-control" required>
                  </div>
                  <div class="mb-3">
                     <label for="waktu_pengerjaan" class="col-form-label">Durasi Pengerjaan</label>
                     <div class="input-group">
                        <input type="text" name="waktu_pengerjaan" placeholder="ex: 3-5" class="form-control" required>
                        <span class="input-group-text">Hari</span>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="deskripsi" class="col-form-label">Deskripsi Produk</label>
                     <textarea type="text" name="deskripsi" placeholder="Tuliskan deskripsi produk" class="form-control" required></textarea>
                  </div>
                  <div class="mb-3">
                     <label for="formFile" class="form-label">Upload gambar produk</label>
                     <input class="form-control" type="file" id="formFile">
                  </div>
                  <input type="submit" value="Simpan" class="btn btn-primary float-end mt-3">
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- JS Bootstrap -->
   <script src="../../assets/css/bootstrap.bundle.min.js"></script>
</body>

</html>