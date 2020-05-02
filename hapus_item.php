<?php
    // memulai session
    session_start();
    // mengambil file helper
    include_once("function/function.php");
    // mengambil barang_id
    $barang_id = $_GET['barang_id'];
    // mengambil nilai array daari variabel session
    $keranjang = $_SESSION['keranjang'];
    // menghapus isi array sesuai index nilai $barang_id
    unset($keranjang[$barang_id]);
    // menyimpan nilai array baru daru $keranjang ke variabel session
    $_SESSION['keranjang'] = $keranjang;
    // mengembalikan kehalaman keranjang
    direct("index.php?page=keranjang");
    // header("Location :" .BASE_URL." index.php?page=keranjang");