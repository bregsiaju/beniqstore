<?php
include("../../conn.php");

$result = '';
$status = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   if (isset($_GET['faq_id'])) {
      $id_faq = $_GET['faq_id'];
      $query = "SELECT * FROM faq WHERE faq_id = '$id_faq'";
      $result = query($query);
   }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $faq_id = $_POST['faq_id'];
   $question = $_POST['question'];
   $answer = $_POST['answer'];

   $sql = "UPDATE faq SET question = '$question', answer = '$answer' WHERE faq_id='$faq_id'";
   $result = query($sql);

   echo "<script>alert('FAQ berhasil di-update.')</script>";
   echo "<script>location='FAQ.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update FAQ</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
   <div class="container mt-5 d-flex justify-content-center">
      <div class="col-sm-9">
         <div class="card ">
            <h5 class="card-header">Update FAQ</h5>
            <div class="card-body">
               <form action="" method="POST">
                  <?php foreach ($result as $data) : ?>
                     <div class="mb-3">
                        <input type="number" name="faq_id" value="<?= $data['faq_id']; ?>" class="form-control" readonly>
                     </div>
                     <div class="mb-3">
                        <label for="question" class="col-form-label">Pertanyaan</label>
                        <textarea type="text" name="question" class="form-control" required><?= $data['question']; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label for="answer" class="col-form-label">Jawaban</label>
                        <textarea type="text" name="answer" class="form-control" required><?= $data['answer']; ?></textarea>
                     </div>
                     <input type="submit" value="Ubah" class="btn btn-primary float-end mt-3">
                  <?php endforeach; ?>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>