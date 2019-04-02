<?php
     include_once('../model/artigo.php');
     session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta name="keywords" content="desafio dos escritores,artigos,texto,todos os artigos,escrever artigos,escrever artigos e publicar online,artigos sobre determinados temas,ler conteudo interessante">

    <meta name="description" content="buscar artigos no Desafio dos Escritores">
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Buscar Artigos Desafio dos Escritores</title>

</head>
<body>
    <?php include_once('header.php'); ?>
    <?php
        if( empty($_POST['procurar']) )
            $r = Artigo::buscarTodos(0,10);
        else
            $r = Artigo::buscarPorTitulo($_POST['procurar']);
    ?>

    <h3 class="titulo"> Resultado</h3>
    <?php
        foreach($r as $artigo){
    ?>
    <div class="artigo">
     <?php
        $a = new Artigo($artigo['temaid'], $artigo['titulo'],$artigo['resumo'], $artigo['texto'], $artigo['date']);
        echo $a->mostrarArtigoR();
        $idc = base64_encode($artigo['id']);
        echo "<a href='detalhe.php?id=".$idc."'>Ver Materia</a>";
        unset($a);
    ?>
     <hr> 
    </div>
        <?php } ?>
    </main>
    <?php
        include('footer.php');
    ?>
</body>
</html>