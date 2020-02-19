<?php
  // conexao com banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "usbw";
  $db_name = "infoteca";

  $connect = mysqli_connect($servername,$username,$password,$db_name);

  // Deixamdo conexão em UTF-8
  mysql_query("SET NAMES 'utf8'");
  mysql_query('SET character_set_connection=utf8');
  mysql_query('SET character_set_client=utf8');
  mysql_query('SET character_set_results=utf8');
 ?>
