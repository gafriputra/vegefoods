<?php

session_start();

// cara logout paling bersih
// dengan menghapus seluruh session
$_SESSION = [];
session_unset();
session_destroy();

// hapus cookie
setcookie('id_admin','', time() - 3600);
setcookie('key_admin','', time() - 3600);

header("Location: login/index.php");

?>