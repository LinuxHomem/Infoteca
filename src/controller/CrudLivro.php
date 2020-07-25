<?php
  // verificação de dados inválidos
  function errors(){
    return;
  }
  // verificação de dados inválidos

  // limpeza de xss
  function clear($array){
    $array2 = array();
    foreach ($array as $key => $value) {
      $key = $value;
      $key = htmlspecialchars($key);
      $array2[] = $key;
    }
    return $array2;
  }
  // limpeza de xss

  function create($array){
    // remover o post do botão
    array_pop($array);

    // armazenar verificação de dados inválidos em um array
    $errors = errors($array);

    // se tiver algum erro ele exibe, se não ele prossegue com o cadastro
    if(!empty($errors)){
      echo '<center>';
      foreach ($errors as $value) {
        echo $value;
      }
      echo '</center>';
    }else{
      // armazenar data de adição
      $data_adc = date("Y-m-d");
      array_splice($array, 5, 0, $data_adc);

      if(!isset($array['lba'])){
        $array['lba'] = 'off';
      }

      // fazer a limpeza de xss
      $cleaned = clear($array);

      array_splice($cleaned, 4, 0, array_pop($cleaned));

      var_dump($cleaned);


    }

  }
