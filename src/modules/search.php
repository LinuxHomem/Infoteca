<?php

  // proteger contra sql injection e xss
  function clear($input){
    global $connect;
    // verificar códigos sql
    $limpar = mysqli_escape_string($connect,$input);
    // verificar códigos html
    $limpar = htmlspecialchars($limpar);
    return $limpar;
  }

  $search = clear($_GET['search']);
  if(empty($search)){
    header('Location:index.php');
  }

  $sql = "SELECT * FROM livros WHERE titulo LIKE '%$search%'";
  $resultado = mysqli_query($connect,$sql);
  if(mysqli_num_rows($resultado) > 0):
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)):

      $id = $row['id'];
      $autor = $row['autor'];
      $titulo = $row['titulo'];
      $ano_pub = $row['ano_pub'];
      $lba = $row['lba'];
      $tipo = $row['tipo'];

      require 'modules/card.php';
    endwhile;
  else:
    echo "Nenhum livro encontrado! <br> Tente usar outras palavras chave.";
  endif;

  mysqli_close($connect);

 ?>
