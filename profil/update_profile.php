<?php

include("../conn.php");

$status = '';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['user_id'])) {
      //query SQL
      $id_display_upd = $_GET['user_id'];
      $query = "SELECT * FROM users WHERE user_id = '$id_display_upd'";

      //eksekusi query
      $result = query($query);
   }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $user_id = $_POST['user_id'];
   $full_name = $_POST['full_name'];
   $user_name = $_POST['user_name'];
   $password = $_POST['password'];
   $alamat = $_POST['alamat'];
   $hp = $_POST['hp'];
   //query SQL
   $sql = "UPDATE users SET full_name='$full_name', user_name='$user_name', password='$password', alamat='$alamat', hp='$hp' WHERE user_id='$user_id'";

   //eksekusi query
   $result = query($sql);
   header('Location: profile.php?user_id=' . $user_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS Boostrap -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="omo.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
   <title>Update Profile</title>
</head>

<body>
   <div class="container">
      <form action="" method="POST">
         <?php foreach ($result as $user_data) : ?>
            <div class="profile-box">
               <h3 class="tulisan_profil">Update Profile</h3>
               <img src="icon-garis.png" alt="garis" class="garis">
               <br><br>
               <label for="user_id" class="col-form-label text-white" hidden>User ID</label>
               <input type="text" name="user_id" value="<?= $user_data['user_id']; ?>" class="form-control" required hidden>

               <label for="full_name" class="col-form-label text-white">Full Name</label>
               <input type="text" name="full_name" value="<?= $user_data['full_name']; ?>" class="form-control" required>

               <label for="user_name" class="col-form-label text-white">Username</label>
               <input type="text" name="user_name" value="<?= $user_data['user_name']; ?>" class="form-control" required>

               <label for="alamat" class="col-form-label text-white">Alamat</label>
               <input type="text" name="alamat" value="<?= $user_data['alamat']; ?>" class="form-control" required>

               <label for="hp" class="col-form-label text-white">No HP</label>
               <input type="text" name="hp" value="<?= $user_data['hp']; ?>" class="form-control" required>

               <label for="password" class="col-form-label text-white">Password</label>
               <input type="password" name="password" value="<?= $user_data['password']; ?>" class="form-control" required>

               <div class="tombol">
                  <input type="submit" value="Update">
               </div>
            </div>
         <?php endforeach; ?>
      </form>
   </div>
</body>

</html>