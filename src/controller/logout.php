<?php
// destruir sessão
session_start();
session_unset();
session_destroy();
// destruir cookie de limite de sessão
setcookie('session',$dados['id'],time()-600);
// redirecionar para index
header('Location:../index.php');
 ?>
