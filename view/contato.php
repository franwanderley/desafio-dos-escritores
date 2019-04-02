<?php
    session_start();
    //PHPMailer
    include_once('../controller/enviarEmail.php');
    

    if( !isset($_SESSION['user']) )
        header('location: login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="desafio dos escritores, enviar email para desafio dos escritores,peguntar para desafio dos escritores">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta name="description" content="Cadastrar para escrever no site Desafio dos Escritores">
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Enviar email para o desafio dos escritores</title>
</head>
<body>
    <?php include_once('header.php'); ?>
        <!--Usar o sweet alert -->
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    
    <h3 class="titulo"> Enviar Email</h3>
    <form action="" method="post">
                
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto"><br>
                <label for="texto">Texto:</label><br>
                <textarea name="texto" id="resumo" onkeyup="limite_textarea(this.value)" class="tema1" rows="5" cols="20" style="width:80%" required></textarea>
                <span id="cont">250</span> Restantes <br>
               <button class="efeito btn2" type="submit" name="action">Enviar <i class="far fa-envelope"></i></button>
    </form>
    
    <script src="../_js/escrever.js"></script>

    <?php
        if( isset($_POST['assunto']) ){
            $email = $r['email'];
            enviarEmail($email,$_POST['assunto'],$_POST['texto']);
                echo "<script type='text/javascript'>swal('Enviado com Sucesso','','success');</script>";
        }
        include_once('footer.php');
    ?>
</body>
</html>