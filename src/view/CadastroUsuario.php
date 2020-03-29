<?php
  // iniciar sessão
  session_start();
  // importar head
  require_once 'Modules/Head.php';
  // importar autoload
  require_once '../../vendor/autoload.php';
  // importar controller usuario
  require_once '../Controller/CrudUsuario.php';
  // importar permissões
  require_once '../Controller/Permissions.php';
  bibliotecario();
?>
    <!-- personal css -->
    <link rel="stylesheet" href="css/cadastro.css">

  </head>
  <body>

    <?php require_once 'Modules/Navbar.php'; ?>

    <!-- title -->
    <center> <a id="title">Cadastrar Usuário</a> </center>

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
            <span class="input-group-text">Nome Completo</span>
          </div>
          <input name="nome" required type="text" class="form-control" placeholder="Ex.: Ronildo Aparecido Ferreira" autofocus>
        </div>

        <!-- input login -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Login</span>
              </div>
              <input name="login" required type="text" class="form-control" placeholder="Ex.: Ronildo123">
            </div>
          </div>

          <!-- input senha -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <input name="senha" required type="password" class="form-control">
              <div class="input-group-append">
                <span class="input-group-text">Senha</span>
              </div>
            </div>
          </div>
        </div>

        <!-- input email -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Email</span>
          </div>
          <input name="email" required type="email" class="form-control" placeholder="Ex.: ronildoaparecido@gmail.com">
        </div>

        <!-- input CPF -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">CPF</span>
              </div>
              <input id="cpf" name="cpf" type="text" class="form-control" placeholder="Ex.: 123.456.789-00">
            </div>
          </div>

          <!-- input RG -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <input id="rg" name="rg" type="text" class="form-control" placeholder="Ex.: 12.345.678-9">
              <div class="input-group-append">
                <span class="input-group-text">RG</span>
              </div>
            </div>
          </div>
        </div>

        <!-- input sexo -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="sexo">Sexo</label>
              </div>
              <select name="sexo" class="custom-select" id="sexo" required>
                <option value="">Escolha...</option>
                <option value="1">Masculino</option>
                <option value="2">Feminino</option>
              </select>
            </div>
          </div>

          <!-- input distinção -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <select onchange="if(this.selectedIndex)adc();" name="distincao" class="custom-select" id="distincao" required>
                <option value="">Escolha...</option>
                <option value="1">Bibliotecário</option>
                <option value="2">Professor</option>
                <option value="3">Aluno</option>
                <option value="4">Funcionário</option>
                <option value="5">Externo</option>
              </select>
              <div class="input-group-append">
                <label class="input-group-text" for="distincao">Distinção</label>
              </div>
            </div>
          </div>
        </div>

        <div id="aluno">

        </div>

        <!-- input turno -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="turno">Turno</label>
              </div>
              <select name="turno" class="custom-select" id="turno" required>
                <option value="">Escolha...</option>
                <option value="1">Manhã</option>
                <option value="2">Tarde</option>
                <option value="3">Noite</option>
                <option value="4">Integral</option>
              </select>
            </div>
          </div>

          <!-- input data de nascimento -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <input id="data_nasc" name="data_nasc" required type="text" class="form-control" placeholder="Ex.: 24/12/2003">
              <div class="input-group-append">
                <span class="input-group-text">Data de Nascimento</span>
              </div>
            </div>
          </div>
        </div>

        <!-- input telefone -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Telefone</span>
              </div>
              <input id="telefone" name="telefone" required type="text" class="form-control" placeholder="Ex.: (11)4564-4335">
            </div>
          </div>

          <!-- input celular -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <input id="celular" name="celular" required type="text" class="form-control" placeholder="Ex.: (11)99754-3345">
              <div class="input-group-append">
                <span class="input-group-text">Celular</span>
              </div>
            </div>
          </div>
        </div>

        <!-- btn submit -->
        <center>
          <button value="usuario" name="btn_cadastro" style="font-size:20px;"id="btn_search" type="submit" class="btn btn-danger">Cadastrar</button>
        </center>

      </div>
    </form>


    <?php require_once 'Modules/Footer.php' ?>
    <!-- mask js -->
    <script src="../../vendor/jquery/jquery.mask.js"></script>
    <script src="Modules/MaskUsuario.js"></script>
    <!-- aluno appnd js -->
    <script src="../Controller/AppendAluno.js" charset="utf-8"></script>

  </body>
</html>
