<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
   //something was posted
   $full_name = $_POST['full_name'];
   $user_name = $_POST['user_name'];
   $password = $_POST['password'];
   $image = $_POST['image'];
   $hp = $_POST['hp'];
   $alamat = $_POST['alamat'];

   if (!empty($full_name) && !empty($user_name) && !empty($password) && !empty($image) && !is_numeric($user_name)) {

      //save to database
      $user_id = random_num(10);
      $query = "INSERT INTO users (user_id, full_name, user_name, password, image, hp, alamat) VALUES ('$user_id', '$full_name', '$user_name','$password','$image', '$hp', '$alamat')";

      mysqli_query($con, $query);

      header("Location: login.php");
      die;
   } else {
      echo "Please enter some valid information!";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/_signup.css">
   <title>Sign up</title>
</head>

<body>
   <div class="container">
      <div class="logo">
         <img src="assets/img/logo.png" alt="" class="logo" style="width: 350px;">
      </div>
      <div class="form-group">
         <div class="header">
            <h2>Create New Account</h2>
            <p>Already registered? <a href="login.php"><b>login here</b></a></p>
         </div>
         <form method="post" class="sign-up-form">
            <input type="text" name="full_name" placeholder="Full Name" required autocomplete="off" autofocus><br>
            <input type="text" name="user_name" placeholder="Username" required autocomplete="off"><br>
            <input type="password" name="password" placeholder="Password" required autocomplete="off"><br>
            <input type="text" name="hp" placeholder="No Telp (08xxxx)" required autocomplete="off"><br>
            <input type="text" name="alamat" placeholder="Address" required autocomplete="off"><br>
            <input type="file" name="image" accept=".png,.gif,.jpg" id="image" required><br>
            <p>By continuing, you agree with out Term & Conditions and Privacy Policy.</p>
            <button id="button" type="submit">Sign Up</button>
         </form>
      </div>
   </div>
</body>

</html>