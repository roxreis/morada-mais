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

    <!-- Theme CSS -->
    <link href="../public/css/agency.min.css" rel="stylesheet">
    <link href="../public/css/agency.css" rel="stylesheet">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/forms.css" rel="stylesheet">
    <link href="../public/css/form-cadastro.css" rel="stylesheet">
    
    <title>Morada+ | Cadastro</title>
</head>
<body class="bg-light-gray body-form-cadastro ">
        <div class="div-form-banner" >
           <a href="../index.php"> <i class="fa fa-arrow-left seta" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a>
        </div>    
        <section id="section-form-cadastro" class="d-flex justify-content-center">
            <form action="../models/cadastrarUsuario.php"class="bg-light-gray" id="cadastro-usuario" method="POST" name="frmcpf" enctype="multipart/form-data"  >
                <fieldset>
                    <h2>Dados de Cadastro</h2>
                    <div class="input-block">
                        <label for="name">Nome</label>
                        <input name="first_name" id="name" required>
                    </div>
                    <div class="input-block">
                        <label for="name">Sobrenome</label>
                        <input name="last_name" id="name" required>
                    </div>
                    <div class="input-block">
                        <label for="email">Email <small>(eu@eu.com.br)</small> </label>
                        <input name="email" id="email" type="email" required>
                    </div>
                    <div class="input-block">
                        <label for="celular">celular <small>(com DDD - 11999999999)</small> </label>
                        <input name="celular" id="celular" type="phone" required>
                    </
                    <div class="input-block">
                        <label for="cpf">CPF<small>(somente números)</small></label>
                        <input name="cpf" maxlength="11" onblur="return verificarCPF(this.value)" id="cpf" type="number"  required>
                    </div>
                    <div class="textarea-block">
                        <label for="exampleFormControlTextarea1">Conte sobre você!</label>
                        <textarea class="form-control" name="bio"id="exampleFormControlTextarea1" placeholder="ex. Não fumante, aceito pet e gosto de música" rows="3"></textarea>
                    </div>
                    <div class="input-block ">
                        <label for="pass">Senha</label>
                        <input name="pass" id="pass" type="password" required></input>
                    </div>
                    <div class="textarea-block">
                        <label for="exampleFormControlTextarea1">Frase para recuperar senha</label>
                        <textarea class="form-control" name="frase-senha"id="exampleFormControlTextarea1" placeholder="ex. meu primeiro cachorro toto" rows="3"></textarea>
                    </div>
                    <div class="input-block ">
                        <label for="img">Sua Foto</label>
                        <input type="file" name="img" class="form-img">
                    </div>
                    <input type="number" name="nivel" value="1" hidden>
                    <input type="number" name="ativo" value="1" hidden>
                    <button type="submit" class="btn btn-success" name="cadastrar">Enviar</button>
                </fieldset>
            </form>
        </section>

                 
        <?php  include_once('includes/footer.php')?>

