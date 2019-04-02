<?php 
    //incluir a classe usuario
    include_once('../model/usuario.php');
    session_start();
    $menssagem = null;//menssagem de erro
    //Usando cookie para lembrar senha
    $email = (isset($_COOKIE['CookieEmail'])) ? base64_decode($_COOKIE['CookieEmail']) : '';
    $senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';
    $lembrete = (isset($_COOKIE['CookieLembrete'])) ? $_COOKIE['CookieLembrete'] : false;
    $checked = ($lembrete == true) ? 'checked' : '';

    //menssagem
    if(isset( $_SESSION['menssagem'] ) ){
        $men = $_SESSION['menssagem'];
        echo "<script>swal(".$men.",'','success'):</script>";
    }
    
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

    <title>Fazer login para o desafio dos escritores</title>
</head>
<body>
    <?php include_once('header.php'); ?>
	<!--Sweet Alert-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
		<form name="signup" class="box" method="POST">
            <h3>Login</h3>
            <h4>ou <a href="cadastra.php">Cadastrar-se</a></h4>
            <input id="email" name="email" type="email" placeholder="Seu Email" value="<?php echo $email; ?>" required>
            <input id="senha" type="password" name="senha" placeholder="Sua Senha" value="<?php echo $senha; ?>" required><br>
            <label>
            <input type="checkbox" name="lembrete" class="lembrar" <?=$checked?>> Lembre-me
            </label>
				<input type="submit" name="action" value="Login">
                <a href="esq-senha.php" class="esqsenha">Esqueceu a Senha?</a>
		</form>

	<?php
     //menssagem de cadastro
     if(isset( $_SESSION['msg'] )){
        echo "<script type='text/javascript'>swal(".$_SESSION['msg'].",'','success');</script>";
        unset( $_SESSION['msg'] );//vou destruir a sessão msg
    }

	//validação do login
	if( isset($_POST['email']) ){
        $login = new Usuario(null,null,null);
        $login->setEmail($_POST['email']);
        $login->setSenha( md5($_POST['senha']) );
        $r = $login->logar();
        if(is_numeric($r)){
            $_SESSION['user'] = $r;//vai receber o id
            if($_POST['lembrete'] == true){
                $expira = time() + 60*60*24*30; 
                setCookie('CookieLembrete', true, $expira);
                setCookie('CookieEmail', base64_encode($_POST['email']), $expira);
                setCookie('CookieSenha', base64_encode($_POST['senha']), $expira);
            }
            else{
                setCookie('CookieLembrete');
                setCookie('CookieEmail');
                setCookie('CookieSenha');
            }
            header("location:index.php");
        }
        else
           echo "<script type='text/javascript'>swal('Email ou Senha errado','','error');</script>";
		
    }
?>
     
<?php
    include_once('footer.php');
?>