<?php

  require_once 'modules/bd_connect.php';
  if(isset($_SESSION['id'])){

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $dados = mysqli_fetch_array(mysqli_query($connect,$sql));
    global $dados;
    function cadastro(){
      for($count=2;$count<5;$count++){
        if($GLOBALS['dados']["distincao"] == $count){
          header('Location:index.php');
        }
      }
    }
  }else{
    header('Location:index.php');
  }



 ?>
