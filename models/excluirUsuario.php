<?php include_once('db/conPDO.php'); 

$idUsuario= $_GET['id'];
$ok = isset($idUsuario) ? $idUsuario : false;


if ($ok) {
    // $sql = "DELETE FROM usuario WHERE id_user = '$idUsuario'";
    $statement = $connect->prepare("DELETE FROM usuario WHERE id_user = '$idUsuario'");
    $statement->bindParam(':id_user', $idUsuario);
    $statement->execute();

    if ($statement->execute()) {
      

        echo "<script> alert('Usuário excluido com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/pagina-adm.php'</script>";
    }
} 

