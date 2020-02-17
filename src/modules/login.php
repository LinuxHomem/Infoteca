<?php

// verificar se já esta logado
if(isset($_SESSION['logado']) and $_SESSION['logado'] == true):
  header('location:index.php');
endif;

// verificar se o botão foi pressionado e armazenar o login e senha
if(isset($_POST['btn_enter'])):
  $erros = array();
  $login = mysqli_escape_string($connect,$_POST['login']);
  $senha = mysqli_escape_string($connect,$_POST['senha']);

// verificar se algum dos campos está vazio
  if(empty($login) or empty($senha)):
    $erros[] = "<li>Preencha todos os campos!</li>";
  endif;

// fazer verificação no banco de dados
  $sql = "SELECT login FROM usuarios WHERE login = '$login'";
  $resultado = mysqli_query($connect,$sql);

//ver se retornou algum resultado buscando o login e caso sim, fazer busca pelo usuario e senha
  if(mysqli_num_rows($resultado) > 0):
    $senha = md5($senha);
    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $resultado = mysqli_query($connect,$sql);
    mysqli_close($connect);

// se retornar somente um resultaado ele permite a conexão e abre a sessão
    if(mysqli_num_rows($resultado) == 1):
      $dados = mysqli_fetch_array($resultado);
      $_SESSION['logado'] = true;
      $_SESSION['id_usuario'] = $dados['id'];
      $_SESSION['login'] = $dados['login'];
      header('Location:index.php');
    else:
      if(!empty($login) and !empty($senha)):
        $erros[] = "<li>Senha Incorreta!</li>";
      endif;
    endif;
  else:
    if(!empty($login) and !empty($senha)):
      $erros[] = "<li>Usuário Incorreto!</li>";
    endif;
  endif;
endif;

// exibe os erros durante o login
  if(!empty($erros)):
    foreach ($erros as $key => $value):
      echo $value;
    endforeach;
  endif;

?>
