<?php 

include_once 'db/conPDO.php';

$statement = $connect->prepare("SELECT * FROM usuario 
JOIN locador  
ON locador.id_user = usuario.id_user;");

$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);

print_r($json);