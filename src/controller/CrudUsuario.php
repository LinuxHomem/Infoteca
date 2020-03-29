<?php
  // create section

  // verificação de dados inválidos
  function errors($array){
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
  // verificação de dados inválidos

  // limpeza de xss
  function clear($array){
    $array2 = array();
    foreach ($array as $key => $value) {
      $key = $value;
      $key = htmlspecialchars($key);
      $array2[] = $key;
    }
    return $array2;
  }
  // limpeza de xss

  function create($array){
    // excluir o post do botão
    array_pop($array);

    // armazenar verificação de dados inválidos em um array
    $errors = errors($array);

    // se tiver algum erro ele exibe, se não ele prossegue com o cadastro
    if(!empty($errors)){
      echo '<center>';
      foreach ($errors as $value) {
        echo $value;
      }
      echo '</center>';
    }else{
      // se a distinção for = a aluno então registrar série e curso com 0
      if($array['distincao'] != '3'){
        array_splice($array, 8, 0, '0');
        array_splice($array, 9, 0, '0');
      }

      // passar a senha para md5, mudar estilo de data para internacional e gerar data de adição
      $array['senha'] = md5($array['senha']);
      $array['data_nasc'] = substr($array['data_nasc'],6,4) . "-" . substr($array['data_nasc'],3,2) . "-" . substr($array['data_nasc'],0,2);
      $data_adc = date("Y-m-d");
      array_splice($array, 12, 0, $data_adc);

      // fazer a limpeza de xss
      $clean = clear($array);

      // instanciar model do crud usuario
      $instance = new \Src\Model\CrudUsuario();
      $instance->create($clean);
    }
  }
  // create section



  // read section
  function login($array){
    // se algum dos campos estiver vazio ele retorna para preencher todos campos
    if(empty($_POST['login']) or empty($_POST['senha'])){
      return 'Preencha todos os campos';
    }

    // remove o post do botão
    array_pop($array);
    // armazena os posts em variáveis passando a senha para md5
    $login = $array['login'];
    $senha = md5($array['senha']);

    // armazena a verificação a ser feita e o valor
    $array = array('login = ?',$login);

    // instancia a verificação com o banco de dados e armazena consulta em um array
    $busca = new \Src\Model\CrudUsuario();
    $return = $busca->read($array);

    // se tiver pelo menos um resultado com o login válido ele prossegue, se não dá login incorreto
    if($return[0] > 0){
      // armazena a verificação a ser feita e os valores
      $array = array('login = ? AND senha = ?',$login,$senha);
      // armazena consulta em um array
      $return = $busca->read($array);

      // se tiver somente um resultado ele efetua login, se não dá senha incorreta
      if($return[0] == 1){
        // armazena fetchAll em um array
        $dados = $return[1][0];
        // registrar que o usuário está logado
        $_SESSION['logado'] = true;
        // armazenar id do usuário para exibir perfil
        $_SESSION['id'] = $dados['id'];
        // armazenar login do usuário para apresentar na navbar
        $_SESSION['login'] = $dados['login'];
        // armaenar a distinção do usuário para permissções
        $_SESSION['distincao'] = $dados['distincao'];

        // definir tempo limite de sessão para usuários diferentes de bibliotecários
        if($dados['distincao'] != 1){
          setcookie('session','session',time()+600);
        }
        // redirecionar para index
        header('Location: index.php');
      }else{
        return 'Senha Incorreta';
      }
    }else{
      return 'Login Incorreto';
    }
  }
