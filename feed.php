<?php 
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $usuarios = isset($_SESSION["UsuarioNome"]) ? $_SESSION:[];

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
</head>
<body>
	<header>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		    <div class="container">
		      	<a class="navbar-brand" href="index.php"><img width="80px" src="img/logos/logo.png" alt="MoradaMais"></a>
		      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      	</button>
		      	<div class="collapse navbar-collapse" id="navbarResponsive">
		        	<ul class="navbar-nav ml-auto">
			      		<li class="nav-item dropdown">
			        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          		<?= $usuarios['UsuarioNome'];?>
			        		</a>
			        		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          			<a class="dropdown-item" href="#">Atualizar perfil</a>
			          			<a class="dropdown-item" href="back-end/logout.php">Sair</a>
			        		</div>
			      		</li>
		        	</ul>
		      	</div>
		    </div>
		</nav>

	</header>

	<main>

		<div class="container-fluid">    
		  	<div class="row ">
		    	<div class="col-sm-2 sidenav">
		    		
		    	</div>

		    <div class="col-sm-8 text-left"> 

		    	<div class="form-group col-md-4">
			     	<br>
			      	<select class="form-control">
				        <option>Filtrar por região</option>
				        <option>Zona Norte</option>
			            <option>Zona Sul</option>
			            <option>Zona Leste</option>
			            <option>Zona Oeste</option>
			      	</select>
			    </div>

		       	<?php
		       		include_once 'back-end/db/conexao.php';
				    mysqli_set_charset($con, "utf8mb4");
				    $sql = "select * from usuario u join locador l on u.id_user = l.id_user;";
					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						$nome      = $row['first_name'];
						$sobrenome = $row['last_name'];
						$bio = $row['bio'];
						$descricaoImovel = $row['descricao_imovel'];
						$regiao = $row['regiao'];
						$img1 = $row['img'];
						$img2 = $row['img2'];
						$img3 = $row['img3'];
				?>

				<br>
		        <div class="card">
		         	<div class="card-body feed">
			            <header>
			               	<img src="<?php echo $img1 ?>">
			               	<div>
			                    <strong><?php echo $nome . ' ' . $sobrenome ?></strong>
			                    <span><?php echo $regiao ?></span>
			                </div>
			            </header>
			            <p><?php echo $descricaoImovel ?></p>
			            <a href="#" class="btn btn-primary">Ver Perfil</a>
			            <a href="#" class="btn btn-primary">Chat</a>
		            </div>
		        </div>  <br><br>

		        <?php
					}
	    			mysqli_close($con);
				?>

		  	</div>
		</div>

</body>
</html>