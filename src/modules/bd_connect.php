<?php
  // conexao com banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "usbw";
  $db_name = "infoteca";

  $connect = mysqli_connect($servername,$username,$password,$db_name);

  // conexão em UTF-8
  mysqli_set_charset($connect, "utf8");
 ?>
