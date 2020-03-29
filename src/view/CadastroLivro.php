<?php
  // verificar se sessão expirou
  require_once '../controller/session.php';
  // importar head
  require_once 'modules/head.php'
?>

  </head>
  <body>

    <?php
    // importar modulo de permissão
    require_once '../controller/permissions.php';
    bibliotecario();
    // importar navbar
    require_once 'modules/navbar.php';
    ?>

    <!-- title -->
    <center>
      <a id="title">Cadastrar Livro</a>
    </center>

    <?php
    
    ?>

    <!-- formulário cadastrar -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container w-50 p-3" style="background-color: rgba(0,0,0,0.3)">

        <!-- input nome -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Título</span>
          </div>
          <input name="titulo" required type="text" class="form-control" placeholder="Ex.: O conde de Monte Cristo" autofocus>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Autor</span>
          </div>
          <input name="autor" required type="text" class="form-control" placeholder="Ex.: Alexandre Dumas">
        </div>

        <!-- input email -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Ano de Publicação</span>
          </div>
          <input id="ano_pub" name="ano_pub" required type="text" class="form-control" placeholder="Ex.: 1844">
        </div>

        <!-- input CPF -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Tipo</span>
          </div>
          <input name="tipo" required type="text" class="form-control" placeholder="Ex.: Drama">
        </div>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Sinopse</span>
          </div>
          <textarea name="sinopse" required type="text" class="form-control" placeholder="Descreva o livro..."></textarea>
        </div>

        <center>
          <div class="custom-control custom-checkbox">
            <input name="lba" type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">LBA</label>
          </div>
          <!-- btn submit -->
          <button value="livro" name="cadastro" id="btn_search" type="submit">Cadastrar</button>
        </center>

      </div>
    </form>

    <?php require_once 'modules/footer.php' ?>
    <!-- mask js -->
    <script src="../../vendor/jquery/jquery.mask.js"></script>
    <script src="modules/mask_livro.js"></script>

  </body>
</html>
