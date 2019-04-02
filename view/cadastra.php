<?php 
    include_once('../model/usuario.php');
     if( isset($_POST['nome']) ){
         $usuario = new Usuario($_POST['nome'], $_POST['email'],$_POST['senha']);
         $usuario->setId($_POST['id']);
         $menssagem = $usuario->inserirBD();
         $em = base64_encode( $_POST['email'] );
         if(!is_string( $menssagem ))
         header('location:vemail.php?email='.$em);
         else
            echo "<script type='text/javascript'>swal('Senha já existe!','','error');</script>";
     }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="description" content="Cadastrar para escrever no site Desafio dos Escritores">
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/login_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Cadastrar no desafio dos escritores</title>
</head>
<body>
<?php
    include_once('header.php');
?>
    <!--Usar o sweet alert -->
	<script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    <form  method="post" class="box" onsubmit="return validar()">
        <h3>Cadastrar</h3>
        <h4>ou <a href="login.php">Entrar</a></h4>
        <input type="text" name="nome" id="nome" placeholder="Seu Nome" required>
        
        <input type="email" name="email" placeholder="Seu email" id="email">

        <input type="password" name="senha" placeholder="Sua Senha" id="senha">

        <input type="hidden" name="id">

        <input type="submit" value="Cadastrar"/>
    </form>
    <script src="../_js/validar.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>