<?php

  // importar conexão com banco de dados
  require_once '../model/bd_connect.php';
  // importar arquivo de funções de bd
  require_once '../model/bd_functions.php';

  // se existir um id na sessão prosseguir
  if(isset($_SESSION['id'])){

    function definir(){
      // armazenar id da sessão em uma variável para consulta no bd
      $id = $_SESSION['id'];
      // definir pesquisa no bd
      $values = array('*','usuarios','id','=',$id,"");
      // armazenar dados retornados em uma variável
      $dados = mysqli_fetch_array(busca($values));
      // armazenar distinção retornado em uma variável
      $distincao = $dados['distincao'];
      return $distincao;
    }

    function bibliotecario(){
      // se distinção for diferente de bibliotecario retornar ao index
      if(definir() != 1){
        header('Location:..index.php');
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
