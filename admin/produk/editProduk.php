<?php

include("../../conn.php");

$status = '';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['id_produk'])) {
      //query SQL
      $id_produk_upd = $_GET['id_produk'];
      $query = "SELECT * FROM produk WHERE id_produk = '$id_produk_upd'";

      //eksekusi query
      $result = query($query);
   }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id_produk = $_POST['id_produk'];
   $nama_produk = $_POST['nama_produk'];
   $harga = $_POST['harga'];
   $kategori = $_POST['kategori'];
   $waktu_pengerjaan = $_POST['waktu_pengerjaan'];
   $deskripsi = $_POST['deskripsi'];
   $gambar_produk = $_POST['gambar_produk'];
   //query SQL
   $sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', kategori='$kategori', waktu_pengerjaan='$waktu_pengerjaan', deskripsi='$deskripsi', gambar_produk='$gambar_produk' WHERE id_produk='$id_produk'";

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
   <nav class="navbar                             n   navbar-dark fixed-top" style="background-color: #3f60a0;">
      <div class="container-fluid px-5">
         <h5 class="text-white"><a href="../index.php">Kelola Produk</a> > Ubah Info Produk</h5>
         <a href="../../logout.php"><button class="btn btn-outline-light" type="submit">Logout</button></a>
      </div>
   </nav>
   <div class="container mt-5 d-flex justify-content-center">
      <div class="col-sm-9">
         <div class="card ">
            <h5 class="card-header">Ubah data produk</h5>
            <div class="card-body">
               <form action="" method="POST">
                  <?php foreach ($result as $data) : ?>
                     <div class="mb-3">
                        <label for="id_produk" class="col-form-label">ID Produk</label>
                        <input type="text" name="id_produk" value="<?= $data['id_produk']; ?>" class="form-control" required readonly>
                     </div>
                     <div class="mb-3">
                        <label for="nama_produk" class="col-form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" class="form-control" required>
                     </div>
                     <div class="mb-3">
                        <label for="harga" class="col-form-label">Harga</label>
                        <div class="input-group">
                           <span class="input-group-text">Rp</span>
                           <input type="number" name="harga" value="<?= $data['harga']; ?>" class="form-control" required>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="kategori" class="col-form-label">Kategori Produk</label>
                        <input type="text" name="kategori" value="<?= $data['kategori']; ?>" class="form-control" required>
                     </div>
                     <div class="mb-3">
                        <label for="waktu_pengerjaan" class="col-form-label">Durasi Pengerjaan</label>
                        <div class="input-group">
                           <input type="text" name="waktu_pengerjaan" value="<?= $data['waktu_pengerjaan']; ?>" class="form-control" required>
                           <span class="input-group-text">Hari</span>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label for="deskripsi" class="col-form-label">Deskripsi Produk</label>
                        <textarea type="text" name="deskripsi" class="form-control" required><?= $data['deskripsi']; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label for="gambar_produk" class="col-form-label">Gambar Produk</label>
                        <input type="text" name="gambar_produk" value="<?= $data['gambar_produk']; ?>" class="form-control" required>
                     </div>
                     <input type="submit" value="Ubah" class="btn btn-success float-end mt-3">
                  <?php endforeach; ?>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- JS Bootstrap -->
   <script src="../../assets/css/bootstrap.bundle.min.js"></script>
</body>

</html>