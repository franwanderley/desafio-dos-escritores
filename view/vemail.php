<?php
    session_start();
    include_once('../model/usuario.php');
    include_once('../controller/enviarEmail.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="description" content="Fazer login no Desafio dos Escritores">
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/login_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <title>Validar Email</title>
</head>
 <body>
    <?php  include_once('header.php'); ?>
    <!--Usar o sweet alert -->
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<?php 
    if( !isset($_GET['email']) && !isset($_GET['codigo']) )
        header('location:index.php');
    else if(isset($_GET['email'])){
        $email = base64_decode( $_GET['email'] );
        $r = Usuario::buscarPorEmailS($email);
        $assunto = "Codigo de Validação";
        $texto = "Olá ".base64_decode($_GET['email'])." somos da equipe de desafio dos escritores \n e esse é o link de validação ";
        $n = base64_encode($r['id']);//id do usuario
        $texto .= "desafiodosescritores.ga/view/vemail.php?codigo=";
        $texto.=$n;
	    //enviar email
       enviarEmail($email,$assunto,$texto);
    }
    if( isset($_GET['codigo']) ){
        $n = base64_decode($_GET['codigo']);
        if(Usuario::buscarPorIdS($n) != false && Usuario::buscarPorIdS($n) != ""){
            Usuario::validaEmail($n);
            $_SESSION['msg'] = "Cadastrado com sucesso";
            header("location:login.php");
        }
        else
            echo "<script >swal('Link errado','','error');</script>";
    }
?>
    <h2 style="text-align:center;margin-bottom:2%;">Validar Email</h2>
    <h3 style="text-align:center;">Enviamos um Email para você com um link para o seu cadastro</h3>

<?php include_once('footer.php'); ?>
