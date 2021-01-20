<?php include_once('db/conexao.php'); 

// PEGA AS INFORMAÇOES DO BANCO
$idUsuario= $_GET['id'];
$ok = isset($idUsuario) ? $idUsuario : false;


if ($ok) {
    $sql = "SELECT * FROM usuario WHERE id_user = '$idUsuario'";
    $resultado = mysqli_query($con, $sql);
} 

// FIM

if (isset($_POST['Editar'])) {

    $editar = $_POST['Editar'];
}

if (isset($editar)) {
   
    $email = $_POST['email'];
    if ($email === 'user_email') {

        $email == "";

    } else {
       $email = $_POST['email'];
    }
    $ativo = $_POST['ativo']; 


    $data = date("d-m-y");
    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/MORADA+/img/clientes/';
    $name = $_FILES['img']['name'];
    $destino = $uploads_dir.$data.'-'.$name;
    $destino_db = 'img/clientes/'.$data.'-'.$name;
    if (is_uploaded_file($_FILES['img']['tmp_name']))
    {       
      move_uploaded_file($_FILES['img']['tmp_name'], $destino);
    }
 
    $update = "UPDATE usuario SET user_email='$email', user_ativo='$ativo', img='$destino_db' WHERE id_user=$idUsuario";

    if (mysqli_query($con, $update)) {
        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/pagina-adm.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>

