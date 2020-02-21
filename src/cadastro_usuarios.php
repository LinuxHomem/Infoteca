<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
		<title>Infoteca - Cadastro de Usuários</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
		// iniciar sessao
		session_start();
		?>

		<!-- import css -->
		<!-- bootstrap css -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
    <!-- personal css -->
    <link rel="stylesheet" href="cadastro.css">
    <!-- global css -->
    <link rel="stylesheet" href="global.css">

  </head>
  <body>

    <?php
    // importar modulo de permissão
    require_once 'modules/permissions.php';
    // importar modulo de conexao com o banco de dados
    require_once 'modules/bd_connect.php';
    // importar navbar
    require_once 'modules/navbar.php';
    // verificar permissão
    require_once 'modules/permissions.php';
    cadastro();
    ?>

    <!-- title -->
    <center>
      <a id="title">Cadastrar Usuário</a>
    </center>
    <?php // importar modulo de cadastro
    if(isset($_POST['btn_cadastro'])){
      require_once 'modules/cadastro.php';
    } ?>
    <!-- formulário cadastrar -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container w-50 p-3" style="background-color: rgba(0,0,0,0.3)">

        <!-- input nome -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Nome Completo</span>
          </div>
          <input name="nome" required type="text" class="form-control" placeholder="Ex.: Ronildo Aparecido Ferreira">
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
              <select name="distincao" class="custom-select" id="distincao" required>
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

        <!-- input curso -->
        <div class="row">
          <div class="col-sm">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="curso">Curso</label>
              </div>
              <select name="curso" class="custom-select" id="curso" required>
                <option value="">Escolha...</option>
                <option value="1">Desenvolvimento de Sistemas</option>
                <option value="2">Desgin de Interiores</option>
                <option value="3">Edificações</option>
                <option value="4">Informática Para Internet</option>
                <option value="5">Logística</option>
              </select>
            </div>
          </div>

          <!-- input série -->
          <div class="col-sm">
            <div class="input-group mb-3">
              <select name="serie" class="custom-select" id="serie" required>
                <option value="">Escolha...</option>
                <option value="1">1°Ano</option>
                <option value="2">2°Ano</option>
                <option value="3">3°Ano</option>
              </select>
              <div class="input-group-append">
                <label class="input-group-text" for="serie">Série</label>
              </div>
            </div>
          </div>
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
              <input id="data_nasc" name="data_nasc" required type="text" class="form-control" placeholder="Ex.: 24-12-2003">
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
          <button name="btn_cadastro" style="font-size:20px;"id="btn_search" type="submit" class="btn btn-danger">Cadastrar</button>
        </center>

      </div>
    </form>


    <!-- import js -->
    <!-- jquery js -->
    <script src="../vendor/jquery/3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
    <!-- mask js -->
    <script src="../vendor/jquery/jquery.mask.js"></script>
    <script src="modules/mask.js"></script>

  </body>
</html>
