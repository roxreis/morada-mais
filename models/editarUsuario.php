<?php include_once('db/conPDO.php'); 

// PEGA AS INFORMAÇOES DO BANCO
$idUsuario= $_POST['id'];
$ok = isset($idUsuario) ? $idUsuario : false;


if ($ok) {
    // $sql = "SELECT * FROM usuario WHERE id_user = '$idUsuario'";
    $statement = $connect->prepare("SELECT * FROM usuario WHERE id_user = '$idUsuario'");
    $resultado = $statement->execute();
    
} 

// FIM

if (isset($_POST['Editar'])) {

    $editar = $_POST['Editar'];
}

if (isset($editar)) {
   
    $email = $_POST['email'];
    if ($email === 'user_email') {

        $email == "";

    } else {
       $email = $_POST['email'];
    }
    $ativo = $_POST['ativo']; 


    // $update = "UPDATE usuario SET user_email='$email', user_ativo='$ativo' WHERE id_user=$idUsuario";
    $statement = $connect->prepare("UPDATE usuario SET user_email='$email', user_ativo='$ativo' WHERE id_user=$idUsuario");
    $statement->execute();

    if ($statement->execute()) {

        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/pagina-adm.php'</script>";
    } 
}

?>

