<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['user_id'])) {
      //query SQL
      $id_display = $_GET['user_id'];
      $query = "SELECT * FROM users WHERE user_id = $id_display";

      //eksekusi query
      $result = query($query);
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="profileStyle.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
   <script src="https://kit.fontawesome.com/ecde83b210.js" crossorigin="anonymous"></script>
   <title>My Profile</title>
</head>

<body>
   <div class="container">
      <?php foreach ($result as $user_data) : ?>
         <div class="profile-box">
            <a href="../home/home.php"><img src="icon-logout.png" alt="Logout-icon" class="logout-icon"></a>
            <h3 class="tulisan_profil">Profile</h3>
            <img src="icon-garis.png" alt="garis" class="garis">
            <img src="../assets/img/users/<?= $user_data['image']; ?>" alt="profile" class="profile">
            <h3><?= $user_data['user_name']; ?></h3>
            <h3>(<?= $user_data['full_name']; ?>)</h3>
            <p><?= $user_data['alamat']; ?></p>
            <p><?= $user_data['hp']; ?></p>

            <a href="<?= "update_profile.php?user_id=" . $user_data['user_id']; ?>"><button type="button">Edit Profile</button></a>
            <div class="profile_bawah">
               <h3>Registered on :</h3>
               <!-- <a href="<?= "riwayatpesanan.php?full_name=" . $user_data['full_name'] ?>">
                  <h3>Lihat riwayat pesanan <i class="fa-solid fa-angle-right"></i></h3>
               </a> -->
               <p1><?= $user_data['date']; ?></p1>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</body>

</html>