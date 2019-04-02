
<footer>
    <h4 class="titufooter">Desafio dos Escritores</h4>
    <div class="social-icons">
            <a href="#"> <i class="fab fa-facebook"></i> </a>
            <a href="#"> <i class="fab fa-twitter"></i> </a>
            <a href="#"> <i class="fab fa-google"></i> </a>
            <a href="#"> <i class="fab fa-instagram"></i> </a>
            <a href="#"> <i class="fas fa-envelope"></i> </a>
        </div>
        <p class="copyright">
            Copyright &copy; DDE. Todos os direitos reservados. 
        </p>
        <?php unset($r); ?> 
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script> //Funçoes do JQUERY
        $(".btn-menu").click(function () {
            $(".menu").show();//Abrir o menu
        });
        $(".btnclose").click(function () {
            $(".menu").hide();//Fechar o menu
        });

        $(".btn-search").click(function(){
            $(".search").show();
            $(".close").show();
            $(".btn-search").hide();
        });

        $(".close").click(function(){
            $(".search").hide();
            $(".close").hide();
            $(".btn-search").show();
        });
        
    </script>
</body>
</html>