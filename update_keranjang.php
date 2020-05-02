<?php
    // memulai session
    session_start();
    // mengambil dari variabel session keranjang
    $keranjang = $_SESSION["keranjang"];
    // mengambil dari barang_id yang dikirim melalui ajax dengan metode post
    $barang_id = $_POST["barang_id"];
    $value = $_POST["value"];
    // kita akan merubah array yg ada didalam variabel keranjang
    // variabel barang_id sebagai keynya (index)
    // kemudian update quantity sesuai isi variabel $value
    $keranjang[$barang_id]["quantity"] = $value;
    // merubah session sesuai isi variabel keranjang
    $_SESSION["keranjang"] = $keranjang;