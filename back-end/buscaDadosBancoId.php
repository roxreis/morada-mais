<?php 

include_once 'db/conexao.php';


$id = $_GET['id'];


setlocale(LC_MONETARY, 'pt_BR');

$sql = "SELECT * FROM usuario WHERE id_user = '$id'";
$result = $con->query($sql);

print_r( json_encode( $result->fetch_all(MYSQLI_ASSOC)));


mysqli_close($con);