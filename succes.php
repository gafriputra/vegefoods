<?php
  cekBelumLogin_user();
  if ($_POST["submit"]) {
    $noinvoice = proses_pemesanan($_POST);
  }else {
    header("Locaation: index.php");
  }
    // var_dump($_POST);die;
    // var_dump($_SESSION["keranjang"]);
?>

<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Pesanan anda</strong> telah kami terima, dengan nomer invoice #<?=$noinvoice?>. Harap segera melunasi pembayaran.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="?page=my_profile" role="button">Lihat Pesanan</a>
  </p>
</div>