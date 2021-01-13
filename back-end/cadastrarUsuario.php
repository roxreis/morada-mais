<?php 

include_once 'db/conexao.php';


if (isset($_POST['cadastrar'])) {
        
    $nome = $_POST['first_name'];
    $sobrenome = $_POST['last_name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $nivelAcesso = $_POST['nivel'];
    $bio = $_POST['bio']; 
    $fraseSenha = $_POST['frase-senha'];
    $senhaSegura = SHA1($_POST['pass']);



    $inserir = "INSERT INTO usuario (first_name, last_name, user_email, user_cpf, user_pass, lembrete_senha, user_nivel, user_ativo, bio) VALUES ('$nome', '$sobrenome', '$email', '$cpf', '$senhaSegura', '$fraseSenha','$nivelAcesso', 1, '$bio')";


    if (mysqli_query($con, $inserir)) {
        
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }
}

mysqli_close($con);


 