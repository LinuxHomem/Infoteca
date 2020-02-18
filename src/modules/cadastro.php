<?php
  // definiar fuso-horário
  date_default_timezone_set("america/sao_paulo");

  // armazenar dados de cadastro em variáveis
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

  $erros = array();

  // verificar se o email tem acento
  $ver_email = "[áàâãäªéèêëíìîïóòôõöºúùûüçñ]+";
  if(!preg_match("/" . $ver_email . "/i", $email)){
    $erros[] = '<li>Seu email não pode ter acento</li>';
  }

  // REVISÃO 
  if(!ctype_alpha($login) and !is_numeric($login)){
    $erros[] = '<li>Seu login só pode conter números e letras</li>';
  }
  // REVISÃO

  // verificar tamanho do login
  if(strlen($login) < 5 or strlen($login) > 30){
    $erros[] = '<li>Seu login deve conter no mínimo 5 caracteres e no máximo 30 caracteres</li>';
  }

  // verificar tamanho da senha
  if(strlen($senha) < 8 or strlen($login) > 30){
    $erros[] = '<li>Sua senha deve conter no mínimo 8 caracteres e no máximo 30 caracteres</li>';
  }
  // verificar se a senha tem letra maiuscula
  if(!preg_match('/\p{Lu}/u', $senha)){
    $erros[] = '<li>Sua senha precisa ter pelo menos uma letra maiúscula</li>';
  }

  // verificar se a senha tem pelo menos um numero
  if(ctype_alpha($senha)){
    $erros[] = '<li>Sua senha precisa ter pelo menos um numero</li>';
  }

  // verificar se tem erros
  if(!empty($erros)){
    echo "<center>";
    foreach ($erros as $value) {
      echo $value;
    }
    echo "</center>";
  }else{
    $sql = "INSERT INTO usuarios (`id`, `senha`, `nome`, `email`, `cpf`, `rg`, `sexo`, `data_nasc`, `data_adc`, `telefone`, `celular`, `serie`, `curso`, `distincao`, `turno`, `login`) VALUES (NULL, MD5('$senha'), '$nome', '$email', '$cpf', '$rg', '$sexo', '$data_nasc', '$data_adc', '$telefone', '$celular', '$serie', '$curso', '$distincao', '$turno', '$login');";
    if (mysqli_query($connect, $sql)){
      // PAG CADASTRADOS
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
  }

  mysqli_close($connect);

 ?>
