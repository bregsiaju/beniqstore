<?php

include("../../conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['faq_id'])) {
      //query SQL
      $faq_id = $_GET['faq_id'];
      $query = "DELETE FROM faq WHERE faq_id = '$faq_id'";
      $result = query($query);

      echo "<script>alert('Pertanyaan berhasil dihapus.')</script>";
      echo "<script>location='FAQ.php'</script>";
   }
}
