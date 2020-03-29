<?php
  // se existir um id na sessão prosseguir
  if(isset($_SESSION['id'])){

    function bibliotecario(){
      // se distinção for diferente de bibliotecario retornar ao index
      if(definir() != 1){
        header('Location: index.php');
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
    header('Location: index.php');
  }
