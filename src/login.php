<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <title>Infoteca - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    // iniciar sessao
    session_start();?>

    <!-- import css -->
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
    <!-- global css -->
    <link rel="stylesheet" href="global.css">
    <!-- personal css -->
    <link rel="stylesheet" href="login.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';
    // importar modulo de conexao com o banco de dados
    require_once 'modules/bd_connect.php';
    // importar modulo de login
    require_once 'modules/login.php';
    ?>

    <!-- secao de login -->
    <div class="container w-50 mt-3">
      <center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <a>Login</a>
            <input type="text" class="form-control" name="login">
            <a>Senha</a>
            <input type="password" class="form-control" name="senha">
            <small>Jamais compartilhe sua senha.</small>
          </div>
          <button id="btn_enter" type="submit" name="btn_enter" class="btn btn-danger">Entrar</button>
        </form>
      </center>
    </div>

    <!-- import js -->
    <!-- jquery js -->
    <script src="../vendor/jquery/3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>

  </body>
</html>
