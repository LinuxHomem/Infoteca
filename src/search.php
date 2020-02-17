<!DOCTYPE html>
<html lang="pt=br">
  <head>

        <meta charset="utf-8">
        <title>Infoteca - Pesquisa </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
    		// iniciar sessao
    		session_start();?>

        <!-- import css -->
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css">
        <!-- global css -->
        <link rel="stylesheet" href="global.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';
    // importar modulo de conexao com o banco de dados
    require_once 'modules/bd_connect.php';
    // importar modulo de pesquisa
    require_once 'modules/search.php';
    ?>

    <!-- import js -->
    <!-- jquery js -->
    <script src="../vendor/jquery/3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>

  </body>
</html>
