<?php
include("../conn.php");
$result = query("SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>

<head>
   <title>Team Section</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style/aboutus.css">
   <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
</head>

<body>

   <section class="team-section">
      <div class="container">
         <div class="row">
            <div class="section-title">
               <h1>Our Team</h1>
               <p>*jeng jeng jeng* Inilah Anggota Kelompok 4 🤩🔥</p>
            </div>
         </div>
         <div class="row">
            <div class="team-items">
               <?php foreach ($result as $data) : ?>
                  <div class="item">
                     <img src="../assets/img/team/<?php echo $data['gambar']; ?>" alt="team" />
                     <div class="inner">
                        <div class="info">
                           <h5><?php echo $data['nama']; ?></h5>
                           <p><?php echo $data['npm']; ?></p>
                           <div class="social-links">
                              <a href="<?php echo $data['facebook']; ?>"><span class="fa fa-facebook"></span></a>
                              <a href="<?php echo $data['whatsapp']; ?>"><span class="fa fa-whatsapp"></span></a>
                              <a href="<?php echo $data['instagram']; ?>"><span class="fa fa-instagram"></span></a>
                              <a href="<?php echo $data['youtube']; ?>"><span class="fa fa-youtube"></span></a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>

            </div>
         </div>
      </div>
   </section>

</body>

</html>