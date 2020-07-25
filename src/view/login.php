<?php
  // iniciar sessão
  session_start();
  // importar limite de sessão
  require_once '../Controller/Session.php';
  // importar head
  require_once 'Modules/Head.php';
  // importar autoload
  require_once '../../vendor/autoload.php';
  // importar crud do usuario
  require_once '../Controller/CrudUsuario.php';
?>
    <!-- personal css -->
    <link rel="stylesheet" href="css/login.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'Modules/Navbar.php';

    // importar modulo de cadastro
    if(isset($_POST['btn_login'])){
      echo login($_POST);
    }
    ?>

    <!-- secao de login -->
    <div class="container w-50 mt-3">
      <center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <a>Login</a>
            <input type="text" class="form-control" name="login" autofocus>
            <a>Senha</a>
            <input type="password" class="form-control" name="senha">
            <small>Jamais compartilhe sua senha.</small>
          </div>
          <button id="btn_enter" type="submit" name="btn_login" class="btn btn-danger">Entrar</button>
        </form>
      </center>
    </div>

    <?php require_once 'Modules/Footer.php' ?>

  </body>
</html>
