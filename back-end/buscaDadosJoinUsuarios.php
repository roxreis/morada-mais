<?php 

include_once 'db/conexao.php';

$sql = "select * from 
usuario u left join 
locador l on u.id_user = l.id_user 
where l.id_user is null;";


$result = $con->query($sql);

print_r( json_encode( $result->fetch_all(MYSQLI_ASSOC)));

mysqli_close($con);