<?php
include("../conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['full_name'])) {
      //query SQL
      $user = $_GET['full_name'];
      $query = "SELECT * FROM pembelianbaru WHERE namapembeli = '$user'";

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
   <title>Riwayat Pesanan</title>
</head>

<body>
   <?php foreach ($result as $data) : ?>
      <h3><?= $data['produk'] ?></h3>
      <p><?= $data['harga'] ?></p>
      <small><?= $data['jumlah'] ?></small>
      <p><?= $data['tgl_pembelian'] ?></p>
      <p><?= $data['status'] ?></p>
   <?php endforeach; ?>
</body>

</html>