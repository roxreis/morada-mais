<?php 

include_once 'db/conPDO.php';

$ok = 0;
$email = 0;


if (isset($_POST['cadastrar'])) {
        
    $nome = $_POST['first_name'];
    $sobrenome = $_POST['last_name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    
    function validaCPF($cpf) {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        if (strlen($cpf) != 11) {
            echo "<script> alert('Erro no cadastro - CPF Inválido!')</script>";
            echo "<script> window.location.href='/morada-mais/views/form-cadast-usuario.php'</script>";
            exit;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            echo "<script> alert('Erro no cadastro -CPF Inválido!')</script>";
            echo "<script> window.location.href='/morada-mais/views/form-cadast-usuario.php'</script>";
            exit;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }


    if(validaCPF($cpf) == true){

        $cpfValidado = $cpf;

        $query ="SELECT * FROM `usuario` WHERE (`user_email` = '".$email ."') LIMIT 1"; 
        $select = $connect->prepare($query);
        $select->execute();
        $count = $select->rowCount();

 
         if ( $count > 0) {

                echo "<script> alert('Erro no cadastro - Email ja cadastrado anteriormente!')</script>";
                echo "<script> window.location.href='/morada-mais/views/form-cadast-usuario.php'</script>";
                exit;
         }

         $query2 ="SELECT * FROM `usuario` WHERE (`user_cpf` = '".$cpf ."') LIMIT 1"; 
                $select2 = $connect->prepare($query2);
                $select2->execute();
                $count2 = $select2->rowCount();

            if ($count2 > 0) {
                
                echo "<script> alert('Erro no cadastro - CPF ja cadastrado anteriormente!')</script>";
                echo "<script> window.location.href='/morada-mais/views/form-cadast-usuario.php'</script>";
                exit;


            } else {

                $nivelAcesso = $_POST['nivel'];
                $bio = $_POST['bio']; 
                $fraseSenha = $_POST['frase-senha'];
                $celular = $_POST['celular'];
                $senhaSegura = SHA1($_POST['pass']);

                $data = date("d-m-y");
                $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/morada-mais/public/img/clientes/';
            
                $name = $_FILES['img']['name'];
                $destino = $uploads_dir.$data.'-'.$name;
                $destino_db = '../public/img/clientes/'.$data.'-'.$name;
                if (is_uploaded_file($_FILES['img']['tmp_name']))
                {       
                    move_uploaded_file($_FILES['img']['tmp_name'], $destino);
                }

                $statement = $connect->prepare("INSERT INTO usuario (first_name, last_name, user_email, user_cpf, user_pass, lembrete_senha, user_nivel, user_ativo, bio, img, celular) VALUES ('$nome', '$sobrenome', '$email', '$cpfValidado', '$senhaSegura', '$fraseSenha','$nivelAcesso', 1, '$bio','$destino_db', '$celular')");
                $ok = $statement->execute();

            }

        }
    }


    if (!empty($ok)) {
        
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
        echo "<script> window.location.href='/morada-mais/views/form-login.php'</script>";
    
    } 


 


 