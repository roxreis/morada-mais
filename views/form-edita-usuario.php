<?php 

if(isset($_GET['id'])) $idUsuario= $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="../public/css/agency.min.css" rel="stylesheet">
    <link href="../public/css/agency.css" rel="stylesheet">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/forms.css" rel="stylesheet">
    <link href="../public/css/form-cadastro.css" rel="stylesheet">
    
    <title>Morada+ | Cadastro</title>
</head>
<body class="bg-light-gray body-form-cadastro ">
        <div class="div-form-banner" >
           <a href="pagina-adm.php"> <i class="fa fa-arrow-left seta" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a>
        </div>    
        <section id="section-form-cadastro" class="d-flex justify-content-center">
            <form action="../models/editarUsuario.php" class="bg-light-gray" id="cadastro-usuario" method="POST" enctype="multipart/form-data" >

                <?php $usuario_json = file_get_contents("http://localhost/morada-mais/models/buscaDadosBancoId.php?id=$idUsuario");
                      $usuarios = json_decode($usuario_json, true);?> 

                    <fieldset  >
                        <?php if ($usuarios != []):
                            foreach($usuarios as $usuario): ?> 
                                <h2>Editar dados Cadastro</h2>
                                <div class="input-block">
                                    <label for="name">Nome</label>
                                    <input name="first_name" readonly value="<?=$usuario['first_name'];?>" id="name" required>
                                </div>
                                <div class="input-block">
                                    <label for="name">Sobrenome</label>
                                    <input name="last_name" readonly value="<?=$usuario['last_name'];?>" id="name" required>
                                </div>
                                <div class="input-block">
                                    <label for="email">Email <small>(eu@eu.com.br)</small> </label>
                                    <input name="email" id="email" value="<?=$usuario['user_email'];?>" type="email" required>
                                </div>
                                <div class="input-block">
                                    <label for="cpf">CPF<small>(somente números)</small></label>
                                    <input name="cpf" id="cpf" disabled value="<?=$usuario['user_cpf'];?>"  type="number"  required>
                                </div>
                                <input type="number" name="nivel" value="usuario comum" hidden>
                                <input type="number" name="id" value="<?=$usuario['id_user'];?>" hidden>
                                <div class="input-block">
                                    <label id="ativo" for="ativo">Cadastro ativo?</label>
                                    <select class="form-img" name="ativo" class="form-control">
                                        <option value='1' selected>Ativo</option>
                                        <option value='2'>Inativo</option>
                                    </select>
                                </div>
                            <button  type="submit" class="btn btn-success" name="Editar">Editar</button>
                            <?php endforeach; ?>  
                        <?php endif; ?> 
                    </fieldset>
            </form>
        </section>
           
        <?php  include_once('includes/footer.php')?>