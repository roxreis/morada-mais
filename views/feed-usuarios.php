<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$usuarios = isset($_SESSION["UsuarioNome"]) ? $_SESSION : [];

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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- botões -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!-- Theme CSS -->
    <link href="../public/css/agency.min.css" rel="stylesheet">
    <link href="../public/css/agency.css" rel="stylesheet">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/feed.css" rel="stylesheet">
    <link href="../public/css/agencyFeed.css" rel="stylesheet">
    
    <title>Morada+ | Feed</title>
</head>
    <body class="body-feed">
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="page-scroll" href="index.php"><img class="img-logo" src="img/logos/logo3.png"></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="feed.php">Ver Imóvel</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="form-cadast-imovel.php">Cadastrar Imóvel</a>
                        </li>
                        <li class="">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle nome-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Olá, <?= $usuarios['UsuarioNome'];?>
                                </button>
                                <div class="dropdown-menu div-sair">
                                    <a class="dropdown-item" href="back-end/logout.php">Sair</a>
                                 </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <main>
            <section class="section-feed container">
                        <?php
                            $usuarios_json = file_get_contents("/back-end/buscaDadosJoinUsuarios.php");
                            $usuarios = json_decode($usuarios_json, true);


                    if ($usuarios != []) :
                        foreach ($usuarios as $u):?>
                            <div class="card mb-3">
                                <div class="row card-feed">
                                    <div class="col-md-5">
                                    <img src="<?= $u['img'] ?>" class="img-feed" alt="<?= $u['img'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                        <strong class="card-title"><?= $u['first_name'] ?></strong>
                                            <!-- dados vindo do join com a tabela usuario -->

                                            <p class="card-text">Meu perfil: <?= $u['bio'] ?></p>
                                            <!-- dados vindo dda tabela usuarios -->							  
                                            <a href="#" class="btn btn-primary">Detalhes</a>
                                            <a href="#" class="btn btn-primary">Chat</a>
                                            <p class="card-text"><small class="text-muted">Data de Cadastro: <?= $u['cadastro'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-primary" role="alert">
                            Não existem imóveis cadastrados
                        </div>
                    <?php endif; ?>
                    
            </section>
        </main>
	<div class="footer">
		<?php include_once('includes/footer.php') ?> 
	</div>