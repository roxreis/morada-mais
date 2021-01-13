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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                    <a class="page-scroll" href="#page-top"><img class="img-logo" src="img/logos/logo.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="div-ul-menu">
                    <?php if(isset($usuarios['UsuarioID']) && $usuarios != []):?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#services">Serviços</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#about">A Empresa</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#team">Equipe</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#contact">Contato</a>
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
                    <?php else: ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#services">Quem Somos</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#about">A Empresa</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#team">Equipe</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#contact">Contato</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header >
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"> <h1>LGBTQIA+, encontre alguém compatível para dividir o aluguel!</h1>
                </div>
                    <a href="form-login.php" class="btn btn-xl" id="btn-login">Login</a>
                    <a href="form-cadast-usuario.php" class="btn btn-xl">Cadastrar</a>
                </div>
            </div>
        </header>

        <!-- Services Section -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Quem Somos</h2>
                        <h3 class="section-subheading text-muted">Criado a partir do curso da Recode Pro, a Morada+ tem a proposta de intermediar o encontro de pessoas que queiram ou precisam dividir uma moradia e tenham perfis interessantes e oportunos entre si, voltado para o público LGBTQIA+</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Dividir o Aluguel</h4>
                        <p class="text-muted">Você pode dividir o aluguel ou oferecer um imóvel para o mesmo fim</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Busca de perfis</h4>
                        <p class="text-muted">Após responder algumas perguntas, nosso algoritimo traça seu perfil e mostra as pessoas mais compatíveis com você!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-handshake-o fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Facilitação</h4>
                        <p class="text-muted">Mediamos e facilitamos sua busca por uma moradia mais digna</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- About Section -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">A empresa</h2>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="subheading">Missão</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Contribuir para que as pessoas desfrutem da sua própria autenticidade, sendo elas mesmas com segurança e liberdade</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Visão</h4>
                                        <h4 class="subheading"></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Ser uma referência em tecnologia que proporcione o melhor para sua moradia!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Valores</h4>
                                        <h4 class="subheading"></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Respeito, liberdade, segurança, qualidade de vida e empatia</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="bg-light-gray" style="
                 padding-top: 100px;
                 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Equipe</h2><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/aline.jpg" class="img-responsive img-circle" alt="">
                            <h4>Aline Santiago</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/Sabathnny" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/alinesantiagosantana" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/felipe.jpg" class="img-responsive img-circle" alt="">
                            <h4>Felipe Freire</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/FelipeFFS93" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/felipe-freire-949967172/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/rodrigo.jpg" class="img-responsive img-circle" alt="">
                            <h4>Rodrigo Reis</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/roxreis" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/rodrigoreis12" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/thiago.jpg" class="img-responsive img-circle" alt="">
                            <h4>Thiago Guerreiro</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/thiago-guerreiro" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/thiago-guerreiro86" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/daniel.jpg" class="img-responsive img-circle" alt="">
                            <h4>Daniel Leal</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/Daniel-Leal-27" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/danielleal27/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img src="img/team/raquel.jpg" class="img-responsive img-circle" alt="">
                            <h4>Raquel Ramos</h4>
                            <p class="text-muted">Dev Team</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="https://github.com/RRRAMOS" target="_blank"><i class="fa fa-github" ></i></a>
                                </li>
                                </li>
                                <li><a href="https://www.linkedin.com/in/raquelrramos/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                    </div>
                </div>
            </div>
        </section>

        <?php  include_once('includes/footer.php')?>