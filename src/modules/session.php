<?php

  if(!isset($_COOKIE['session']) and isset($_SESSION['logado'])){
    header('Location:modules/logout.php');
  }

 ?>
