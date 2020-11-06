<?php include_once('db/conexao.php'); 

// PEGA AS INFORMAÇOES DO BANCO
$idUsuario= $_GET['id'];
$ok = isset($idUsuario) ? $idUsuario : false;


if ($ok) {
    $sql = "SELECT * FROM usuarios WHERE user_id = '$idUsuario'";
    $resultado = mysqli_query($con, $sql);
} 

// FIM

if (isset($_POST['Editar'])) {

    $editar = $_POST['Editar'];
}

if (isset($editar)) {
   
    $email = $_POST['email'];
    if ($email === 'user_email') {

        $email == "";

    } else {
       $email = $_POST['email'];
    }
    $locador = $_POST['locador'];
    $ativo = $_POST['ativo']; 

    isset($_POST['locatario']) ? $locatario = $_POST['locatario'] : $locatario = ""; 
    isset($_POST['regiao']) ? $regiao = $_POST['regiao'] : $regiao =  ""; 
    isset($_POST['descricao_imovel']) ? $descricaoImovel = $_POST['descricao_imovel'] : $descricaoImovel = ""; 



    $update = "UPDATE usuarios SET user_email='$email', user_ativo='$ativo', check_locador='$locador', check_locatario='$locatario', regiao='$regiao', descricao_imovel='$descricaoImovel' WHERE user_id=$idUsuario";

    if (mysqli_query($con, $update)) {
        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='/MORADA+/pagina-adm.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>

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
    <link href="../css/agency.min.css" rel="stylesheet">
    <link href="../css/agency.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/forms.css" rel="stylesheet">
    <link href="../css/form-cadastro.css" rel="stylesheet">
    
    <title>Morada+ | Cadastro</title>
</head>
<body class="bg-light-gray body-form-cadastro ">
    


        <div class="div-form-banner" >
           <a href="/index.php"> <i class="fa fa-arrow-left seta" data-toggle="tooltip" data-placement="top" tabindex="0" title="Ir para Home" ></i></a>

        </div>    
        <section id="section-form-cadastro" class="d-flex justify-content-center">
            <form action=""class="bg-light-gray" id="cadastro-usuario" method="POST"  >
            <?php if($resultado->num_rows > 0): ?> 
                <?php while ($usuario = $resultado->fetch_assoc()): ?>
                    <fieldset  >
                        <h2>Editar dados Cadastro</h2>
                        <div class="input-block">
                            <label for="name">Nome</label>
                            <input name="first_name" readonly value="<?=$usuario['first_name'];?>" id="name" required>
                        </div>
                        <div class="input-block">
                            <label for="name">Sobrenome</label>
                            <input name="last_name" readonly value="<?=$usuario['last_name'];?>" id="name" required>
                        </div>
                        <div class="input-block">
                            <label for="email">Email <small>(eu@eu.com.br)</small> </label>
                            <input name="email" id="email" value="<?=$usuario['user_email'];?>" type="email" required>
                        </div>
                        <div class="input-block">
                            <label for="cpf">CPF<small>(somente números)</small></label>
                            <input name="cpf" id="cpf" disabled value="<?=$usuario['user_cpf'];?>"  type="number"  required>
                        </div>
                         <!-- <div class="input-block ">
                            <label for="img">Sua Foto</label>
                            <input type="file" name="img" class="form-img">
                        </div> -->
                        <input type="number" name="nivel" value="usuario comum" hidden>

                        <div class="input-block">
                            <label id="ativo" for="ativo">Cadastro ativo?</label>
                            <select class="form-img" name="ativo" class="form-control">
                                <option value='1' selected>Ativo</option>
                                <option value='2'>Inativo</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input"  type="checkbox" name="locador" id="exampleRadios1" value="1" >
                            <label class="form-check-label " for="exampleRadios1">
                                Estou procurando casa para dividir o aluguel
                            </label>
                        </div>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" name="locatario" type="checkbox" id="exampleRadios2" value="1">
                            <label class="form-check-label ml-3" for="exampleRadios2">
                                Estou oferecendo minha casa para dividir o aluguel
                            </label>
                        </div>
                        <div class="input-block">
                            <label id="regiao" for="regiao">Região de São Paulo</label>
                            <select class="form-img" name="regiao" class="form-control">
                            <option  selected ><?=$usuario['regiao'];?></option>
                                <option>Zona Norte</option>
                                <option>Zona Sul</option>
                                <option>Zona Leste</option>
                                <option>Zona Oeste</option>
                            </select>
                        </div>
                        <div class="textarea-block">
                            <label for="exampleFormControlTextarea1">Descrição do imóvel</label>
                            <textarea class="form-control" name="descricao_imovel"id="exampleFormControlTextarea1"  rows="3">"<?=$usuario['descricao_imovel'];?>"</textarea>
                        </div>
                        <!-- <div class="input-block ">
                            <label>FOTOS DA CASA</label><br>
                            <label for="img1">Imagem 01</label>
                            <input type="file" name="img1" class="form-img">
                            <label for="img2">Imagem 02</label>
                            <input type="file" name="img2" class="form-img">
                        </div> -->
                        <button type="submit" class="btn btn-success" name="Editar">Editar</button>
                      <?php endwhile; ?>  
                <?php endif; ?> 
                </fieldset>
            </form>
        </section>
           
        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Contate-nos!</h2>
                        <h3 class="section-subheading text-muted">Vamos responder o mais rápido possível.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Seu nome *" id="name" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Seu Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Seu Telefone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Sua Mensagem *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl">Enviar Mensagem</button>
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
                        <li><a href=""><i class="fa fa-cogs" aria-hidden="true"></i></a>
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

</body>
</html>