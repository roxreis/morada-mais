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
                            <th scope="col">Status Cadastro</th>
                            <th scope="col">Cadastrado desde</th>
                            <th scope="col">foto</th>
                            <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php     
                            $usuario_json = file_get_contents("http://localhost/MORADA+/back-end/buscaDadosBanco.php?table=usuario");
                            $usuarios = json_decode($usuario_json, true);
                            
                            if ($usuarios != []):
                                foreach($usuarios as $usuario): ?>
                                    <tr> 
                                        <th scope="row"><?= $usuario['id_user']; ?></th>
                                        <td><?= $usuario['first_name']; ?></td>
                                        <td><?= $usuario['last_name']; ?></td>
                                        <td><?= $usuario['user_email']; ?></td>
                                        <td><?php if($usuario['user_ativo'] == 1): 
                                            echo '<p class="text-success">Ativo</p>'
                                            ?> 
                                            <?php else: 
                                                echo '<p class="text-danger">Inativo</p>'?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $usuario['cadastro']; ?></td>
                                        <td><img src="<?= $usuario['img']; ?>" style="width: 60px" alt=""></td>
                                        <td><a class="badge badge-info"  href="back-end/editarUsuario.php?id=<?= $usuario['id_user']; ?>">Editar</a></td>
                                    </tr>
                                <?php endforeach; ?>  
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
                        <?php     
                            $mensagem_json = file_get_contents("http://localhost/MORADA+/back-end/buscaDadosBanco.php?table=mensagem");
                            $mensagem = json_decode($mensagem_json, true);
                            
                            if ($mensagem != []) :
                                foreach($mensagem as $m): ?>
                                    <tr> 
                                        <th scope="row"><?= $m['id_msg']; ?></th>
                                        <td><?= $m['nome_msg']; ?></td>
                                        <td><?= $m['email_msg']; ?></td>
                                        <td><?= $m['tel_msg']; ?></td>
                                        <td><?= $m['texto_msg']; ?></td>
                                    </tr>
                                <?php endforeach; ?>  
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
                        <?php     
                            $admin_json = file_get_contents("http://localhost/MORADA+/back-end/buscaDadosBanco.php?table=admin");
                            $admin = json_decode($admin_json, true);

                            if ($admin != []) :
                                foreach($admin as $a): ?>
                                    <tr> 
                                        <th scope="row"><?= $a['id_admin']; ?></th>
                                        <td><?= $a['nome']; ?></td>
                                        <td><?= $a['admin_email']; ?></td>
                                    </tr>
                                <?php endforeach; ?>  
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
