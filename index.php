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
        <?php if(!isset($usuarios['UsuarioID'])):?>
            <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="page-scroll" href="#page-top"><img class="img-logo" src="img/logos/logo3.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#services">Serviços</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#about">Empresa</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#team">Equipe</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#contact">Contato</a>
                            </li>
                                        
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <?php else: ?>
            <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="page-scroll" href="#page-top"><img class="img-logo" src="img/logos/logo3.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#services">Serviços</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="#about">Empresa</a>
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
                                        <a class="page-scroll" href="feed.php">Feed</a>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            <!-- /.container-fluid -->
            </nav>
        <?php endif; ?>

               
        <!-- Header -->
        <header class="">
            <div class="">
                <div class="intro-text">
                    <div class="intro-lead-in"> <h1>Encontre alguém para dividir uma moradia!</h1>
                </div>
                <?php if(isset($usuarios['UsuarioID']) && $usuarios != []):?>
                <div></div>
                <?php else: ?>
                    <div class="btn-index">
                        <a href="form-login.php" class="btn btn-xl" id="btn-login">Login</a>
                        <a href="form-cadast-usuario.php" class="btn btn-xl">Cadastrar</a>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Services Section -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Quem Somos e o que Fazemos</h2>
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
                        <h4 class="service-heading">Encontro entre pessoas</h4>
                        <p class="text-muted">Além de encontrar um lugar legal e acessível, você pode conhecer pessoas que também estão procurando dividir uma moradia!</p>
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
                        <h2 class="section-heading">Aqui!</h2>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                <!-- <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i> -->
                                    <i class="img-empresa fa fa-globe fa-stack-1x fa-inverse" id="globe"></i>
                        <!-- </span> -->
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="subheading">Missão</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Contribuir para que as pessoas desfrutem de sua autenticidade com segurança e liberdade.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <i class="img-empresa fa fa-plane fa-stack-1x fa-inverse" id="plane"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Visão</h4>
                                        <h4 class="subheading"></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Ser o melhor meio tecnológico proporcionador de moradia para pessoas LGBTQIA+</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <i class="img-empresa fa fa-puzzle-piece fa-stack-1x fa-inverse" id="puzzle"></i>
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

      <!-- Contact Section -->
      <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contate-nos!</h2>
                    <h3 class="section-subheading text-muted text-contact " style="color:white;">Vamos responder o mais rápido possível.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  action="back-end/cadastrarMsgHome.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Seu nome *" name="name" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Seu Email *" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Seu Telefone *" name="tel" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Sua Mensagem *" name="msg" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" name="mensagem"id="btn-enviar-msg">Enviar Mensagem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Squad 10 RecodePro 2020</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/morada04710850 " target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/MoradaMais-100564458536814" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/projetomoradamais/" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                    </li>
                    <li><a href="pagina-adm.php"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                    </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Política de privacidade</a>
                        </li>
                        <li><a href="#">Termos de Uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3h56lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </body>

</html>