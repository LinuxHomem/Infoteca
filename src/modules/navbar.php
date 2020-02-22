<?php

  // verificar se já está logado para aterar função do botão login
  if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
    $title = 'Sair';
    $action = 'onclick=\'window.location.href = "modules/logout.php"\'';
    $disable = 'visible';
  }else{
    $title = 'Entrar';
    $action = 'onclick=\'window.location.href = "login.php"\'';
    $disable = 'invisible';
  }
 ?>

<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- navbar logo -->
  <a class="navbar-brand" href="">Logo</a>
  <!-- collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- inicio btn -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
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
    <a class="mr-2 <?php echo $disable ?>" style="color:#ffffff"> Logado como: <?php echo $_SESSION['login']; ?></a>
    <button class="btn btn-outline-light my-2 my-sm-0 mr-2 <?php echo $disable ?>" onclick='window.location.href = "perfil.php"';>Perfil</button>
    <button class="btn btn-outline-danger my-2 my-sm-0" <?php echo $action; ?>><?php echo $title; ?></button>
  </div>

</nav>
