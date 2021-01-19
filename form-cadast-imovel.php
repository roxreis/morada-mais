<?php 

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $usuario = isset($_SESSION["UsuarioID"]) ? $_SESSION:[];

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
//       // Destrói a sessão por segurança
      session_destroy();
//       // Redireciona o visitante de volta pro login

  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/form-cadastro.css" rel="stylesheet">
    
    <title>Morada+ | Cadastro</title>
</head>
<body class="bg-light-gray body-form-cadastro ">
        <div class="div-form-banner" >
           <a href="index.php"> <i class="fa fa-arrow-left seta" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a>
        </div>    
        <section id="section-form-cadastro" class="d-flex justify-content-center">
            <form action="back-end/cadastrarImovel.php" class="bg-light-gray" id="cadastro-usuario" method="POST" enctype="multipart/form-data" >
                <fieldset  >
                    <h2>Dados do imóvel</h2>
                    <div class="input-block">
                        <label for="name">Descrição do imóvel</label>
                        <input name="descricao_imovel" id="descricao_imovel" placeholder="ex. 2 quartos, sala ampla e cozinha" required>
                    </div>
                    <div class="input-block">
                    <label for="regiao">Escolha a região:</label>
                    <select name="regiao" id="regiao">
                        <option value="Zona Leste">Zona Leste</option>
                        <option value="Zona Norte">Zona Norte</option>
                        <option value="Zona Sul">Zona Sul</option>
                        <option value="Zona Oeste">Zona Oeste</option>
                    </select>
                    </div>
                    <div class="input-block ">
                        <label for="img">foto do imóvel - imagem 01</label>
                        <input type="file" name="img" class="form-img">
                    </div>
                    <div class="input-block ">
                        <label for="img2">foto do imóvel - imagem 02</label>
                        <input type="file" name="img2" class="form-img">
                    </div>
                    <div class="input-block ">
                        <label for="img3">foto do imóvel - imagem 03</label>
                        <input type="file" name="img3" class="form-img">
                    </div>
                    <input name="id_user" value= "<?php echo $_SESSION["UsuarioID"] ?>" type="hidden">
                    <button type="submit" class="btn btn-success" name="cadastrar">Enviar</button>
                </fieldset>
            </form>
        </section>           
        <?php  include_once('includes/footer.php')?>