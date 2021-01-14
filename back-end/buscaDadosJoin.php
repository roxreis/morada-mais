<?php 

include_once 'db/conexao.php';

$sql = "SELECT * FROM usuario 
JOIN locador  
ON locador.id_user = usuario.id_user;";


$result = $con->query($sql);

print_r( json_encode( $result->fetch_all(MYSQLI_ASSOC)));

mysqli_close($con);