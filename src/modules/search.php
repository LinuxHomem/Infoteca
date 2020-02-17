<?php

  $search = mysqli_escape_string($connect,$_GET['search']);
  $sql = "SELECT * FROM livros WHERE titulo LIKE '%$search%'";
  $resultado = mysqli_query($connect,$sql);

  if(mysqli_num_rows($resultado) > 0):
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)):
      echo '<ol>';
      foreach ($row as $key => $value):
        echo "<li>" . $key . " -> " . $value . "</li> <br>";
      endforeach;
    endwhile;
  else:
    echo "Nenhum livro encontrado! <br> Tente usar outras palavras chave.";
  endif;


 ?>
