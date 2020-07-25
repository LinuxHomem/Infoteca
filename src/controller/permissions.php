<?php
  if(isset($_SESSION['logado'])){
    // armazenar distinção em uma variável

    function nivel_4(){
      // se distinção for diferente de bibliotecario retornar ao index
      if($_SESSION['distincao'] != 1){
        header('Location: index.php');
      }
    }

    function nivel_3(){
      if($GLOBALS['dados']["distincao"] == 5){
        // BLOQUEAR EMPRESTIMO
      }
    }

    function nivel_2(){
      for($count=3;$count<5;$count++){
        if($GLOBALS['dados']["distincao"] == $count){
          // BLOQUEAR DEVOLUÇÃO
        }
      }
    }

    function nivel_1(){
      if($GLOBALS['dados']["distincao"] != 1){
        // BLOQUEAR ADIÇÃO/SUBTRAÇÃO DE LIVROS
      }
    }

  }else{
    header('Location: index.php');
  }
