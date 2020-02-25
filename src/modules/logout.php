<?php
// logout
session_start();
session_unset();
session_destroy();
setcookie('session',$dados['id'],time()-600);
header('Location:../index.php');
 ?>
