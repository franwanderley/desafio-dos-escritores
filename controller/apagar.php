<?php 
    include('../model/artigo.php');
    session_start();
    //deletar artigo
    if( isset( $_GET['id'] ) && isset( $_SESSION['user'] ) ){
        $id = base64_decode($_GET['id']);
        $artigo = new Artigo(null,null,null,null,null);
        $artigo->setId($id);
        $artigo->excluir();
        echo "<script type='text/javascript'>swal('Excluido com Sucesso','','info');</script>";
        header('location:../view/pcontrole.php');
    }
    else
        header('location:../pcontrole.php');
?>