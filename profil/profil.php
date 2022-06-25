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
   <title>My Profile</title>
</head>

<body>
   <div class="container">
      <?php foreach ($result as $user_data) : ?>
         <div class="profile-box">
            <a href="../home/home.php"><img src="icon-logout.png" alt="Logout-icon" class="logout-icon"></a>
            <h3 class="tulisan_profil">Profile</h3>
            <img src="icon-garis.png" alt="garis" class="garis">
            <img src="../assets/img/users/<?php echo $user_data['image']; ?>" alt="profile" class="profile">
            <h3><?php echo $user_data['user_name']; ?></h3>
            <h3>(<?php echo $user_data['full_name']; ?>)</h3>
            <p><?php echo $user_data['alamat']; ?></p>
            <p><?php echo $user_data['hp']; ?></p>

            <button type="button">Edit Profile</button>
            <div class="profile-bawah">
               <h3>Registered on :</h3>
               <p1><?php echo $user_data['date']; ?></p1>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</body>

</html>