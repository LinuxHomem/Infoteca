<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="test.php" method="post">
      <input type="text" name="login">
      <input type="text" name="senha">
      <button type="submit" name="button">Vai</button>
    </form>
    <?php
    session_start();
    require_once '../vendor/autoload.php';
    require_once 'Controller/CrudUsuario.php';

    if(isset($_POST['button'])){
      echo login($_POST);
    }
    ?>
  </body>
</html>
