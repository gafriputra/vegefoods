<?php
  session_start();
  require("../function/function.php");
  if (isset($_GET["pesanan_id"])) {
    $pesanan_id = $_GET["pesanan_id"];
    $whereID = false;
    if (isset($_SESSION["login_user"]["user_id"])) {
      $user_id = $_SESSION["login_user"]["user_id"];
      $whereID= "AND user_id=".$user_id;
    }
    $invoice = query("SELECT * FROM pesanan WHERE pesanan_id=$pesanan_id $whereID")[0];
    // echo "SELECT * FROM pesanan WHERE pesanan_id=$pesanan_id $whereID";die;
    if (!count($invoice)) {
     header("Location: ../../index.php");
     exit;
    }
    $ongkir = query("SELECT harga FROM pengiriman WHERE pesanan_id=$pesanan_id")[0];
    $barang = query("SELECT pesanan_detail.* , barang.nama_barang FROM pesanan_detail 
                      JOIN barang ON pesanan_detail.barang_id = barang.barang_id 
                      WHERE pesanan_detail.pesanan_id='$pesanan_id'");
  }
?>

<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice Vegefoods</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">
    <link rel="stylesheet" href="css/template.css">
  </head>
  <body>
    <div id="container">
      <div class="app-main__outer">
      <section id="memo">
        <div class="logo">
          <img src="../../images/logo.png" alt="">
        </div>
        
        <div class="company-info">
          <div>VEGEFOODS</div>

          <br />
          
          <span>Jl. Brigjen Katamso 4</span>
          <span>61256</span>

          <br />
          
          <span>0838-3011-6257</span>
          <span>halo@vegefoods.id</span>
        </div>

      </section>

      <section id="invoice-title-number">
      
        <span id="title">invoice</span>
        <span id="number">#<?= $invoice["no_invoice"] ?></span>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="client-info">
        <span><?= $invoice["nama_penerima"] ?></span>
        <div>
          <span class="bold"></span>
        </div>
        
        <div>
          <span><?= $invoice["alamat_lengkap"] ?></span>
        </div>
        
        <div>
          <span><?= $invoice["kodepos"] ?></span>
        </div>
        
        <div>
          <span><?= $invoice["telepon"] ?></span>
        </div>
        
        <div>
          <span><?= $invoice["email"] ?></span>
        </div>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="items">
        
        <table cellpadding="0" cellspacing="0">
        
          <tr>
            <th>No</th> <!-- Dummy cell for the row number and row commands -->
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
          <?php
            $no =1 ;
            $subtotal = 0;
            foreach ($barang as $barang_part):
              $total = $barang_part["harga"] * $barang_part["quantity"];
              $subtotal = $subtotal + $total;
          ?>
          <tr>
            <td><?= $no ?></td> <!-- Don't remove this column as it's needed for the row commands -->
            <td><?= $barang_part["nama_barang"] ?></td>
            <td><?= $barang_part["quantity"] ?> pcs.</td>
            <td><?= rupiah($barang_part["harga"]) ?></td>
            <td><?= rupiah($total) ?></td>
          </tr>
          <?php
            $no++;
            endforeach;
          ?>
        </table>
        
      </section>
      
      <section id="sums">
      
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>SUBTOTAL</th>
            <td><?= rupiah($subtotal) ?></td>
          </tr>

          <tr>
            <th>DISKON</th>
            <td>- <?= rupiah($invoice["diskon"]) ?></td>
          </tr>

          <tr>
            <th>ONGKIR</th>
            <td><?= rupiah($ongkir["harga"]) ?></td>
          </tr>
          
          <tr data-hide-on-quote="true">
            <th>TOTAL</th>
            <td><?= rupiah($invoice["total"]) ?></td>
          </tr>
          
        </table>

        <div class="clearfix"></div>
        
      </section>
      
      <div class="clearfix"></div>

      <section id="invoice-info">
        <div>
          <span>Dipesan :</span><span></span>
        </div>
        <div>
          <span>Tanggal</span> <span><?= date("d/m/Y H:i:s",strtotime($invoice["tanggal_pemesanan"])) ?></span>
        </div>

        <br />

        <div>
          <span>Metode Pembayaran</span> <span><?= $invoice["metode_pembayaran"] ?></span>
        </div>
        <div>
          <span>Status</span> <span><?= ucwords($invoice["status"]) ?></span>
        </div>
        <div>
          <span>Tanggal Cetak</span> <span><?= waktuIndonesia() ?></span>
        </div>
      </section>
      
      <section id="terms">

        <div class="notes">Hi <?= $invoice["nama_penerima"] ?>, terimakasih atas kepercayaan anda kepada kami. </div>

        <br />

        <div class="payment-info">
          <div>Info Pembayaran</div>
          <div>- BCA 6524-9556</div>
          <div>- MANDIRI 658845-55-55</div>
        </div>
        
      </section>

      <div class="clearfix"></div>

      <div class="thank-you">THANKS!</div>

      <div class="clearfix"></div>
      </div>
    </div>

    <script src="http://cdn.invoicebus.com/generator/generator.min.js?data=data.js"></script>
</html>
