
<?php 
   include_once('db/conPDO.php');

session_start();

$message = '';

// if(isset($_SESSION['user_id']))
// {
//  header('location:index.php');
// }

if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
    echo "<script> alert('Favor preencher login e senha!')</script>";
    echo "<script> window.location.href='/morada-mais/views/form-login.php'</script>";
      exit;
  }
  $email = $_POST['email'];
  $senha = SHA1($_POST['senha']);


if($_POST['who'] == 1)
{
//  $query = "
//    SELECT * FROM usuario 
//     WHERE username = :username
//  ";

$query ="SELECT `id_user`, `first_name`, `user_nivel`, `user_email` FROM `usuario` WHERE (`user_email` = '".$email ."') AND (`user_pass` = '". $senha ."') AND (`user_ativo` = 1) LIMIT 1"; 
 
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':user_email' => $_POST["email"]
     )
     
  );

  $count = $statement->rowCount();


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