<?php

  //importar conexão com banco de dados
  require_once '../model/bd_connect.php';
  // importar limpeza de input
  require_once '../controller/clear_input.php';
  // importar arquivo de funções de bd
  require_once '../model/bd_functions.php';

  // verificar se já esta logado
  if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
    header('location:..index.php');
  }

  // verificar se o botão foi pressionado e armazenar o login e senha
  if(isset($_POST['btn_login'])){
    $erros = array();
    // limpar input
    $login = clear($_POST['login']);
    $senha = clear($_POST['senha']);
    // converter senha para md5
    $senha = md5($senha);

    // verificar se algum dos campos está vazio
    if(empty($login) or empty($senha)){
      $erros[] = "<li class='error'>Preencha todos os campos!</li>";
    }

    // definir pesquisa no bd
    $values = array('login','usuarios','login','=',$login,"");
    // verificar se o usuario existe
    if(mysqli_num_rows(busca($values)) == 1){

      // definir pesquisa no bd
      $values = array('*','usuarios','login','=',$login,"AND senha = '$senha'");
      // verificar se usuario existe e se senha confere para o usuário
      if(mysqli_num_rows(busca($values)) == 1){
        $dados = mysqli_fetch_array(busca($values));
        // registrar que o usuário está logado
        $_SESSION['logado'] = true;
        // armazenar id do usuário para exibir perfil
        $_SESSION['id'] = $dados['id'];
        // armazenar login do usuário para apresentar na navbar
        $_SESSION['login'] = $dados['login'];
        // armaenar a distinção do usuário para permissções
        $_SESSION['distincao'] = $dados['distincao'];

        // definir tempo limite de sessão para usuários diferentes de bibliotecários
        if($dados['distincao'] != 1){
          setcookie('session','session',time()+600);
        }

        // redirecionar para index
        header('Location:../index.php');

        // se usuário e senha não estiverem vazios e verificação de senha falhar
      }elseif(!empty($login) and !empty($senha)){
        $erros[] = "<li class='error'>Senha Incorreta!</li>";
      }
      // se usuário e senha não estiverem vazios e verificação de usuario falhar
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

  // fechar conexão com banco de dados
  mysqli_close($connect);

?>
