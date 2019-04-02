<?php
    include_once('pdo2.php');
    class Artigo{
        private $id;
        private $temaid;
        private $titulo; 
        private $resumo; 
        private $texto;
        private $data;
        private $pdo;

        public function __construct($temaid,$titulo,$resumo,$texto,$data){
            $this->pdo = conexao();
            $this->temaid = htmlspecialchars($temaid);
            $this->titulo = htmlspecialchars($titulo);
            $this->resumo = htmlspecialchars($resumo);
            $this->texto  = $texto;
            $this->data   = $data;
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
        
        public function getTemaid(){
                return $this->temaid;
        }

        public function setTemaid($temaid){
                $this->temaid = $temaid;
        }
 
        public function getTitulo(){
                return $this->titulo;
        }

        public function setTitulo($titulo){
                $this->titulo = $titulo;
        }

        public function getTexto(){
                return $this->texto;
        }

        public function setTexto($texto){
                $this->texto = $texto;
        }

        public function getData(){
            return $this->data;
        }

        public function inserirBD(){
            //inserir
            try{
                $dta = getdate();
                $this->data = $dta['mday']."/".$dta['mon']."/".$dta['year'];
            	$inserir = $this->pdo->prepare("INSERT INTO artigos(temaid,titulo,resumo,texto,date) VALUES(:temaid,:titulo,:resumo,:texto,:date)");
            	$inserir->bindValue(":temaid", $this->temaid);//Inserir com segurança
            	$inserir->bindValue(":titulo", $this->titulo);
            	$inserir->bindValue(":resumo", $this->resumo);
                $inserir->bindValue(":texto", $this->texto);  
                $inserir->bindValue(":date", $this->data);  
                $menssagem = $inserir->execute();
            
                if(!$menssagem || $menssagem == "")//se deu algo errado ao inserir
				    die("Algo deu errado");
			    else
				    return true;	 
    		}catch(Exception $e){
             	echo e.getMessage(). "<br>";
         	}
        }

        public static function buscarPorIdS($id){
            $conexao = conexao();
            $sql = "SELECT * FROM artigos WHERE id = :id";
            $sql = $conexao->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if(!$sql)
                die("Deu algo errado");//interrompe a pagina
            $r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
            return $r;
        }
    
        public function buscarPorId(){
            $sql = "SELECT * FROM artigos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $this->id);
            $sql->execute();
            if(!$sql)
                die("Deu algo errado");//interrompe a pagina
            $r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
            return $r;
        }

        public function buscarTema(){
            $conexao = conexao();
            $sql = "SELECT * FROM tema WHERE id = :id";
            $sql = $conexao->prepare($sql);
            $sql->bindValue(":id", $this->temaid);
            $sql->execute();
            if(!$sql)
                die("Deu algo errado");//interrompe a pagina
            $r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
            return $r;
        }

        public static function buscarTodos($ini, $qtd_pg){
            $pdo = conexao();
            $sql = "SELECT * FROM artigos ORDER BY date  LIMIT $ini,$qtd_pg";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            if(!$sql)
                die("Deu algo errado");//interrompe a pagina
            $r = $sql->fetchAll(PDO::FETCH_ASSOC);//se o id não existir $r será falso
            return $r;
        }

        public static function buscarPorTitulo($titulo){
            $pdo = conexao();
            $sql = "SELECT * FROM artigos WHERE titulo LIKE :titulo ORDER BY date ";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":titulo", "%".$titulo."%");//filtro
            $sql->execute();
            if(!$sql)
                die("Deu algo errado");//interrompe a pagina
            $r = $sql->fetchAll(PDO::FETCH_ASSOC);//se o id não existir $r será falso
            return $r;
        }

        public function mostrarArtigo(){
            $resul = "<i class='data'>".$this->data."</i><br>";
            $resul .= "<i class='tema'> # ".$this->buscarTema()['nome']."</i><br>";
            $resul .= $this->texto;

            return $resul;
        }

        public function mostrarArtigoR(){
            $resul = "<h4>".$this->titulo."</h4> ";
            $resul .= "<i class='data'>".$this->data."</i><br>";
            $resul .= "<i class='tema'> # ".$this->buscarTema()['nome']."</i><br>";
            $resul .= "<p>".$this->resumo."</p>";

            return $resul;
        }

        public function getResumo(){
                return $this->resumo;
        }

        public function setResumo($resumo){
                $this->resumo = $resumo;
        }

        public function excluir(){
            if($this->id != null)
            $sql = "DELETE FROM artigos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id",$this->id);
            $sql->execute();
            if(!$sql)
                die("Algo deu errado");
            $sql = null;
        }
    }


?>