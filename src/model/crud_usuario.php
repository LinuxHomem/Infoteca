<?php
  namespace src\model;
  require_once 'conexao.php';

  class CrudUsuario{

    private function errors($array){
      $errors = array();

      // verificar se pelo menos o cpf ou rg foram preenchidos
      if(empty($array['cpf']) and empty($array['rg'])){
        $errors[] = '<li class="error">Adicione pelo menos RG ou CPF</li>';
      }

      // vereficar se login tem somente números e letras
      if(preg_match('/[^A-Za-z0-9]{5-30}/',$array['login'])){
        $errors[] = '<li class="error">Seu login só pode conter números e letras e deve conter no mínimo 5 caracteres e no máximo 30 caracteres</li>';
      }

      // verificar se a senha tem letra maiuscula
      if(!preg_match('/\p{Lu}/u',$array['senha'])){
        $errors[] = '<li class="error">Sua senha precisa ter pelo menos uma letra maiúscula</li>';
      }

      // verificar se a senha tem pelo menos um numero
      if(strlen($array['senha']) < 8 and strlen($array['senha']) > 30){
        $errors[] = '<li class="error">Sua senha deve conter no mínimo 8 caracteres e no máximo 30 caracteres</li>';
      }

      // verificar se a senha tem pelo menos um numero
      if(ctype_alpha($array['senha'])){
        $errors[] = '<li class="error">Sua senha precisa ter pelo menos um numero</li>';
      }
      return $errors;
    }

    private function clear($array){
      $array2 = array();
      foreach ($array as $key => $value) {
        $key = $value;
        $key = htmlspecialchars($key);
        $array2[] = "'$key'";
      }
      return $array2;
    }

    public function create($array){
      array_pop($array);
      $instance = new CrudUsuario();
      $errors = $instance->errors($array);

      if(!empty($errors)){
        echo '<center>';
        foreach ($errors as $value) {
          echo $value;
        }
        echo '</center>';

      }else{

        $array['senha'] = md5($array['senha']);
        $array['data_nasc'] = substr($array['data_nasc'],6,4) . "-" . substr($array['data_nasc'],3,2) . "-" . substr($array['data_nasc'],0,2);
        $data_adc = date("Y-m-d");

        if($array['distincao'] != '3'){
          array_splice($array, 8, 0, '0');
          array_splice($array, 9, 0, '0');
          array_splice($array, 12, 0, $data_adc);
        }

        $return = $instance->clear($array);

        $values = implode(",",$return);

        $sql = "INSERT INTO `infoteca`.`usuarios` VALUES (NULL,$values)";
        $stmt = Conexao::getConn()->prepare($sql);
        if($stmt->execute() === false){
          echo '<script>alert("Erro ao cadastrar Usuário.\nTente verificar se as credenciais já não estão cadastradas")</script>';
        }else{
          echo '<script>alert("Usuário Cadastrado")</script>';
        }
      }
    }

    public function read($array){


    }

    public function update(){

    }

    public function delete(){

    }
  }


 ?>
