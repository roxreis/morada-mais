<?php 

include_once 'db/conexao.php';


if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaSegura = SHA1($_POST['pass']);
    $nivelAcesso = $_POST['nivel'];


    $inserir = "INSERT INTO admin (nome, admin_email, admin_pass, nivel) VALUES ('$nome', '$email', '$senhaSegura', 2 )";


    if (mysqli_query($con, $inserir)) {
        echo "<script> alert('Criado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/pagina-adm.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }

}