<?php

  // se o cookie de limite de sessão não existir e a pessoa estiver logada é feito logout
  if(!isset($_COOKIE['session']) and isset($_SESSION['logado'])){
    if($_SESSION['distincao'] != 1){
      header('Location:modules/logout.php');
    }
  }

 ?>
