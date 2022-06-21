<?php
session_start();

include("../connection.php");
include("../functions.php");
include("../conn.php");

$user_data = check_login($con);

$result = query("SELECT * FROM produk");

if (isset($_POST["search"])) {
   $result = search($_POST["keyword"]);
}

if (isset($_POST["atasan"])) {
   $result = categories($_POST["Atasan"]);
}

if (isset($_POST["seragam"])) {
   $result = categories($_POST["Seragam"]);
}

if (isset($_POST["gamis"])) {
   $result = categories($_POST["Gamis"]);
}

if (isset($_POST["bawahan"])) {
   $result = categories($_POST["Bawahan"]);
}

if (isset($_POST["hiasan"])) {
   $result = categories($_POST["Hiasan"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- css -->
   <link rel="stylesheet" href="style/home.css">
   <link rel="stylesheet" href="style/shape.css">
   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
</head>

<body>
   <!-- navbar -->

   <!-- end navbar -->
   <!-- background flow -->
   <div class="top-shape">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
         <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
         <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
         <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
      </svg>
   </div>
   <!-- end background flow -->

   <!-- header -->
   <div class="container header">
      <div class="lokasi">
         <h2>Selamat Datang, </h2>
         <h3>
            <img src="../assets/img/users/<?= $user_data['image']; ?>" alt="foto profil">
            <?= $user_data['full_name']; ?> ❤
         </h3>
         <a href="../logout.php">Logout</a>
      </div>
      <div class="searching">
         <form action="" method="POST">
            <input type="text" name="keyword" autocomplete="off" id="keyword" placeholder="cari produk">
            <button class="search" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
         </form>
         <div class="cart-notif">
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            &nbsp;&nbsp;
            <a href=""><i class="fa-solid fa-bell"></i></a>
         </div>
      </div>
   </div>
   <!-- end header -->
   <hr>
   <!-- daftar kategori -->
   <div class="kategori container">
      <h3>Kategori Produk</h3>
      <div class="daftar-kategori scrolling-wrapper">
         <form action="" method="POST">
            <a href="home.php">Semua produk</a>

            <input type="text" value="Atasan" id="Atasan" name="Atasan" hidden>
            <button type="submit" name="atasan">Atasan</button>

            <input type="text" value="Seragam" id="Seragam" name="Seragam" hidden>
            <button type="submit" name="seragam">Seragam</button>

            <input type="text" value="Gamis" id="Gamis" name="Gamis" hidden>
            <button type="submit" name="gamis">Gamis</button>

            <input type="text" value="Bawahan" id="Bawahan" name="Bawahan" hidden>
            <button type="submit" name="bawahan">Bawahan</button>

            <input type="text" value="Hiasan" id="Hiasan" name="Hiasan" hidden>
            <button type="submit" name="hiasan">Hiasan</button>
         </form>
      </div>
   </div>
   <!-- end daftar kategori -->

   <!-- daftar produk -->
   <div class="container">
      <div class="catalog">
         <?php foreach ($result as $data) : ?>
            <div class="produk">
               <a href="<?= "detailProduk.php?id_produk=" . $data['id_produk']; ?>">
                  <img src="assets/<?= $data['gambar_produk']; ?>" alt="Foto produk">
               </a>
               <div class="produk-info">
                  <h4><?= $data['nama_produk']; ?></h4>
                  <br>
                  <p class="harga">Rp<?= number_format($data['harga'],  0, '', '.'); ?></p>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
   <!-- end daftar produk -->

   <!-- footer -->
   <div class="footer">
      <div class="footer-content">
         <div class="list">
            <h4>BENIQ Shop</h4>
            <p>Create your own style.</p>
            <br>
            <ul>
               <li><a href="">Tentang Kami</a></li>
               <li><a href="">FAQ</a></li>
               <li><a href="">Hubungi Kami</a></li>
            </ul>
         </div>
         <div class="list">
            <h4>IKUTI KAMI</h4>
            <br>
            <ul>
               <li><a href=""><i class="fa-brands fa-instagram"></i> beniqshop</a></li>
               <li><a href=""><i class="fa-brands fa-tiktok"></i> beniqshop</a></li>
               <li><a href=""><i class="fa-brands fa-twitter"></i> beniqshop</a></li>
            </ul>
         </div>
         <div class="list">
            <img src="../assets/img/logo.png" alt="logo toko" class="logo">
            <div class="copyrigth">© Kel. 4 Pemweb C081</div>
         </div>
      </div>
   </div>
   <!-- end footer -->
</body>

</html>