<?php

//fetch_user.php





include('chat-control.php');


session_start();

$query = "
SELECT * FROM usuario 
JOIN locador 
ON locador.id_user = usuario.id_user
WHERE usuario.id_user != '".$_SESSION['UsuarioID']."'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <th>Nome</th>
  <th>Numero do Anúncio</th>
  <th>Titulo do imovel</th>
   <th>Status</th>
  <th>Ações</th>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['id_user'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }
 $output .= '
 <tr>
  <td>'.$row['first_name']." ".$row['last_name'].' '.count_unseen_message($row['id_user'], $_SESSION['UsuarioID'], $connect).'</td>
  <td>'.$row['id_imovel'].'</td>
  <td>'.$row['titulo'].'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id_user'].'" data-tousername="'.$row['first_name'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;


?>