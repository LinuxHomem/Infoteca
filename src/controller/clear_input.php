<?php

  // proteger contra sql injection e xss
  function clear($input){
    // verificar códigos sql
    $limpar = mysqli_escape_string($GLOBALS['connect'],$input);
    // verificar códigos html
    $limpar = htmlspecialchars($limpar);
    return $limpar;
  }

 ?>
