<?php
    include_once('../model/artigo.php');
    session_start();
    
    if( isset($_GET['id']) ){
        $a = Artigo::buscarPorIdS( base64_decode($_GET['id']) );
    } 
    else
        header("location:index.php");  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="desafio dos escritores,<?php echo $a['titulo']; ?>">
    <meta name="author" content="Francisco Wanderly Teixera dos Santos Filho"> 
    <meta name="description" content="Artigo do site  Desafio dos Escritores: <?php
            echo $a['titulo']; ?>">
    
    <link rel="stylesheet" href="../_css/heefo.css" type="text/css">
    <link rel="stylesheet" href="../_css/index_style.css" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title><?php echo $a['titulo']; ?></title>
</head>
<body>
    <?php include_once('header.php');?>
    <main>
    <div class="artigo">
    <h4><?php echo $a['titulo'];?></h4>
     <?php
        $a = new Artigo($a['temaid'], $a['titulo'],$a['resumo'], $a['texto'], $a['date']);
        echo $a->mostrarArtigo();
        unset($a);
    ?>
    </div>
    </main> 
    <hr>
    <h4>Comentarios</h4>
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://desafiodosescritores.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
    <?php
        include('footer.php');
    ?>
    <script id="dsq-count-scr" src="//desafiodosescritores.disqus.com/count.js" async></script><!--Disqu-->
</body>
</html>