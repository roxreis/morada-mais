<?php 

include_once 'db/conexao.php';



if (isset($_POST['mensagem'])) {

       
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $msg = $_POST['msg'];
 
      $inserir = "INSERT INTO mensagem (nome_msg, email_msg, tel_msg, texto_msg) VALUES ('$nome', '$email', '$tel', '$msg')";


    if (mysqli_query($con, $inserir)) {
        
        echo "<script> alert('Mensagem enviada com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/index.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    
    }
}

mysqli_close($con);


?>