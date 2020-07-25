<?php
  // iniciar sessão
  session_start();
  // importar permissões
  require_once '../Controller/Permissions.php';
  nivel_4();
  // importar limite de sessão
  require_once '../Controller/Session.php';
  // importar head
  require_once 'Modules/Head.php';
  // importar autoload
  require_once '../../vendor/autoload.php';
  // importar controller usuario
  require_once '../Controller/CrudLivro.php';

?>

  </head>
  <body>

    <?php require_once 'Modules/Navbar.php'; ?>

    <!-- title -->
    <center> <a id="title">Cadastrar Livro</a> </center>

    <?php
    // se existir o post do botão ele chama a função criar
    if(isset($_POST['btn_cadastro'])){
      create($_POST);
    }
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
            <input name="lba" type="checkbox" class="custom-control-input" id="lba">
            <label class="custom-control-label" for="lba">LBA</label>
          </div>
          <!-- btn submit -->
          <button value='livro' name="btn_cadastro" id="btn_cadastro" type="submit">Cadastrar</button>
        </center>

      </div>
    </form>

    <?php require_once 'Modules/Footer.php' ?>
    <!-- mask js -->
    <script src="../../vendor/jquery/jquery.mask.js"></script>
    <script src="Modules/MaskLivro.js"></script>

  </body>
</html>
