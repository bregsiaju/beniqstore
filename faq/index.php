<?php
session_start();
include("../conn.php");

$result = query("SELECT * FROM faq");
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>FAQ</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <img src="contoh.jpg">
   <div class="container">
      <div class="row">
         <div class="faq-wrapper">
            <div class="header">
               <h1>FAQs</h1>
            </div>
            <?php foreach ($result as $data) : ?>
               <div class="faq-inner">
                  <div class="faq-item">
                     <h3>
                        <?= $data['question']; ?>
                        <span class="faq-plus">&plus;</span>
                     </h3>
                     <hr>
                     <div class="faq-body">
                        <?= $data['answer']; ?>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
   <br><br>


   <script type="text/javascript">
      $(".faq-plus").on('click', function() {
         $(this).parent().parent().find('.faq-body').slideToggle();
      });
   </script>
</body>

</html>