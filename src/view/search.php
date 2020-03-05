<?php
// verificar se sessão expirou
require_once '../controller/session.php';
// importar head
require_once 'modules/head.php'
?>
    <!-- personal css -->
    <link rel="stylesheet" href="search.css">

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';
    ?>

    <center><a style="font-size: 40px;" id="title">Resultados da Pesquisa: <?php echo $_GET['search']; ?></a></center>

    <div class="container w-75">
      <?php
      // importar modulo de pesquisa
      require_once '../controller/search.php';
        ?>
    </div>

    <?php require_once 'modules/footer.php' ?>

  </body>
</html>
