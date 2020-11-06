<?php 



include_once("db/conexao.php");

$lembrete= $_POST['lembrete'];
$ok = isset($lembrete) ? $lembrete : false;


if ($ok) {
    $sql = "SELECT * FROM usuarios WHERE (`lembrete_senha` = '".$lembrete."')";
    $resultado = mysqli_query($con, $sql);
}



if (mysqli_num_rows($resultado) > 0) {

  while ($usuario = $resultado->fetch_assoc()) {

    $id = $usuario['user_id'];

   echo "<script> alert('Sua frase de segurança confere! Redefina sua senha')</script>";
   echo "<script> window.location.href='/MORADA+/form-redefine-senha.php?id=$id'</script>";


  }
  
} else {

    echo "<script> alert('Frase de segurança não confere!')</script>";
    }
  






// if (!empty($_POST) AND (empty($_POST['email']))) {
//     echo "<script> alert('Favor preencher o email!')</script>";
//     echo "<script> window.location.href='/moradaMais/form-recupera-senha.php'</script>";

// }


//     $email = $_POST['email'];

     
//     $destinatario = $email;
//     $remetente = "xxxxxxxxxxxxxxxxxxxx";
     
       
//         $sql = "SELECT `first_name`, `user_email`, `user_pass` FROM `usuarios` WHERE (`user_email` = '".$destinatario."') AND (`user_ativo` = 1) LIMIT 1";
//         $contador = $con->query($sql);

         
//         if (mysqli_num_rows($contador) != 1){

//             echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Email nao consta do banco de dados</font></div>";

//         }else{

//                 $resultado = mysqli_fetch_assoc($contador); 
//                 $nome  = $resultado['first_name'];
//                 $emailBd = $resultado['user_email'];
//                 $senha = $resultado['user_pass'];
          
             
//                 $corpo_email  = "Ola, o procedimento de recuperar dados, foi efetuado com sucesso !\n..";
//                 $corpo_email .= "Seu Primeiro Nome = ".$nome."\n..";
//                 $corpo_email .= "Senha de acesso = ".$senha."\n..";
//                 $corpo_email .= "Seu email = ".$emailBd."\n.. ";
//                 $corpo_email .= "Nao responda esse email, e-Mail automatizado";     
//                 if (mail($destinatario,"Recuperacao de Senha",$corpo_email)){
                  
                 
//                 echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Sua senha foi enviada com sucesso para o email: $emailBd.</font></div>";
     
//                 }else{
                    
//                     echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Seu login ou email está incorreto.</font></div>";
//                      }
//             }
        
       