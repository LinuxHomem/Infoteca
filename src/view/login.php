<?php
// importar head
require_once 'modules/head.php'
?>
    <!-- personal css -->
    <link rel="stylesheet" href="login.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';
    // importar modulo de login
    require_once '../controller/login.php';
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

    <?php require_once 'modules/footer.php' ?>

  </body>
</html>
