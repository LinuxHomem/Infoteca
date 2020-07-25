<?php
// verificar se sessão expirou
require_once '../controller/session.php';
// importar head
require_once 'modules/head.php';
session_start();
?>

  </head>
  <body>

    <?php
    // importar navbar
    require_once 'modules/navbar.php';

    echo $_SESSION['distincao'];
    ?>


    <?php require_once 'modules/footer.php' ?>

  </body>
</html>
