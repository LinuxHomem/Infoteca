<?php

  // verificar se já está logado para aterar função do botão login
  if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
    $title = 'Sair';
    $perfil = 'visible';
    $login = $_SESSION['login'];
    $action = 'onclick=\'window.location.href = "../Controller/Logout.php"\'';
  }else{
    $title = 'Entrar';
    $perfil = 'invisible';
    $login = '';
    $action = 'onclick=\'window.location.href = "Login.php"\'';
  }

  if(isset($_SESSION['distincao']) and $_SESSION['distincao'] == 1){
    $tag = 'div class="mr-2 dropdown';
    $init = '<button class="my-2 my-sm-0 mr-2 btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

    $rest = '</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="
    CadastroUsuario.php">Cadastro Usuários</a><a class="dropdown-item" href="CadastroLivro.php">Cadastro Livros</a>
    </div></div>';

  }else{
    $init = '';
    $tag = 'a class="mr-2';
    $rest = '</a>';
  }

  $action_perfil = 'onclick=\'window.location.href = "Perfil.php"\''
 ?>

<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- navbar logo -->
  <a class="navbar-brand" href="Index.php">Logo</a>

  <!-- collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- inicio btn -->
      <li class="nav-item active">
        <a class="nav-link" href="Index.php">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <!-- catalogo btn -->
      <li class="nav-item">
        <a class="nav-link active" href="">Catálogo</a>
      </li>
      <!-- sobre btn -->
      <li class="nav-item">
        <a class="nav-link active" href="" tabindex="-1" aria-disabled="true">Sobre</a>
      </li>
      <!-- login/logout btn and 'logged as' -->
    </ul>

    <<?php echo $tag ?> <?php echo $perfil ?>" style="color:#ffffff"> <?php echo $init; ?> Logado como: <?php echo $login . $rest;?>

    <button class="btn btn-outline-light my-2 my-sm-0 mr-2 <?php echo $perfil ?>" <?php echo $action_perfil ?>>Perfil</button>
    <button class="btn btn-outline-danger my-2 my-sm-0" <?php echo $action; ?>><?php echo $title; ?></button>
  </div>

</nav>
