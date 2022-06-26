<?php

include("../../conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['id_trans']) && isset($_GET['status'])) {
      //query SQL
      $id_trans = $_GET['id_trans'];
      $status = $_GET['status'];

      if ($status === "Diproses") {
         $query = "UPDATE pembelianbaru SET status = 'Selesai' WHERE id_trans = '$id_trans'";
         $result = query($query);
      } else if ($status === "Selesai") {
         $query = "UPDATE pembelianbaru SET status = 'Diproses' WHERE id_trans = '$id_trans'";
         $result = query($query);
      }
      echo "<script>location='order.php'</script>";
   }
}
