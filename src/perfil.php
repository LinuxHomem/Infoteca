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
		<!-- global css -->
		<link rel="stylesheet" href="global.css">
    <!-- personal css -->
    <link rel="stylesheet" href="cadastro.css">

  </head>
  <body>

    <?php
    // importar modulo de perfil
    require_once 'modules/perfil.php';
    // importar modulo de conexao com o banco de dados
    require_once 'modules/bd_connect.php';
    // importar navbar
    require_once 'modules/navbar.php';
    ?>



    <!-- import js -->
    <!-- popper js -->
    <script src="../vendor/popper/popper.js"></script>
    <!-- bootstrap js -->
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
    <!-- mask js -->
    <script src="../vendor/jquery/jquery.mask.js"></script>
    <script src="modules/mask.js"></script>

  </body>
</html>
