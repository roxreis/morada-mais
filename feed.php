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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- botões -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/form-cadastro.css" rel="stylesheet">
    <link href="css/feed.css" rel="stylesheet">
    <link href="css/agencyFeed.css" rel="stylesheet">
    
    <title>Morada+ | Feed</title>
</head>

    <body class="body-feed">
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class=" ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="page-scroll" href="./index.php"><img class="img-logo" src="img/logos/logo3.png"></a>
				</div>
				<div class="form-group col-md-3  ">
			 
				<select class="form-control">
					<option>Filtrar por região</option>
					<option>Zona Norte</option>
					<option>Zona Sul</option>
					<option>Zona Leste</option>
					<option>Zona Oeste</option>
				</select>
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

<section class="section-feed container">
			<?php
				$locador_json = file_get_contents("http://localhost/MORADA+/back-end/buscaDadosJoin.php");
				$locador = json_decode($locador_json, true);

		if ($locador != []) :
			foreach ($locador as $l) : ?>
				<div class="card mb-3">
					<div class="row card-feed">
						<div class="col-md-5">
						<img src=<?= $l['img'] ?> class="img-feed" alt="<?= $l['img'] ?>">
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<strong class="card-title"><?= $l['titulo'] ?></strong>
								<!-- dados vindo do join com a tabela usuario -->

								<p class="card-text">Meu perfil: <?= $l['bio'] ?></p>
								<!-- dados vindo dda tabela locador -->								
								<p class="card-text">Região: <?= $l['regiao'] ?></p>
								<p class="card-text">Descrição: <?= $l['descricao_imovel'] ?></p>
								<p class="card-text"> <strong>Valor: R$ <?= $l['valor_aluguel'] ?>, mensal</strong></p>
								<a href="#" class="btn btn-primary">Detalhes</a>
								<a href="#" class="btn btn-primary">Chat</a>
								<p class="card-text"><small class="text-muted">Data da oferta: <?= $l['data_cadast'] ?></small></p>
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
	<div class="footer">
		<?php include_once('includes/footer.php') ?> 
	</div>