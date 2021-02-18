<?php

//insert_chat.php

include('chat-control.php');


session_start();

$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['UsuarioID'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($_SESSION['UsuarioID'], $_POST['to_user_id'], $connect);
}

?>