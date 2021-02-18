<?php 

include_once 'db/conPDO.php';

$id = $_GET['id'];

setlocale(LC_MONETARY, 'pt_BR');

$statement = $connect->prepare("SELECT * FROM usuario WHERE id_user = '$id'");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);

print_r($json);

