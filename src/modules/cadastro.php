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

  // criar array que armazenará os erros
  $erros = array();

  // definiar fuso-horário
  date_default_timezone_set("america/sao_paulo");

  // verificar a distição para adição se curso e série e prevenir golpe via inspecionar
  if(!isset($_POST['curso']) and $_POST['distincao'] != 3){
    $_POST['curso'] = '';
    $_POST['serie'] = '';
  }else{
    $erros[] = '<li class="error">A distinção "Aluno" deve conter as informações de curso e de série</li>';
    $_POST['curso'] = '';
    $_POST['serie'] = '';
  }

  //verificar se existe a varivel e armazenar dados de cadastro em variáveis
  $name = array('nome','login','senha','email','cpf','rg','sexo','distincao','curso','serie','data_nasc','telefone','celular','turno');
  $count = 0;
  $ver = false;
  foreach($name as $value){
    if(!isset($_POST["$name[$count]"]) and $ver == false){
      $erros[] = '<li class="error">Algo está faltando...</li>';
      $ver = true;
    }
  }

  if($ver == false){
    foreach($name as $value){
      $$name[$count] = clear($_POST["$name[$count]"]);
      $count++;
    }

    // armazenar data de adição
    $data_adc = date("Y-m-d");

    // converter data de nascimento para modelo americano
    $data_nasc = substr($data_nasc,6,4) . "-" . substr($data_nasc,3,2) . "-" . substr($data_nasc,0,2);

    // verificar se pelo menos o cpf ou rg foram preenchidos
    if(empty($cpf) and empty($rg)){
      $erros[] = '<li class="error">Adicione pelo menos RG ou CPF</li>';
    }

    // verificar se rg ou cpf foi selecionado para verificação de bd
    if(!empty($cpf)){
      $cred1 = 'cpf';
      $cred2 = 'CPF';
      $cred3 = $cpf;
    }else{
      $cred1 = 'rg';
      $cred2 = 'RG';
      $cred3 = $rg;
    }

    // vereficar se login tem somente números e letras
    if(preg_match('/[^A-Za-z0-9]/',$login)){
      $erros[] = '<li class="error">Seu login só pode conter números e letras</li>';
    }

    // verificar tamanho do login
    if(strlen($login) < 5 or strlen($login) > 30){
      $erros[] = '<li class="error">Seu login deve conter no mínimo 5 caracteres e no máximo 30 caracteres</li>';
    }

    // verificar tamanho da senha
    if(strlen($senha) < 8 or strlen($login) > 30){
      $erros[] = '<li class="error">Sua senha deve conter no mínimo 8 caracteres e no máximo 30 caracteres</li>';
    }
    // verificar se a senha tem letra maiuscula
    if(!preg_match('/\p{Lu}/u', $senha)){
      $erros[] = '<li class="error">Sua senha precisa ter pelo menos uma letra maiúscula</li>';
    }

    // verificar se a senha tem pelo menos um numero
    if(ctype_alpha($senha)){
      $erros[] = '<li class="error">Sua senha precisa ter pelo menos um numero</li>';
    }

    // verificar se o login/email/cpf/rg já foi cadastrado no bd
    $var1 = array('login','email',$cred1);
    $var2 = array('Login','Email',$cred2);
    $var3 = array($login,$email,$cred3);
    $full = 0;

    foreach($var1 as $value){
      $sql = "SELECT $value FROM usuarios WHERE $value = '$var3[$full]'";
      if(mysqli_num_rows(mysqli_query($connect,$sql)) > 0){
        $erros[] = "<li class='error'>O $var2[$full] informado já está em uso</li>";
      }
      $full += 1;
    }

    // verificar se tem erros / se não -> registrar no banco de dados
    if(!empty($erros)){
      echo "<center>";
      foreach ($erros as $value) {
        echo $value;
      }
      echo "</center>";
    }else{
      $sql = "INSERT INTO usuarios (`id`, `senha`, `nome`, `email`, `cpf`, `rg`, `sexo`, `data_nasc`, `data_adc`, `telefone`, `celular`, `serie`, `curso`, `distincao`, `turno`, `login`) VALUES (NULL, MD5('$senha'), '$nome', '$email', '$cpf', '$rg', '$sexo', '$data_nasc', '$data_adc', '$telefone', '$celular', '$serie', '$curso', '$distincao', '$turno', '$login');";
      if (mysqli_query($connect, $sql)){
        echo "<script type='text/javascript'>alert('Usuário Cadastrado!')</script>";
      }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
      }
    }

    mysqli_close($connect);

  }else{
    if(!empty($erros)){
      echo "<center>";
      foreach ($erros as $value) {
        echo $value;
      }
      echo "</center>";
    }
  }



 ?>
