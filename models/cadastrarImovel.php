<?php 

include_once 'db/conPDO.php';

if (isset($_POST['cadastrar'])) {
    
    $titulo = $_POST['titulo'];
    $descricao_imovel = $_POST['descricao_imovel'];
    $regiao = $_POST['regiao'];
    $id_user = $_POST['id_user'];
    $valor_aluguel = $_POST['valor_aluguel'];

    $data = date("d-m-y");
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/morada-mais/public/img/casas/';
    $name = $_FILES['img']['name'];
    $destino = $uploads_dir.$data.'-'.$name;
    $destino_db = 'public/img/casas/'.$data.'-'.$name;

    if (is_uploaded_file($_FILES['img']['tmp_name']))
    {       
      move_uploaded_file($_FILES['img']['tmp_name'], $destino);
    }
   
    $uploads_dir2 = $_SERVER['DOCUMENT_ROOT'].'/morada-mais/public/img/casas/';
    $name2 = $_FILES['img2']['name'];
    $destino2 = $uploads_dir2.$data.'-'.$name2;
    $destino_db2 = 'public/img/casas/'.$data.'-'.$name2;
    if (is_uploaded_file($_FILES['img2']['tmp_name']))
    {       
      move_uploaded_file($_FILES['img2']['tmp_name'], $destino2);
    }

    $uploads_dir3 = $_SERVER['DOCUMENT_ROOT'].'/morada-mais/public/img/casas/';
    $name3 = $_FILES['img3']['name'];
    $destino3 = $uploads_dir3.$data.'-'.$name3;
    $destino_db3 = 'public/img/casas/'.$data.'-'.$name3;
    if (is_uploaded_file($_FILES['img3']['tmp_name']))
    {       
      move_uploaded_file($_FILES['img3']['tmp_name'], $destino3);
    }

    // $inserir = "INSERT INTO locador (titulo, descricao_imovel, regiao, img, img2, img3, id_user, valor_aluguel) VALUES ('$titulo', '$descricao_imovel', '$regiao', '$destino_db', '$destino_db2','$destino_db3', '$id_user', '$valor_aluguel')";
    
    $statement = $connect->prepare("INSERT INTO locador (titulo, descricao_imovel, regiao, img, img2, img3, id_user, valor_aluguel) VALUES ('$titulo', '$descricao_imovel', '$regiao', '$destino_db', '$destino_db2','$destino_db3', '$id_user', '$valor_aluguel')");
    $statement->execute();

    if ($statement->execute()) {
        
        echo "<script> alert('Imóvel cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/feed.php'</script>";

    } else {

        printf("Errormessage: %s\n", mysqli_error($con) ); 
    
    }
}

 









