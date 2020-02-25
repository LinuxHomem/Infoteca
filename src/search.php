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
        <!-- personal css -->
        <link rel="stylesheet" href="search.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';
    // importar modulo de conexao com o banco de dados
    require_once 'modules/bd_connect.php';
    ?>

    <center><a style="font-size: 40px;" id="title">Resultados da Pesquisa: <?php echo $_GET['search']; ?></a></center>

    <div class="container w-75">
      <?php
      // importar modulo de pesquisa
      require_once 'modules/search.php';
        ?>
    </div>

    <!-- import js -->
    <!-- bootstrap js -->
    <script src="../vendor/bootstrap/js/bootstrap.js"></script>
    <!-- popper js -->
    <script src="../vendor/popper/popper.js"></script>

  </body>
</html>
