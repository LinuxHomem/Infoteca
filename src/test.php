

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

      require 'model/crud_usuario.php';

      if(isset($_POST['btn'])){

        $crud_user = new \src\model\CrudUsuario();
        $return = $crud_user->create($_POST);

        
      }

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      Nome <input type="text" name="input"> <br>
      Idade <input type="text" name="senha"> <br>
      Altura <input type="text" name="input2"> <br>
      <hr>
      <button type="submit" name="btn">Enviar</button>
    </form>

  </body>
</html>
