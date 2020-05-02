<?php

session_start();

// cara logout paling bersih
// dengan menghapus seluruh session
$_SESSION = [];
session_unset();
session_destroy();

// hapus cookie
setcookie('id_user','', time() - 3600);
setcookie('key_user','', time() - 3600);

header("Location: index.php");

?>