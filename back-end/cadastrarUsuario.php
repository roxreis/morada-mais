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

    $data = date("d-m-y");
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/MORADA+/img/clientes/';
    $name = $_FILES['img']['name'];
    $destino = $uploads_dir.$data.'-'.$name;
    $destino_db = 'img/clientes/'.$data.'-'.$name;
    if (is_uploaded_file($_FILES['img']['tmp_name']))
    {       
      move_uploaded_file($_FILES['img']['tmp_name'], $destino);
    }



    $inserir = "INSERT INTO usuario (first_name, last_name, user_email, user_cpf, user_pass, lembrete_senha, user_nivel, user_ativo, bio, img) VALUES ('$nome', '$sobrenome', '$email', '$cpf', '$senhaSegura', '$fraseSenha','$nivelAcesso', 1, '$bio','$destino_db')";


    if (mysqli_query($con, $inserir)) {
        
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }
}

mysqli_close($con);


 