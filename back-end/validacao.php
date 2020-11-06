<?php

 include_once "db/conexao.php";

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    echo "<script> alert('Favor preencher login e senha!')</script>";
    echo "<script> window.location.href='/MORADA+/form-login.php'</script>";
      exit;
  }


  $email = $_POST['email'];
  $senha = SHA1($_POST['senha']);

//   var_dump($senha);

if ($_POST['who'] == 1) {

    $sql1 = "SELECT `user_id`, `first_name`, `user_nivel`, `user_email` FROM `usuarios` WHERE (`user_email` = '".$email ."') AND (`user_pass` = '". $senha ."') AND (`user_ativo` = 1) LIMIT 1";
    $queryUser = $con->query($sql1);

    // var_dump($sql1);
    // exit;


    if (mysqli_num_rows($queryUser) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        echo "<script> alert('Login ou senha incorretos ou cadastro inativo!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";
        exit;
  
    } else {
          // Salva os dados encontados na variável $resultado
          $resultado = mysqli_fetch_assoc($queryUser);
          // $resultado2 = mysqli_fetch_assoc($queryAdmin);
              // A sessão precisa ser iniciada em cada página diferente
         if (!isset($_SESSION)) session_start();

              // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resultado['user_id'];
          $_SESSION['UsuarioNome'] = $resultado['first_name'];
          $_SESSION['UsuarioNivel'] = $resultado['user_nivel'];
        //   $_SESSION['UsuarioImagem'] = $resultado['user_img'];
  
          $nivel_necessario = 2;
          // Verifica se não há a variável da sessão que identifica o usuário
          if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
  
              // Redireciona o visitante de volta pro login
              echo "<script> alert('Login efetuado com sucesso!')</script>";
              echo "<script> window.location.href='/MORADA+/index.php'</script>";
              exit;
  
      } else {
  
          // Redireciona o visitante
          echo "<script> alert('Login efetuado com sucesso!')</script>";
          echo "<script> window.location.href='/MORADA+/pagina-adm.php'</script>";
          exit;
      }
    }
       
} else {

    $sql2 = "SELECT `id_admin`, `nome`, `admin_email`, `nivel` FROM `admin` WHERE (`admin_email` = '".$email ."') AND (`admin_pass` = '". $senha ."') LIMIT 1";

    $queryAdmin = $con->query($sql2);

    if (mysqli_num_rows($queryAdmin) != 1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        echo "<script> alert('Login ou senha incorretos ou cadastro inativo!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";
        exit;
  
    } else {
          // Salva os dados encontados na variável $resultado
          $resultado = mysqli_fetch_assoc($queryAdmin);
          // $resultado2 = mysqli_fetch_assoc($queryAdmin);
              // A sessão precisa ser iniciada em cada página diferente
         if (!isset($_SESSION)) session_start();
  
              // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resultado['id_admin'];
          $_SESSION['UsuarioNome'] = $resultado['nome'];
          $_SESSION['UsuarioNivel'] = $resultado['nivel'];
  
          $nivel_necessario = 2;
          // Verifica se não há a variável da sessão que identifica o usuário
          if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
  
              // Redireciona o visitante de volta pro login
              header("Location: /MORADA+/index.php"); exit;
  
      } else {
  
          // Redireciona o visitante
          header("Location: /MORADA+/pagina-adm.php"); exit;
      }
    }

}

  // Validação do usuário/senha digitados



// var_dump($email);
// var_dump($senha);
// var_dump($sql1);
// var_dump($sql2);
// var_dump(mysqli_num_rows($queryUser));
// var_dump(mysqli_num_rows($queryAdmin));
// exit;


  

