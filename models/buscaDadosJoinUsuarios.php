<?php 

include_once 'db/conPDO.php';

$sql = "select * from 
usuario u left join 
locador l on u.id_user = l.id_user 
where l.id_user is null;";

$statement = $connect->prepare("SELECT * FROM usuario 
usuario u left join 
locador l on u.id_user = l.id_user 
where l.id_user is null;");

$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);

print_r($json);

