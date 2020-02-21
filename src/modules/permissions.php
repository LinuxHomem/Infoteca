<?php

  require_once 'modules/bd_connect.php';
  if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $dados = mysqli_fetch_array(mysqli_query($connect,$sql));
    global $dados;

    function cadastro(){
        if($GLOBALS['dados']["distincao"] != 1){
          header('Location:index.php');
        }
      }

    function emprestimo(){
      if($GLOBALS['dados']["distincao"] == 5){
        // BLOQUEAR EMPRESTIMO
      }
    }

    function devolucao(){
      for($count=3;$count<5;$count++){
        if($GLOBALS['dados']["distincao"] == $count){
          // BLOQUEAR DEVOLUÇÃO
        }
      }
    }

    function livro(){
      if($GLOBALS['dados']["distincao"] != 1){
        // BLOQUEAR ADIÇÃO/SUBTRAÇÃO DE LIVROS
      }
    }

  }else{
    header('Location:index.php');
  }



 ?>
