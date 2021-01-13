<?php include_once 'back-end/db/conexao.php'; 


$id = $_GET['id'];
$ok = isset($id) ? $id : false;


if ($ok) {
    $sql = "SELECT * FROM usuarios WHERE user_id = '$id'";
    $resultado = mysqli_query($con, $sql);
} 

if (isset($_POST['editarSenha'])) {
   
    $novaSenha = SHA1($_POST['novaSenha']);
    $update = "UPDATE usuarios SET user_pass='$novaSenha' WHERE user_id=$id";

    if (mysqli_query($con, $update)) {

        echo "<script> alert('Nova senha cadastrada com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/form-login.php'</script>";

    } else {
        echo "Error: <br>" .$sql. mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Morada+ | Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">
        <link href="css/agency.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/adm.css" rel="stylesheet">
        <link href="css/forms.css" rel="stylesheet">
        <link href="css/form-login.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>

<section class="form-redefine-senha">

    <a href="form-login.php"> <i class="fa fa-arrow-left seta-recupera-senha" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a>

    <form class="form-inline form-lembrete" action="" method="POST">
        <div class="form-group ">
            <input type="text" name="novaSenha" class="form-control" id="inputPassword2" placeholder="Nova senha">
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="editarSenha">Enviar</button>
    </form>
    </section>


    <?php  include_once('includes/footer.php')?>