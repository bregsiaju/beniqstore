<?php
//mendapatkan id_produk dari url
session_start();
$id_produk = $_GET['id'];

//jika sudah ada produk itu dikeranjang , maka produk dijumlahkan +1
if (isset($_SESSION['keranjang'][$id_produk])) {
   $_SESSION['keranjang'][$id_produk] += 1;
} else {
   //else blm ada dikeranjang , maka produk itu dianggap beli 1
   $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Produk telah masuk ke keranjang belanja')</script>";
echo "<script>location='keranjang.php'</script>";
