<?php
    include('../model/artigo.php');
    include('../model/usuario.php');
    include('../model/tema.php');
    session_start();
    if( !isset($_SESSION['user']) )
        header('location:login.php');
    else{
        $n = Usuario::buscarPorIdS($_SESSION['user']);
        if($n['nivel'] == 1){
            echo "<script>
            swal({
                title: 'Acesso Negado',
                text: 'Você não pode trafegar nesta pagina!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    window.location.replace('index.php');
                } else {
                    window.location.replace('index.php');
                }
              });
            </script>";
        }
    }
    //paginaçãp
    $pagina = ( isset( $_GET['pagina'] ) ) ? $_GET['pagina'] : 1;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho">
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css"> 
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Painel de Controle</title>
</head>
<body>
    <!--Usar o sweet alert -->
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
<?php include_once('header.php'); ?>
    <main>
    <?php
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
    <h3 class="titulo"> Painel de Controle</h3>
    <h3 style="margin-left:2%;">Deletar Artigos</h3>
    <?php
        foreach($ta as $artigo){
    ?>
    <div class="artigo">
        <?php
            $idc = base64_encode($artigo['id']);
            echo "<script>var x = '".$idc."'</script>";
            echo "<button class='btn-apagar' onclick='apagar(x);'><i class='fas fa-trash'></i></button>";
            $a = new Artigo($artigo['temaid'], $artigo['titulo'],$artigo['resumo'], $artigo['texto'], $artigo['date']);
            echo $a->mostrarArtigoR();
            unset($a);
        ?>
        <hr> 
    </div>
    <?php } ?>

    <!-- PAGINAÇÂO-->
    <div  class="pagina">
        <ul class="pagination">
            <li class="page-item"><a <?php echo ($pagina == 1) ? "hidden": ""; ?> href="index.php?pagina=<?php echo $pagina-1 ?>"><<</a></li>
            <?php for($i = 1; $i <= $qtd_pg;$i++) {?>
            <li class="page-item"><a  href="index.php?pagina=<?php echo $i; ?>" ><?php echo $i ?></a></li>
            <?php } ?>
            <li class="page-item"><a <?php echo ($pagina+1 > $qtd_pg) ? "hidden": ""; ?> href="index.php?pagina=<?php echo $pagina+1 ?>">>></a></li>
        </ul>
    </div>
        <!-- Novo Tema -->
        <form action="" class="box" method="post">
            <h3>Novo Tema:</h3>
            <input type="text" name="tema" placeholder="Nome do Tema"  required>
            <input type="submit" value="Gravar">
        </form>
    
    </main>
        <?php 
        if( isset($_POST['tema']) ){
            $tema = new Tema($_POST['tema']);
             $tema->InserirBD();
                echo "<script type='text/javascript'>swal('Criado novo tema com Sucesso','','success');</script>";

        }
    ?>
    <?php
        include('footer.php');
    ?>
    <!-- Modal de Confirmação -->
    <script>
        function apagar(valor){
            swal({
                title: 'Você tem certeza?',
                text: 'Deseja realmente apagar este artigo?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    window.location.replace('../controller/apagar.php?id='+valor);
                } else {
                  swal('O artigo não foi apagado!');
                }
              });
        }
    </script>
</body>
</html>