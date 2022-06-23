<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FAQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <img src="contoh.jpg">
    <div class="container">
      <div class="row">
        <div class="faq-wrapper">
          <div class="header">

            <h1>FAQs</h1>
          </div>
          <div class="faq-inner">
            <div class="faq-item">
              <h3>
                Apakah seluruh produk tersedia ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
               Ya, seluruh produk tersedia dan siap dikirim. Kamu bisa cek melalui halaman “Rincian Produk” > “Stok”
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                Ukuran apa saja yang tersedia ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
              Produk memiliki ukuran yang bermacam-macam. Kamu bisa lihat “Panduan Ukuran” ketika memilih ukuran produk yang diinginkan
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                Apakah saya dapat menukar produk saya ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
               Semua produk yang telah dibeli tidak bisa ditukar. Oleh karena itu, kami ingin mengingatkan kepada Pembeli untuk memilih produk yang tepat dengan variasi yang benar
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                Mengapa pesanan saya belum sampai ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
               Kamu dapat melacak pengiriman melalui halaman “Pesanan Saya”
              </div>
            </div>
            <hr>
            <div class="faq-item">
              <h3>
                Mengapa pesanan saya belum dikirim ?
                <span class="faq-plus">&plus;</span>
              </h3>
              <div class="faq-body">
                Kami akan mengirimkan pesananmu secepatnya. Pesanan yang masuk hingga pk. 17:00 WIB akan dikirimkan pada hari yang sama, tetapi pesanan yang masuk setelah jam tersebut akan dikirimkan keesokan harinya.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 <br><br>
            <div class="tambah">
              <h2>
               Tambah FAQ
                <a href="form.html"> <span class="faq-plus">&plus;</span></a>
              </h2>
    <script type="text/javascript">
      $(".faq-plus").on('click',function(){
        $(this).parent().parent().find('.faq-body').slideToggle();
      });
    </script>
  </body>
</html>