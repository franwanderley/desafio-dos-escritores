<?php
include_once('pdo2.php');

class Tema{
    private $id;
    private $nome;
    private $pdo;

    public function __construct($nome){
        $this->pdo = conexao();
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
            return $this->nome;
    }

    public function setNome($nome){
            $this->nome = $nome;
    }

    public function inserirBD(){
        //inserir
        try{
            $inserir = $this->pdo->prepare("INSERT INTO tema(nome) VALUES(:nome)");
            $inserir->bindValue(":nome", $this->nome);  
            $v = $inserir->execute();

            if(!$inserir)//se deu algo errado ao inserir
                die("Algo deu errado");
            if($v == false)
                return "Algo deu Errado";
            else
                return true;

            return true;	 
        }catch(Exception $e){
             die ( $e.getMessage() );
         }
    }

    public static function buscarPorIdS($id){
        $conexao = conexao();
        $sql = "SELECT * FROM tema WHERE id = :id";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if(!$sql)
            die("Deu algo errado");//interrompe a pagina
        $r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public function buscarPorId(){
        $sql = "SELECT * FROM tema WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $this->id);
        $sql->execute();
        if(!$sql)
            die("Deu algo errado");//interrompe a pagina
        $r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public static function buscarTodos(){
        $pdo = conexao();
        $sql = "SELECT id,nome FROM tema";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        if(!$sql)
            die("Deu algo errado");//interrompe a pagina
        $r = $sql->fetchAll(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }
}
?>