<?php


//inicia a sessão
session_start();
$user = $_SESSION['user'];

if($user != null){
	//deslogar
	unset( $_SESSION['user'] );//destruiu a sessão
	unset($_COOKIE['email']);
	unset($_COOKIE['senha']);
	header("location:../view/login.php");//vai ser redimensado para o login
}
else
	header("location:../view/login.php");//se não estiver logado
