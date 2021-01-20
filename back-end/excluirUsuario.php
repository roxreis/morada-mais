<?php include_once('db/conexao.php'); 

$idUsuario= $_GET['id'];
$ok = isset($idUsuario) ? $idUsuario : false;


if ($ok) {
    $sql = "DELETE FROM usuario WHERE id_user = '$idUsuario'";
    $resultado = mysqli_query($con, $sql);

    echo "<script> alert('Usuário excluido com sucesso!')</script>";
    echo "<script> window.location.href='/MORADA+/pagina-adm.php'</script>";
} 

