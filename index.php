<?php
session_start();

include("functions.php");
include("conn.php");

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

if (isset($_POST["outer"])) {
   $result = categories($_POST["Outer"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BENIQ Shop</title>

   <!-- css -->
   <link rel="stylesheet" href="home/style/home.css">
   <link rel="stylesheet" href="home/style/shape.css">
   <link rel="stylesheet" href="home/style/slide.css">
   <link rel="icon" type="image/x-icon" href="assets/img/logo.png">

   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
</head>

<body id="home">
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
   <div class="part header">
      <div class="lokasi">
         <h2>Selamat Datang, </h2>
         <h3>
            <img src="assets/img/users/users.png" alt="foto profil">
            <a href="login.php">Login</a>
         </h3>
      </div>
      <div class="searching">
         <form action="" method="POST">
            <input type="text" name="keyword" autocomplete="off" id="keyword" placeholder="cari produk">
            <button class="search" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
         </form>
         <div class="cart-notif">
            <a href="login.php"><i class="fa-solid fa-cart-shopping"></i></a>
            &nbsp;&nbsp;
            <a href="login.php"><i class=" fa-solid fa-circle-user"></i></a>
         </div>
      </div>
   </div>
   <!-- end header -->
   <hr><br>
   <!-- slider banner -->
   <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner d-flex justify-content-around">
         <div class="carousel-item active">
            <a href=""><img src="assets/img/banner1.png" class="w-50 rounded-3 " alt="banner promo"></a>
         </div>
         <div class="carousel-item">
            <a href=""><img src="assets/img/banner2.png" class="w-50 rounded-3 " alt="banner promo"></a>
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
   <!-- end slider banner -->
   <br>
   <hr>
   <!-- daftar kategori -->
   <div class="kategori part">
      <h3>Kategori Produk</h3>
      <div class="daftar-kategori scrolling-wrapper">
         <form action="" method="POST">
            <a href="index.php">Semua produk</a>

            <input type="text" value="Atasan" id="Atasan" name="Atasan" hidden>
            <button type="submit" name="atasan">Atasan</button>

            <input type="text" value="Seragam" id="Seragam" name="Seragam" hidden>
            <button type="submit" name="seragam">Seragam</button>

            <input type="text" value="Gamis" id="Gamis" name="Gamis" hidden>
            <button type="submit" name="gamis">Gamis</button>

            <input type="text" value="Bawahan" id="Bawahan" name="Bawahan" hidden>
            <button type="submit" name="bawahan">Bawahan</button>

            <input type="text" value="Outer" id="Outer" name="Outer" hidden>
            <button type="submit" name="outer">Outer</button>
         </form>
      </div>
   </div>
   <!-- end daftar kategori -->

   <!-- daftar produk -->
   <div class="part">
      <div class="catalog">
         <?php foreach ($result as $data) : ?>
            <div class="produk">
               <a href="login.php">
                  <img src="home/img/<?= $data['gambar_produk']; ?>" alt="Foto produk">
               </a>
               <div class="produk-info">
                  <h4><?= $data['nama_produk']; ?></h4>
                  <br>
                  <p class="harga">Rp<?= number_format($data['harga'],  0, '', '.'); ?></p>
                  <div class="co">
                     <a href="login.php" class="checkout"><i class="fa-solid fa-cart-shopping"></i>Pesan</a>
                  </div>
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
               <li><a href="home/about.php">Tentang Kami</a></li>
               <li><a href="home/faq.php">FAQ</a></li>
               <li><a href="https://api.whatsapp.com/send?phone=62895703340802&text=Hallo%20Kak">Hubungi Kami</a></li>
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
            <img src="assets/img/logo.png" alt="logo toko" class="logo">
            <div class="copyrigth">2022 © Kel. 4 Pemweb C081</div>
         </div>
      </div>
   </div>
   <!-- end footer -->

   <!-- script -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>