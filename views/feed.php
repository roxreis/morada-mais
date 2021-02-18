<?php


include_once('../models/chat/chat-control.php');
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$usuarios = isset($_SESSION["UsuarioNome"]) ? $_SESSION : [];

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
	//       // Destrói a sessão por segurança
	session_destroy();
	//       // Redireciona o visitante de volta pro login
    
}

$user = $_SESSION['UsuarioID'];
                        

$statement = $connect->prepare("SELECT * FROM usuario WHERE id_user != '$user'" );
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                    <a class="page-scroll" href="index.php"><img class="img-logo" src="../public/img/logos/logo3.png"></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <!-- <li>
                            <a class="page-scroll" href="feed-usuarios.php">Ver Usuarios</a>
                        </li> ENTREGA FUTURA!!-->
                        <li>
                            <a class="page-scroll" href="form-cadast-imovel.php">Cadastrar Imóvel</a>
                        </li>
                        <li class="">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle nome-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Olá, <?= $usuarios['UsuarioNome'];?>
                                </button>
                                <div class="dropdown-menu div-sair">
                                    <a class="dropdown-item" href="../models/logout.php">Sair</a>
                                    <a class="dropdown-item" href="../models/chat/index.php">Chat</a>
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
            <div>
            <section class="section-feed container">
                        <?php
                            $locador_json = file_get_contents("http://localhost/morada-mais/models/buscaDadosJoin.php");
                            $locador = json_decode($locador_json, true);

                    if ($locador != []) :
                        foreach ($locador as $l) : ?>
                            <div class="card mb-3 card-feed">
                                <div class="row">
                                    <div class="col-md-5">
                                    <img src=<?= $l['img'] ?> class="img-feed" alt="<?= $l['img'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                        <p class="card-title" style="">Código do Anúncio: <?= $l['id_imovel'] ?></p>
                                        <strong class="card-title" style="text-transform: uppercase;"><?= $l['titulo'] ?></strong><br><br>
                                            <!-- dados vindo do join com a tabela usuario -->

                                            <p class="card-text">Meu perfil: <?= $l['bio'] ?></p>
                                            <!-- dados vindo dda tabela locador -->								
                                            <p class="card-text">Região: <?= $l['regiao'] ?></p>
                                            <p class="card-text ">Descrição: <?= $l['descricao_imovel'] ?></p>
                                            <p class="card-text"> <strong>Valor: R$ <?= $l['valor_aluguel'] ?>, mensal</strong></p>
                                            <!-- <a href="#" class="btn btn-primary">Detalhes</a> -->
                                            <a href="../models/chat/index.php?id= $l['id_user'] ?>" class="btn btn-primary">Chat</a>
                                            <!-- <a href="https://api.whatsapp.com/send?phone=+55"
                                                    class="btn btn-primary"
                                                    target="_blank"
                                                >
                                                    <svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
                                            Whatsapp</a> -->
                                            <p class="card-text"><small class="text-muted">Data da oferta: <?= date("d/m/Y H:i:s", strtotime($l['data_cadast']))?></small></p>

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
            </div>
        </main>
	<div class="footer">
    <?php  include_once('../views/includes/footer.php');?>
	</div>

