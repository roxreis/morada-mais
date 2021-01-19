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

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/form-cadastro.css" rel="stylesheet">
    <link href="css/form-login.css" rel="stylesheet">
    
    <title>Morada+ | Login</title>
</head>
<body class=" body-form-cadastro ">

<main class="main-login" id="container">
  <div id="div-form-banner">
    <a href="index.php"> <i class="fa fa-arrow-left seta-login" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a> 
  </div>
  <!-- Formulário de Login -->
  <section>
    <form action="back-end/validacao.php" method="post" class="form-login">
      <fieldset class="">
        <h2>Dados de Login</h2>
          <div class="input-block">
            <label for="txUsuario">Email</label>
            <input type="email" name="email" id="txUsuario" />
          </div>
          <div class="input-block">
            <label for="txSenha">Senha</label>
            <input type="password" name="senha" id="txSenha" />
          </div>
          <div class="input-block mt-3">
            <label>Nível de acesso</label>
            <select name="who" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
              <option selected value="1">Usuário</option>
              <option value="2">Admin</option>
            </select>
          </div>
          <div class="input-block">
            <button  class="btn btn-success" type="submit" >Entrar</button>
          </div>
          <div class="input-block">
                <p>esqueceu a senha, <a class="clique-aqui-login" href="lembrete-senha.php">clique aqui</a></p>
          </div>
      </fieldset>
    </form>
  </section>
</main>

<?php  include_once('includes/footerFeed.php')?>