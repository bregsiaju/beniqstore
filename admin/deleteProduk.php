<?php

include("../conn.php");

$status = '';
$result = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['id_produk'])) {
      //query SQL
      $id_produk = $_GET['id_produk'];
      $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

      //eksekusi query
      $result = query($query);

      if ($result) {
         $status = 'ok';
      } else {
         $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status=' . $status);
   }
}
