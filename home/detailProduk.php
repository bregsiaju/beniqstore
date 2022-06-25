<?php
require '../conn.php';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['id_produk'])) {
      //query SQL
      $id_display = $_GET['id_produk'];
      $query = "SELECT * FROM produk WHERE id_produk = $id_display";

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
   <!-- style css -->
   <link rel="stylesheet" href="style/_details.css">
   <link rel="stylesheet" href="style/shape.css">
   <!-- kit icon -->
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <?php foreach ($result as $data) : ?>
      <title><?= $data['nama_produk'] ?></title>
</head>

<body>
   <!-- background flow -->
   <div class="top-shape">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
         <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
         <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
         <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
      </svg>
   </div>
   <!-- end background -->
   <!-- isi konten -->
   <section>
      <div class="container">
         <div class="header">
            <h2>Detail Produk</h2>
         </div>
         <div class="gambar-produk">
            <img src="img/<?= $data['gambar_produk']; ?>" alt="gambar produk">
         </div>
      </div>
      <!-- detail produk -->
      <div class="detail">
         <div class="nama-produk">
            <h1><?= $data['nama_produk']; ?></h1>
         </div>
         <div class="keterangan">
            <p>Terpesan 10 | ⭐ 5.0</p>
         </div>
         <div class="harga">
            <p><i class="fa-solid fa-rupiah-sign"></i> <?= number_format($data['harga'], 0, '', '.'); ?></p>
         </div>
         <hr>
         <div class="durasi">
            <i class="fa-regular fa-clock"></i>
            <div>
               <h4>Estimasi waktu pengerjaan</h4>
               <p><?= $data['waktu_pengerjaan']; ?> hari</p>
            </div>
         </div>
         <div class="deskripsi">
            <i class="fa-solid fa-circle-info"></i>
            <div>
               <h4>Deskripsi</h4>
               <p><?= $data['deskripsi']; ?>
            </div>
         </div>
         <!-- checkout -->
         <div class="checkout">
            <div class="tombol">
               <a href="https://api.whatsapp.com/send?phone=62895703340802&text=Hallo%20Kak"><button><i class="fa-solid fa-message"></i> Chat penjahit</button></a>
               <a href="checkout/beli.php?id=<?php echo $data['id_produk'] ?>"><button><i class="fa-solid fa-cart-shopping"></i> Pesan sekarang</button></a>
            </div>
         </div>
         <!-- end checkout -->
      </div>
      <!-- end detail produk -->
   </section>
   <!-- end isi konten -->
<?php endforeach; ?>
<!-- ulasan -->
<div class="ulasan">
   <p>⭐5.0 (0 ulasan)</p>
   <hr>
   <p>belum ada ulasan</p>
</div>
</body>

</html>