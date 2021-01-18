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
<html lang="pt_br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/feed.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>MoradaMais</title>

	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<!-- Theme CSS -->
	<!-- <link href="css/agency.min.css" rel="stylesheet"> -->
	<link href="css/agencyFeed.css" rel="stylesheet">
</head>

<body id="page-top">
	<!-- Navigation -->
	<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
		<a class="page-scroll" href="#page-top"><img class="img-logo" src="img/logos/logo3.png"></a>
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="div-ul-menu">
				<ul class="nav  navbar-right list-inline-item">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li>
						<a class="page-scroll" href="index.php">Home</a>
					</li>
					<li>
						<a class="page-scroll" href="#perfil">Perfil</a>
					</li>
					<li>
						<a class="page-scroll" href="index.php#contact">Contato</a>
					</li>

					<li class="">
						<div class="btn-group">
							<button type="button" class="btn btn-danger dropdown-toggle nome-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Olá, <?= $usuarios['UsuarioNome']; ?>
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
		$locador_json = file_get_contents("http://localhost/www/MORADA+/back-end/buscaDadosJoin.php");
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
								<h5 class="card-title"><?= $l['first_name'] . ' ' . $l['last_name'] ?></h5>
								<p class="card-text"><?= $l['regiao'] ?></p>
								<p class="card-text"><?= $l['descricao_imovel'] ?></p>
								<a href="#" class="btn btn-primary">Ver Perfil</a>
								<a href="#" class="btn btn-primary">Chat</a>
							</div>
						</div>
					</div>
				</div>
	</div>
	</div>


<?php endforeach; ?>
<?php else : ?>
	<div class="alert alert-primary" role="alert">
		Não existem mensagens cadastradas
	</div>
<?php endif; ?>

<div class="footer">
	<?php include_once('includes/footerFeed.php') ?>
</div>