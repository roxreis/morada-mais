<?php 



include_once("db/conPDO.php");

$lembrete= $_POST['lembrete'];
$ok = isset($lembrete) ? $lembrete : false;


if ($ok) {
    // $sql = "SELECT * FROM usuario WHERE (`lembrete_senha` = '".$lembrete."')";
    $statement = $connect->prepare("SELECT * FROM usuario WHERE (`lembrete_senha` = '".$lembrete."')");
    $statement->execute();
    $queryUser = $PDO->query( $statement );


    
}



if ($queryUser->rowCount() != 1) {
 

    $id = $usuario['id_user'];

   echo "<script> alert('Sua frase de segurança confere! Redefina sua senha')</script>";
   echo "<script> window.location.href='/morada-mais/views/form-redefine-senha.php?id=$id'</script>";
 
  
} else {

    echo "<script> alert('Frase de segurança não confere!')</script>";
    echo "<script> window.location.href='/morada-mais/views/lembrete-senha.php'</script>";
  }
  

       