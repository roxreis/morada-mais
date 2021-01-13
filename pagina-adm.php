<?php 

    include_once ('back-end/db/conexao.php');
    // include_once('includes/header.php');

    $sel = "SELECT * FROM usuarios";
    $result = $con->query($sel);

    $sel2 = "SELECT * FROM admin";
    $result2 = $con->query($sel2);

    $sel3 = "SELECT * FROM mensagem";
    $result3 = $con->query($sel3);

    // if (!isset($_SESSION)) session_start();

    // $nivel_necessario = 2;
  
    // // Verifica se não há a variável da sessão que identifica o usuário
    // if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
        
    //      // Redireciona o visitante de volta pro login
    //     echo "<script> alert('Página restrita!')</script>";
    //     echo "<script> window.location.href='/moradaMais/home.php'</script>";
        
   
    // }

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
        <link href="css/adm.css" rel="stylesheet">
        <link href="css/forms.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>
    

       
    <main class="page-adm" id="container">
        <section class="section-titulo-adm">
            <div id="titulo-adm">
                <a href="index.php"> <i data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" class="fa fa-arrow-left seta-admin"></i></a> 
                <h1>DASHBOARD ADM</h1>    
            </div>
        </section>
        <div class="row">
            <section class="section-filtros col-sm-2 col-lg-2">
                <aside>
                    <div class="alert alert-danger" role="alert">
                        Filtro em construção!
                    </div>
                    <h2>FILTROS</h2><hr>
                    <ul>
                       <i class="fa-spin 2s infinite linear"><li >Todos</li></i> 
                        <li>Usuários Ativos</li>
                        <li>Usuários Locatários</li>
                        <!-- <div class="input-block">
                            <label id="regiao" for="regiao">Por Região</label>
                            <select class="form-img" name="regiao" class="form-control">
                            <option  selected>Escolha uma opção</option>
                                <option>Zona Norte</option>
                                <option>Zona Sul</option>
                                <option>Zona Leste</option>
                                <option>Zona Oeste</option>
                            </select>
                        </div> -->
                    </ul>
                </aside>
            </section>
            <section class="section-content-adm col-sm-10 col-lg-10">
                <div class="div-table-adm table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-hover display dataTable dtr-inline">
                    <caption><strong> LISTA DE USUÁRIOS</strong></caption>
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Locador</th>
                            <th scope="col">Locatário</th>
                            <th scope="col">Região</th>
                            <th scope="col">Descrição do Imóvel</th>
                            <th scope="col">Status Cadastro</th>
                            <th scope="col">Cadastrado desde</th>
                            <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($result->num_rows > 0): ?> 
                                <?php while ($usuario = $result->fetch_assoc()): ?>
                                    <tr> 
                                        <th scope="row"><?= $usuario['user_id']; ?></th>
                                        <td><?= $usuario['first_name']; ?></td>
                                        <td><?= $usuario['last_name']; ?></td>
                                        <td><?= $usuario['user_email']; ?></td>
                                        <td><?php if($usuario['check_locador'] == 1):
                                    echo '<p class="text-success">Sim</p>'
                                        ?>
                                        <?php else:
                                            echo '<p class="text-danger">Não</p>'
                                            ?>
                                            <?php endif; ?>
                                            </td>
                                        <td><?php if($usuario['check_locatario'] == 1):
                                        echo '<p class="text-success">Sim</p>'
                                        ?>
                                        <?php else:
                                            echo '<p class="text-danger">Não</p>'
                                            ?>
                                            <?php endif; ?>
                                            </td>
                                        <td><?php if($usuario['regiao'] == "Escolha uma opção"): 
                                            echo " ";
                                            ?>
                                            <?php else:
                                            echo $usuario['regiao']
                                            ?>
                                            <?php endif; ?>                            
                                        </td>
                                        <td><?= $usuario['descricao_imovel']; ?></td>
                                        <td><?php if($usuario['user_ativo'] == 1): 
                                            echo '<p class="text-success">Ativo</p>'
                                            ?> 
                                            <?php else: 
                                                echo '<p class="text-danger">Inativo</p>'?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $usuario['cadastro']; ?></td>
                                        <td><a class="badge badge-info"  href="back-end/editarUsuario.php?id=<?= $usuario['user_id']; ?>">Editar</a></td>
                                    </tr>
                                <?php endwhile; ?>  
                                <?php else: ?>    
                                    <div class="alert alert-primary" role="alert">
                                        Não existem usuários cadastrados
                                    </div>
                            <?php endif; ?>    
                        </tbody>
                    </table>
                </div>
                <div class="div-table-adm table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered table-hover display dataTable dtr-inline">
                    <caption><strong> MENSAGEM DO USUÁRIO</strong></caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Mensagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($result3->num_rows > 0): ?> 
                                <?php while ($msg = $result3->fetch_assoc()): ?>
                                    <tr> 
                                        <th scope="row"><?= $msg['id_msg']; ?></th>
                                        <td><?= $msg['nome_msg']; ?></td>
                                        <td><?= $msg['email_msg']; ?></td>
                                        <td><?= $msg['tel_msg']; ?></td>
                                        <td><?= $msg['texto_msg']; ?></td>
                                    </tr>
                                <?php endwhile; ?>  
                                <?php else: ?>    
                                    <div class="alert alert-primary" role="alert">
                                        Não existem mensagens cadastradas
                                    </div>
                            <?php endif; ?>    
                        </tbody>
                    </table>
                </div>
                <div id="div-cadast-admin">
                    <form action="back-end/cadastrarAdmin.php" method="post" class="form-cadas-admin">
                        <fieldset >
                            <h2>Dados Cadastro de Admin</h2>
                            <div class="input-block">
                                    <label for="name">Nome <small>(Ex. admin)</small></label>
                                    <input name="nome" id="name" required>
                                </div>
                                <div class="input-block">
                                    <label for="email">Email <small>(eu@eu.com.br)</small> </label>
                                    <input name="email" id="email" type="email" required>
                                </div>
                            <div class="input-block">
                                <label for="txSenha">Senha <small>(alphanumérico)</small></label>
                                <input type="password" name="pass" id="txSenha" />
                            </div>
                            <input type="number" name="nivel" value="1" hidden>
                            <button type="submit" class="btn btn-success" name="cadastrar">Enviar</button>
                        </fieldset>
                    </form>
                    <div class="div-table-adm2 table-wrapper-scroll-y my-custom-scrollbar table-bordered">
                        <table class="table table-hover display dataTable dtr-inline">
                        <caption><strong> LISTA ADMIN</strong></caption>
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php if($result2->num_rows > 0): ?> 
                                <?php while ($admin = $result2->fetch_assoc()): ?>
                                    <tr> 
                                        <th scope="row"><?= $admin['id_admin']; ?></th>
                                        <td><?= $admin['nome']; ?></td>
                                        <td><?= $admin['admin_email']; ?></td>
                                    </tr>
                                <?php endwhile; ?>  
                                <?php else: ?>    
                                    <div class="alert alert-primary" role="alert">
                                        Não existem admin cadastrados
                                    </div>
                            <?php endif; ?>    
                        </tbody>
                    </div>
            </section>
        </div>
    </main>
