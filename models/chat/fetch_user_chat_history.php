<?php

//fetch_user_chat_history.php

include('chat-control.php');

session_start();

echo fetch_user_chat_history($_SESSION['UsuarioID'], $_POST['to_user_id'], $connect);

?>