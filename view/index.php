<?php
    session_start();
    include('../model/artigo.php');
    //paginação
    $pagina = ( isset( $_GET['pagina'] ) ) ? $_GET['pagina'] : 1;

    $ta = Artigo::buscarTodos(0, 10000);
    //tamanho de artigos
    $total = count($ta);
    //quantidade de artigos por pagina
    $qtde = 8;
    //quantidade de paginas que vou precisar.
    $qtd_pg = ceil($total / $qtde);
    //marcar o inicio
    $ini = ($qtde*$pagina) - $qtde;
    $ta = Artigo::buscarTodos($ini, $qtde);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="keywords" content="desafio dos escritores,artigos,texto,todos os artigos,escrever artigos,escrever artigos e publicar online,artigos sobre determinados temas,ler conteudo interessante,<?php
        foreach($ta as $tema){
            echo $tema['titulo']." ,";
        } ?>">

    <meta name="description" content="Todos os artigos do site do desafio dos Escritores: <?php
        foreach($ta as $tema){
            echo $tema['titulo']." ,";
        } ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title> Artigos do Desafio de Escritores</title>
</head>
<body>
    <?php include_once('header.php'); ?>
    <main>
    <h3 class="titulo"> Todos os Artigos</h3>
    <?php
        foreach($ta as $artigo){
    ?>
    <div class="artigo">
     <?php
        $a = new Artigo($artigo['temaid'], $artigo['titulo'],$artigo['resumo'], $artigo['texto'], $artigo['date']);
        $idc = base64_encode($artigo['id']);
        echo $a->mostrarArtigoR();
        echo "<a href='detalhe.php?id=".$idc."'>Ver Materia</a>";
        unset($a);
    ?>
     <hr> 
    </div>
    <?php } ?>
    <!-- PAGINAÇÃO -->
    <div  class="pagina">
        <ul class="pagination">
            <li class="page-item"><a <?php echo ($pagina == 1) ? "hidden": ""; ?> href="index.php?pagina=<?php echo $pagina-1 ?>"><<</a></li>
            <?php for($i = 1; $i <= $qtd_pg;$i++) {?>
            <li class="page-item"><a  href="index.php?pagina=<?php echo $i; ?>" ><?php echo $i ?></a></li>
            <?php } ?>
            <li class="page-item"><a <?php echo ($pagina+1 > $qtd_pg) ? "hidden": ""; ?> href="index.php?pagina=<?php echo $pagina+1 ?>">>></a></li>
        </ul>
    </div>
    </main>


    <?php
        include('footer.php');
    ?>

    
</body>
</html>