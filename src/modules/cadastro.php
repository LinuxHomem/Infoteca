<?php
  date_default_timezone_set("america/sao_paulo");

  $nome = mysqli_escape_string($connect,$_POST['nome']);
  $login = mysqli_escape_string($connect,$_POST['login']);
  $senha = mysqli_escape_string($connect,$_POST['senha']);
  $email = mysqli_escape_string($connect,$_POST['email']);
  $cpf = mysqli_escape_string($connect,$_POST['cpf']);
  $rg = mysqli_escape_string($connect,$_POST['rg']);
  $sexo = mysqli_escape_string($connect,$_POST['sexo']);
  $distincao = mysqli_escape_string($connect,$_POST['distincao']);
  $curso = mysqli_escape_string($connect,$_POST['curso']);
  $serie = mysqli_escape_string($connect,$_POST['serie']);
  $data_nasc = mysqli_escape_string($connect,$_POST['data_nasc']);
  $telefone = mysqli_escape_string($connect,$_POST['telefone']);
  $celular = mysqli_escape_string($connect,$_POST['celular']);
  $turno = mysqli_escape_string($connect,$_POST['login']);
  $data_adc = date("Y") . "-" . date("m") . "-" . date("d");

  $sql = "INSERT INTO usuarios (`id`, `senha`, `nome`, `email`, `cpf`, `rg`, `sexo`, `data_nasc`, `data_adc`, `telefone`, `celular`, `serie`, `curso`, `distincao`, `turno`, `login`) VALUES (NULL, MD5('$senha'), '$nome', '$email', '$cpf', '$rg', '$sexo', '$data_nasc', '$data_adc', '$telefone', '$celular', '$serie', '$curso', '$distincao', '$turno', '$login');";

  if (mysqli_query($connect, $sql)):
      // PAG CADASTRADOS
  else:
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  endif;
  mysqli_close($connect);

 ?>
