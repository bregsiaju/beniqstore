<?php

session_start();

include("conn.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
   //something was posted
   $user_name = $_POST['user_name'];
   $password = $_POST['password'];
   $ambil = $con->query("SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'");

   if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

      //read from database
      $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
      $result = mysqli_query($con, $query);

      if ($result) {
         if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['user_name'] === "admin" && $user_data['password'] === $password) {
               $_SESSION['user_id'] = $user_data['user_id'];
               header("Location: admin/index.php");
            } elseif ($user_data['password'] === $password) {
               $_SESSION['user_id'] = $user_data['user_id'];
               $akun = $ambil->fetch_assoc();
               $_SESSION['pelanggan'] = $akun;
               $_SESSION['users'] = $akun;
               header("Location: home/home.php");
            }
            echo "wrong username or password!";
         }
         die;
      }
      echo "wrong username or password!";
   } else {
      echo "wrong username or password!";
   }
}

?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Log In</title>
   <link rel="stylesheet" href="assets/css/_signup.css">
   <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
</head>

<body>
   <div class="container">
      <div class="logo">
         <img src="assets/img/logo.png" alt="" class="logo" style="width: 350px;">
      </div>
      <div class="form-group">
         <div class="header">
            <h2>WELCOME BACK</h2>
            <p>Don't have an account yet? <a href="signup.php"><b>Register now!</b></a></p>
         </div>
         <form method="post" class="sign-up-form" action="">
            <input id="text" type="text" placeholder="Username" name="user_name" autocomplete="off" required autofocus><br>
            <input id="text" type="password" placeholder="Password" name="password" autocomplete="off" required><br>
            <button id="button" type="submit">Log In</button>
         </form>
      </div>
   </div>
</body>

</html>