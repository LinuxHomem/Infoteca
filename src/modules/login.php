<?php

  // verificar se já esta logado
  if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
    header('location:index.php');
  }

  // verificar se o botão foi pressionado e armazenar o login e senha
  if(isset($_POST['btn_enter'])){
    $erros = array();
    $login = mysqli_escape_string($connect,$_POST['login']);
    $senha = mysqli_escape_string($connect,$_POST['senha']);


  // verificar se algum dos campos está vazio
    if(empty($login) or empty($senha)){
      $erros[] = "<li class='error'>Preencha todos os campos!</li>";
    }

    $sql = "SELECT login FROM usuarios WHERE login = '$login'";

    if(mysqli_num_rows(mysqli_query($connect,$sql)) > 0){
      $senha = md5($senha);
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
      $return = mysqli_query($connect,$sql);

      if(mysqli_num_rows($return) == 1){
        $dados = mysqli_fetch_array($return);
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $dados['id'];
        $_SESSION['login'] = $dados['login'];
        header('Location:index.php');
      }elseif(!empty($login) and !empty($senha)){
        $erros[] = "<li class='error'>Senha Incorreta!</li>";
      }
    }else{
      if(!empty($login) and !empty($senha)){
        $erros[] = "<li class='error'>Usuário Incorreto!</li>";
      }
    }
  }

  // exibe os erros durante o login
  if(!empty($erros)){
    echo "<center>";
    foreach($erros as $key => $value){
      echo $value;
    }
    echo "</center>";
  }

  mysqli_close($connect);
?>
