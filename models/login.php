
<?php 
   include_once('db/conPDO.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    echo "<script> alert('Favor preencher login e senha!')</script>";
    echo "<script> window.location.href='/morada-mais/views/form-login.php'</script>";
      exit;
  }
  $email = $_POST['email'];
  $senha = SHA1($_POST['senha']);


if($_POST['who'] == 1)
{


  $query ="SELECT `id_user`, `first_name`, `user_nivel`, `user_email` FROM `usuario` WHERE (`user_email` = '".$email ."') AND (`user_pass` = '". $senha ."') AND (`user_ativo` = 1) LIMIT 1"; 
 
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':user_email' => $_POST["email"]
     )
     
  );

  $count = $statement->rowCount();

  if ( $count != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "<script> alert('Login ou senha incorretos ou cadastro inativo!')</script>";
    echo "<script> window.location.href='/morada-mais/views/form-login.php'</script>";
    exit;

} else {
      // Salva os dados encontados na variável $resultado
   
   $results = $statement->fetchAll(PDO::FETCH_OBJ);
    
   foreach($results as $r) {
   
    
        // $resultado2 = mysqli_fetch_assoc($queryAdmin);
            // A sessão precisa ser iniciada em cada página diferente
        if (!isset($_SESSION)) session_start();

            // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $r->id_user;
        $_SESSION['UsuarioNome'] = $r->first_name;
        $_SESSION['UsuarioNivel'] = $r->user_nivel;
        //   $_SESSION['UsuarioImagem'] = $resultado['user_img'];
    }
      $nivel_necessario = 2;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {

          // Redireciona o visitante de volta pro login
          echo "<script> alert('Login efetuado com sucesso!')</script>";
          echo "<script> window.location.href='/morada-mais/views/feed.php'</script>";
          exit;

  } else {

      // Redireciona o visitante
      echo "<script> alert('Login efetuado com sucesso!')</script>";
      echo "<script> window.location.href='/morada-mais/views/pagina-adm.php'</script>";
      exit;
  }
}
   
  } else {

// $sql2 = "SELECT `id_admin`, `nome`, `admin_email`, `nivel` FROM `admin` WHERE (`admin_email` = '".$email ."') AND (`admin_pass` = '". $senha ."') LIMIT 1";

$statement2 = $connect->prepare("SELECT `id_admin`, `nome`, `admin_email`, `nivel` FROM `admin` WHERE (`admin_email` = '".$email ."') AND (`admin_pass` = '". $senha ."') LIMIT 1");
$statement2->execute();

// $queryAdmin = $con->query($sql2);

if ($statement2->rowCount() != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "<script> alert('Login ou senha incorretos ou cadastro inativo!')</script>";
    echo "<script> window.location.href='/morada-mais/views/form-login.php'</script>";
    exit;

} else {
      // Salva os dados encontados na variável $resultado
      $results = $statement->fetchAll(PDO::FETCH_OBJ);
     
      foreach($results as $r) {
      // $resultado2 = mysqli_fetch_assoc($queryAdmin);
          // A sessão precisa ser iniciada em cada página diferente
        if (!isset($_SESSION)) session_start();

            // Salva os dados encontrados na sessão
        $_SESSION['UsuarioID'] = $$r->id_admin;
        $_SESSION['UsuarioNome'] = $$r->nome;
        $_SESSION['UsuarioNivel'] = $$r->nivel;
      }
      $nivel_necessario = 2;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {

          // Redireciona o visitante de volta pro login
          header("Location: /morada-mais/index.php"); exit;

  } else {

      // Redireciona o visitante
      header("Location: /morada-mais/views/pagina-adm.php"); exit;
  }
}



  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {

        $_SESSION['UsuarioID'] = $row['id_user'];
        $_SESSION['UsuarioNome'] = $row['first_name'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['id_user']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        echo "<script> alert('Login efetuado com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/feed.php'</script>";
        exit;
      }
    
    
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}