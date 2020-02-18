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

  // passar value do dropdown para string
  if($sexo == 1){
    $sexo = 'M';
  }else{
    $sexo = 'F';
  }

  // passar value do dropdown para string
  if($distincao == 1){
    $distincao = 'Bibliotecario';
  }elseif($distincao == 2){
    $distincao = 'Professor';
  }elseif($distincao == 3){
    $distincao = 'Aluno';
  }elseif($distincao == 4){
    $distincao = 'Funcionario';
  }else{
    $distincao = 'Externo';
  }

  // passar value do dropdown para string
  if($curso == 1){
    $curso = 'Desenvolvimento de Sistemas';
  }elseif($curso == 2){
    $curso = 'Desgin de Interiores';
  }elseif($curso == 3){
    $curso = 'Edificacoes';
  }elseif($curso == 4){
    $curso = 'Informatica Para Internet';
  }else{
    $curso = 'Logistica';
  }

  // passar value do dropdown para string
  if($serie == 1){
    $serie = '1Ano';
  }elseif($serie == 2){
    $serie = '2Ano';
  }else{
    $serie = '3Ano';
  }

  // passar value do dropdown para string
  if($turno == 1){
    $turno = 'Manha';
  }elseif($turno == 2){
    $turno = 'Tarde';
  }elseif($turno == 3){
    $turno = 'Noite';
  }elseif($turno == 4){
    $turno = 'Integral';
  }

  // verificar se pelo menos o cpf ou rg foram preenchidos
  if(empty($cpf) and empty($rg)){
    $erros[] = '<li>Adicione pelo menos RG ou CPF</li>';
  }

  // verificar se o email tem acento
  if(preg_match('/[^A-Za-z0-9@]/',$email)){
    $erros[] = '<li>Seu email não pode ter acento</li>';
  }

  // vereficar se login tem somente números e letras
  if(preg_match('/[^A-Za-z0-9]/',$login)){
    $erros[] = '<li>Seu login só pode conter números e letras</li>';
  }

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
