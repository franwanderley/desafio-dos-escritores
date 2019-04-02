<?php
    include_once('../model/usuario.php');
?>

    <header>
    
        <!-- botão do menu reponsivo -->
        <button class="btn-menu">
			<i class="fas fa-bars fa-lg"></i>
		</button>
        <!--Botão Mobile Procurar-->
       <a href="index.php"><h2 class="logo">Desafio de Escritores</h2></a>
       <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
       <a  class="close">
			    <i class="fas fa-times"></i>
		</a>
       
        <form class="search" action="resultado.php" method="post">
            <input type="search"  name="procurar" id="procura" placeholder="Buscar Artigos">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <?php
            //Perfil
            if ( isset($_SESSION['user']) ) {
                $r = Usuario::buscarPorIdS($_SESSION['user']);
                ?>
                <div class="perfil">
                <i class="far fa-user"></i>
                <p class="nome">
                    <?php echo $r['nome']; ?>
                </p>
                <a href="../controller/sair.php" class="sair">Sair</a>
                </div>
                <?php    
            } else {
                $r = array("nivel" => 1);
                ?>
               <div class="logins">
                    <a href="login.php">Entrar</a>
                    <a href="cadastra.php">Cadastrar</a>
               </div>
                <?php
            }
        ?>
        <!-- menu -->
        <nav class="menu">
            <a class="btnclose">
			    <i class="fas fa-times"></i>
		    </a>
		    <!--Close-->

            <!-- perfil responsivo -->
            <?php
                //Perfil
                if ( isset($_SESSION['user']) ) {
             ?>
            <div class="perfil2">
            <i class="far fa-user"></i>
            <p class="nome">
                <?php echo $r['nome']; ?>
            </p>
            <a href="../controller/sair.php" class="sair">Sair</a>
            </div>
            <?php    
                } else {
                $r = array("nivel" => 1);
            ?>
            <div class="logins2">
                <a href="login.php">Entrar</a>
                <a href="cadastra.php">Cadastrar</a>
            </div>
            <?php
                }
            ?>

            <hr>
            <ul>
               <li><a href="index.php">Home</a></li>
               <li><a href="escrever.php">Escrever</a></li>
               <li><a href="resultado.php">Resultado</a></li>
               <li><a href="contato.php">Contato</a></li>
               <?php if($r['nivel'] == 2){ ?>
                <li><a href="pcontrole.php">Painel de Controle</a></li>
               <?php }?>
           </ul>
        </nav>
    </header>