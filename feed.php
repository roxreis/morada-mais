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
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Morada+ | Home</title>

        <!-- Bootstrap Core CSS -->
		<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Theme CSS -->
        <link href="css/agencyFeed.css" rel="stylesheet">
        <link href="css/feed.css" rel="stylesheet">

    </head>

    <body id="page-top" class="index">
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="page-scroll" href="./index.php"><img class="img-logo" src="img/logos/logo3.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="div-ul-menu">
                    <?php if(isset($usuarios['UsuarioID']) && $usuarios != []):?>
                        <ul class="nav navbar-nav navbar-right">
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
                    <?php endif; ?>
                </div>
            </div>
         </nav>
	<div>
		<div class="container filtro ">
			<div class="form-group col-md-3">
				<br>
				<select class="form-control">
					<option>Filtrar por região</option>
					<option>Zona Norte</option>
					<option>Zona Sul</option>
					<option>Zona Leste</option>
					<option>Zona Oeste</option>
				</select>
			</div>
		</div>
	</div>

	<div>
		<div class="row-fluid">

			<?php
			$locador_json = file_get_contents("http://localhost/MORADA+/back-end/buscaDadosJoin.php");
			$locador = json_decode($locador_json, true);

		if ($locador != []) :
			foreach ($locador as $l) : ?>
				<div class="col-sm-4">
					<div class="card-columns-fluid">
						<div class="card mb-5 mx-auto " style="width: 25rem;">
						<!-- inicio carousel -->
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src=<?= $l['img'] ?> alt="Primeiro Slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src=<?= $l['img2'] ?> alt="Segundo Slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src=<?= $l['img3'] ?> alt="Terceiro Slide">
									</div>
								</div>
								
							</div>
							<!-- carousel fim -->
							
							<div class="card-body">
								<h5 class="card-title"><?= $l['titulo'] ?></h5>
							<!-- dados vindo do join com a tabela usuario -->
								<p class="card-title"><?= $l['first_name'] . ' ' . $l['last_name'] ?></p>
								<p class="card-text"><?= $l['bio'] ?></p>
							<!-- dados vindo dda tabela locador -->								
								<p class="card-text"><?= $l['regiao'] ?></p>
								<p class="card-text"><?= $l['descricao_imovel'] ?></p>
								<p class="card-text"> <strong>R$ <?= $l['valor_aluguel'] ?></strong></p>
								<a href="#" class="btn btn-primary">Detalhes</a>
								<a href="#" class="btn btn-primary">Chat</a>
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
		</div>
	</div>
	<div class="footer">
		<?php include_once('includes/footerFeed.php') ?> 
	</div>