<?php 

include_once 'db/conexao.php';

if (isset($_POST['cadastrar'])) {
        
    $descricao_imovel = $_POST['descricao_imovel'];
    $regiao = $_POST['regiao'];
    $id_user = $_POST['id_user'];

        //diretório para salvar as imagens

    $pasta = $_FILES['img']['name'];

    $nomeArquivo = $_FILES['img']['name'];
    $nomeArquivo != " "  ? $localSaveFotoCasa = "/MORADA+/img/casas/$pasta/$nomeArquivo" : $localSaveFotoCasa = "Sem imagem";
    $linkTemp = $_FILES['img']['tmp_name'];
    move_uploaded_file($linkTemp, $localSaveFotoCasa);


    $nomeArquivo2 = $_FILES['img2']['name'];
    $nomeArquivo2 != " "  ? $localSaveFotoCasa2 = "/MORADA+/img/casas/$nomeArquivo2": $localSaveFotoCasa2 = "Sem imagem";
    $linkTemp1 = $_FILES['img2']['tmp_name'];
    move_uploaded_file($linkTemp1, $localSaveFotoCasa2);

    $nomeArquivo3 = $_FILES['img3']['name'];
    $nomeArquivo3 != " " ? $localSaveFotoCasa3 = "/MORADA+/img/casas/$nomeArquivo3" : $localSaveFotoCasa3 = "Sem imagem";
    $linkTemp2 = $_FILES['img3']['tmp_name'];
    move_uploaded_file($linkTemp2, $localSaveFotoCasa3);

    $inserir = "INSERT INTO locador (descricao_imovel, regiao, img, img2, img3, id_user) VALUES ('$descricao_imovel', '$regiao', '$nomeArquivo', '$nomeArquivo2','$nomeArquivo3', '$id_user' )";


    if (mysqli_query($con, $inserir)) {
        
        echo "<script> alert('Imóvel cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }
}

mysqli_close($con);









