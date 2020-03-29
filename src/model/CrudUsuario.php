<?php
  namespace Src\Model;

  class CrudUsuario{
    // criar usuário
    public function create($array){
      // criar sql a ser preparado para verificação de sql injection
      $sql = "INSERT INTO `infoteca`.`usuarios` VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      // alterar as lacunas pelos valores recebidos do POST
      $count = 1;
      foreach ($array as $value) {
        $stmt->bindValue($count,$value);
        $count++;
      }

      // executar cadastro
      if($stmt->execute() === false){
        echo '<script>alert("Erro ao cadastrar Usuário.\nTente verificar se as credenciais já não estão cadastradas")</script>';
      }else{
        echo '<script>alert("Usuário Cadastrado")</script>';
      }
    }

    // buscar usuário
    public function read($array){
      // criar sql a ser preparado para verificação de sql injection
      $sql = "SELECT * FROM `infoteca` . `usuarios` WHERE $array[0]";
      $stmt = Conexao::getConn()->prepare($sql);

      // excluir verificação a ser feita e manter os valores
      array_shift($array);

      // alterar as lacunas pelos valores
      $count = 1;
      foreach ($array as $value) {
        $stmt->bindValue($count,$array[$count - 1]);
        $count++;
      }

      // executar a busca e retornar número de linhas e os resultados da busca
      $stmt->execute();
      return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function update(){

    }

    public function delete(){

    }
  }
