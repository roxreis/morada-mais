<?php 

include_once 'db/conPDO.php';


if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaSegura = SHA1($_POST['pass']);
    $nivelAcesso = $_POST['nivel'];

    $statement = $connect->prepare("INSERT INTO admin (nome, admin_email, admin_pass, nivel) VALUES ('$nome', '$email', '$senhaSegura', 2 )");
    $statement->execute();

    if ($statement->execute()) {
        echo "<script> alert('Criado com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/pagina-adm.php'</script>";

    } else {

        echo 'Error: ' . $e->getMessage();; 
    
    }

}