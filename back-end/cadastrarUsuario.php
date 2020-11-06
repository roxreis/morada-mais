<?php 

include_once 'db/conexao.php';


if (isset($_POST['cadastrar'])) {
        
    $nome = $_POST['first_name'];
    $sobrenome = $_POST['last_name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $nivelAcesso = $_POST['nivel'];
    $locador = $_POST['locador']; 
    $fraseSenha = $_POST['frase-senha'];

    isset($_POST['locatario']) ? $locatario = $_POST['locatario'] : $locatario = ""; 
    isset($_POST['regiao']) ? $regiao = $_POST['regiao'] : $regiao =  ""; 
    isset($_POST['descricao_imovel']) ? $descricaoImovel = $_POST['descricao_imovel'] : $descricaoImovel = ""; 

    //diretório para salvar as imagens

    // $pasta = $_FILES['img']['name'];
    
    // $nomeArquivo = $_FILES['img']['name'];
    // $nomeArquivo != " "  ? $localSaveFotoCliente = "/MORADA+/img/clientes/fotoPerfil/$pasta/$nomeArquivo" : $localSaveFotoCliente = "Sem imagem";
    // $linkTemp = $_FILES['img']['tmp_name'];
    // move_uploaded_file($linkTemp, $localSaveFotoCliente);
   
    
    // $nomeArquivo1 = $_FILES['img1']['name'];
    // $nomeArquivo1 != " "  ? $localSaveFotoCasa1 = "/MORADA+/img/clientes/fotosCasa1/$nomeArquivo1": $localSaveFotoCasa1 = "Sem imagem";
    // $linkTemp1 = $_FILES['img1']['tmp_name'];
    // move_uploaded_file($linkTemp1, $localSaveFotoCasa1);

    // $nomeArquivo2 = $_FILES['img2']['name'];
    // $nomeArquivo2 != " " ? $localSaveFotoCasa2 = "/MORADA+/img/clientes/fotosCasa2/$nomeArquivo2" : $localSaveFotoCasa2 = "Sem imagem";
    // $linkTemp2 = $_FILES['img2']['tmp_name'];
    // move_uploaded_file($linkTemp2, $localSaveFotoCasa2);
   
    $senhaSegura = SHA1($_POST['pass']);

 
    $inserir = "INSERT INTO usuarios (first_name, last_name, user_email, user_cpf, user_pass, lembrete_senha, user_nivel, user_ativo, check_locador, check_locatario, regiao, descricao_imovel ) VALUES ('$nome', '$sobrenome', '$email', '$cpf', '$senhaSegura', '$fraseSenha','$nivelAcesso', 1, '$locador', '$locatario','$regiao','$descricaoImovel')";


    if (mysqli_query($con, $inserir)) {
        
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }
}

mysqli_close($con);


?>