<?php

  // importar conexão com banco de dados
  require_once '../model/bd_connect.php';
  // importar limpeza de input
  require_once '../controller/clear_input.php';
  // importar arquivo de funções de bd
  require_once '../model/bd_functions.php';

  // limpar input
  $search = clear($_GET['search']);
  if(empty($search)){
    header('Location:../index.php');
  }

  // definir pesquisa no bd
  $values = array('*','livros','titulo','LIKE',"%$search%","");
  // aramazenar resultado da pesquisa em uma variável
  $resultado = busca($values);
  // verificar se tem pelo menos algum resutado
  if(mysqli_num_rows($resultado) > 0){
    // armazenar cada resultado em um array
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
      // definar variáveis para cada item do livro
      $id = $row['id'];
      $autor = $row['autor'];
      $titulo = $row['titulo'];
      $ano_pub = $row['ano_pub'];
      $lba = $row['lba'];
      $tipo = $row['tipo'];
      // adicionar o card do livro atual
      require_once 'modules/card.php';
    }

  }else{
    // se $resultado estiver vazio
    echo "Nenhum livro encontrado! <br> Tente usar outras palavras chave.";
  }

  // fechar conexão com bd
  mysqli_close($connect);

 ?>
