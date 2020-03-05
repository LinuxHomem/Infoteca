<?php

  // importar conexão com banco de dados
  require_once '../model/bd_connect.php';
  // importar limpeza de input
  require_once '../controller/clear_input.php';
  // importar valores de cada cadastro
  require_once '../controller/cadastro_values.php';
  // importar arquivo de funções de bd
  require_once '../model/bd_functions.php';

  // criar array que armazenará os erros
  $erros = array();

  // definiar fuso-horário
  date_default_timezone_set("america/sao_paulo");

  // verificar qual é o tipo de cadastro para importar os valores/condições corretos
  if($_POST['cadastro'] == 'usuario'){
    $name = usuario_vars();
  }else{
    livro_vars();
  }

  // verificar se existe a varivel
  $count = 0;
  $ver = false;
  foreach($name as $value){
    if(!isset($_POST["$name[$count]"]) and $ver == false){
      $erros[] = '<li class="error">Algo está faltando...</li>';
      $ver = true;
    }
  }

  // se todas os post existirem ele continua e armazenar dados de cadastro em variáveis
  if($ver == false){
    foreach($name as $value){
      $$name[$count] = clear($_POST["$name[$count]"]);
      $count++;
    }

    // verificar qual é o tipo de cadastro para importar os valores/condições corretos
    if($_POST['cadastro'] == 'usuario'){
      usuario_conditions();
      usuario_bd();
    }else{
      livro_bd();
    }

    // chamar função de cadastro no banco de dados
    cadastro($into,$values,$alert);

    // exibe os erros durante o cadastro
    if(!empty($erros)){
      echo "<center>";
      foreach($erros as $key => $value){
        echo $value;
      }
      echo "</center>";
    }

  }else{
    // se todas os post não existirem ele interrompe o cadastro e mostra os erros
    echo "<center>";
    foreach ($erros as $value) {
      echo $value;
    }
    echo "</center>";
  }

  // fechar conexão com banco de dados
  mysqli_close($connect);

 ?>
