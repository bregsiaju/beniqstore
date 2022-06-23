<?php

include("../../conn.php");

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $question = $_POST['question'];
   $answer = $_POST['answer'];
   //query SQL
   $sql = "INSERT INTO faq (question, answer) VALUES ('$question', '$answer')";
   $result = query($sql);

   echo "<script>alert('Pertanyaan berhasil ditambahkan.')</script>";
   echo "<script>location='FAQ.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah FAQ</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
   <div class="container mt-5 d-flex justify-content-center">
      <div class="col-sm-9">
         <div class="card ">
            <h5 class="card-header">Tambah FAQ Baru</h5>
            <div class="card-body">
               <form action="" method="POST">
                  <div class="mb-3">
                     <label for="question" class="col-form-label">Pertanyaan</label>
                     <textarea type="text" name="question" placeholder="Tuliskan Pertanyaan" class="form-control" required autofocus></textarea>
                  </div>
                  <div class="mb-3">
                     <label for="answer" class="col-form-label">Jawaban</label>
                     <textarea type="text" name="answer" placeholder="Tuliskan Jawaban" class="form-control" required></textarea>
                  </div>
                  <input type="submit" value="Simpan" class="btn btn-primary float-end mt-3">
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>