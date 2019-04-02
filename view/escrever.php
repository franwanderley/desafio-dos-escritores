<?php
    session_start();
    include('../model/artigo.php');
    include('../model/tema.php');
    if( !isset($_SESSION['user']) )
        header('location:login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="desafio dos escritores, escrever artigos,fazer artigos online para publicar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta name="description" content="Escrever Artigos para o Desafio dos Escritores">
    <meta name="tag">
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Escrever Artigos para o Desafio dos Escritores</title>
</head>
<body>
        <?php
        include_once('header.php');
        $r = Tema::buscarTodos();

    ?>
        <!--Usar o sweet alert -->
    <script src=" https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    
    <h3 class="titulo"> Escrever Artigos</h3>
    <form action="" method="post" class="escrever" onsubmit="return validar()">
                <label for="tema">Tema :</label>
                 <select name="tema" id="tema" class="tema1" required>
                 <option value="<?php echo null;?>">Escolha um Tema</option>
                 <?php
                    foreach($r as $tema){

                 ?>
                    <option value="<?php echo $tema['id'];?>"><?php echo $tema['nome'];?></option>
                    <?php } ?>
                </select><br>
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo"><br>
                <label for="resumo">Resumo:</label><br>
                <textarea name="resumo" id="resumo" onkeyup="limite_textarea(this.value)" class="tema1" rows="5" cols="20" style="width:80%" required></textarea>
                <span id="cont">250</span> Restantes <br>
                <textarea name="content" id="editor"></textarea><br/>
               <button class="efeito btn" type="submit" name="action">Enviar</button>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="../_js/escrever.js"></script>

    <?php
        if( isset($_POST['tema']) ){
            
            $login = new Artigo($_POST['tema'],$_POST['titulo'],$_POST['resumo'], $_POST['content']);
            $login->inserirBD();
            echo "<script type='text/javascript'>swal('Cadastrado com Sucesso','','success');</script>";
        }
        include('footer.php');
    ?>
</body>
</html>