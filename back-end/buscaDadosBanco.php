<?php 

include_once 'db/conexao.php';

$tabela = $_GET['table'];


setlocale(LC_MONETARY, 'pt_BR');

$sql = "SELECT * FROM $tabela";
$result = $con->query($sql);

print_r( json_encode( $result->fetch_all(MYSQLI_ASSOC)));


