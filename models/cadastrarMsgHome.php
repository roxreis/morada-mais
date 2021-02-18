<?php 

include_once 'db/conPDO.php';



if (isset($_POST['mensagem'])) {

       
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $msg = $_POST['msg'];
 
    //   $inserir = "INSERT INTO mensagem (nome_msg, email_msg, tel_msg, texto_msg) VALUES ('$nome', '$email', '$tel', '$msg')";
      $statement = $connect->prepare("INSERT INTO mensagem (nome_msg, email_msg, tel_msg, texto_msg) VALUES ('$nome', '$email', '$tel', '$msg')");
      $statement->execute();
  
      if ($statement->execute()) {
        
        echo "<script> alert('Mensagem enviada com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/index.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    
    }
}

 