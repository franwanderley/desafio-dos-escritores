

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
  <title>Esqueceu Senha</title>
</head>
 <body>
    <?php  include_once('header.php');
           include_once('../controller/enviarEmail.php'); ?>
    <!--Usar o sweet alert -->
	<script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    <center>
    <h3 class="titulo2">Redefinir Senha</h3>
    <p>Imforme o nome e o email para que possamos enviar um email com a nova senha.</p>

    <form  method="post" class="entrar">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required><br>
        
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required><br>

        <input type="hidden" name="id">

        <button type="submit" class="btn-cadastrar">Enviar</button>
    </form>

    </center>
    <script src="js/validar.js"></script>
    <?php
        if( isset($_POST['nome']) ){
            $r = Usuario::buscarPorEmailS($_POST['email']);
            $senha = Usuario::gerarSenha();
            $u = new Usuario($r['nome'],$r['email'],$senha);
            $u->setId($r['id']);
            $u->inserirBD();

            //ENVIAR EMAIL
            $assunto = "Nova Senha";
            $texto = "Olá ".$_POST['email']." somos da equipe de desafio dos escritores \n e esse é a sua nova senha \n";;
            $texto .= $senha;
            enviarEmail($_POST['email'],$assunto,$texto);
                echo "<script type='text/javascript'>swal('Va no seu email para ver a nova senha!.','','success');</script>";
        }
        include('footer.php');
    ?>
</body>
</html>