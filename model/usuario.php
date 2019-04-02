<?php
include_once('pdo2.php');//conexão com o banco de dados

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    
    //constutor
    public function __construct($nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->pdo = conexao();
    }
    //sets e gets
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

    public function getEmail(){
        return $this->email;
    }
 
    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function logar(){
        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $this->email);//busca segura
		$sql->bindValue(":senha", $this->senha);//troco o nome generico pela variavel
		$sql->execute();
		if($sql == false)
			die("algo deu errado");
		$r = $sql->fetch(PDO::FETCH_ASSOC);//transforma em um array associativo
		
		if( empty($r) ){ //numero de colunas
            return "Email ou(e) senha errado";
        }else
            return $r['id'];
    }

    //inserir ou atualizar no banco de dados
    public function inserirBD(){
        //inserir
        $this->setSenha( md5($this->senha) );//criptografar a senha
        if($this->id == null){
            try{
            	$inserir = $this->pdo->prepare("INSERT INTO usuario(nome,email,senha) VALUES(:nome,:email,:senha)");
            	$inserir->bindValue(":nome", $this->nome);//Inserir com segurança
            	$inserir->bindValue(":email", $this->email);
                $inserir->bindValue(":senha", $this->senha);  
              
               $validar = $this->pdo->prepare("SELECT * FROM usuario  WHERE senha = ?");//prepara para procurar a senha
               $validar->execute(array($this->senha));//procura a senha
				if(!$validar)
					die("Algo deu errado");
              	if($validar->rowCount() == 0){ //se não tiver nenhuma senha
               	    $inserir->execute();
					if(!$inserir)//se deu algo errado ao inserir
						die("Algo deu errado");
					else
						return true;
						
				   }else//se ja tiver essa senha
						return "Já existe";	 
    			}catch(Exception $e){
             		echo e.getMessage(). "<br>";
         		}
        }
        //atualizar
        else{
            $sql = "UPDATE usuario SET nome=:nome, email=:email,senha=:senha WHERE id =:id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(":nome",$this->nome);
			$sql->bindValue(":email", $this->email);
			$sql->bindValue(":senha", $this->senha);
			$sql->bindValue(":id", $this->id);
            $sql->execute();
			if(!$sql)
				die("Algo deu errado");
			else
				return true;
        }
    }

    public static function validaEmail($id){
        $conexao = conexao();
        $sql = "UPDATE usuario SET vemail=:vemail WHERE id =:id";
        $sql = $conexao->prepare($sql);
        $sql->bindValue(":vemail", 1);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if(!$sql)
            die("Algo deu errado");
        else
            return true;
    }

    public static function buscarPorIdS($id){
        $conexao = conexao();
        $sql = "SELECT * FROM usuario WHERE id = :id";
		$sql = $conexao->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if(!$sql)
			die("Deu algo errado");//interrompe a pagina
		$r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public static function buscarNivelS($id){
        $conexao = conexao();
        $sql = "SELECT nivel FROM usuario WHERE id = :id";
		$sql = $conexao->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if(!$sql)
			die("Deu algo errado");//interrompe a pagina
		$r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public static function buscarPorEmailS($email){
        $conexao = conexao();
        $sql = "SELECT * FROM usuario WHERE email = :email";
		$sql = $conexao->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();
		if(!$sql)
			die("Deu algo errado");//interrompe a pagina
		$r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public function buscarPorId(){
        $sql = "SELECT * FROM usuario WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();
		if(!$sql)
			die("Deu algo errado");//interrompe a pagina
		$r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    public function buscarPorSenha(){
        $sql = "SELECT id FROM usuario WHERE senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":senha", $this->senha);
		$sql->execute();
		if(!$sql)
			die("Deu algo errado");//interrompe a pagina
		$r = $sql->fetch(PDO::FETCH_ASSOC);//se o id não existir $r será falso
        return $r;
    }

    //deletar usuario
    public function excluir(){
        if($this->id != null)
        $sql = "DELETE FROM usuario WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id",$this->id);
		$sql->execute();
		if(!$sql)
			die("Algo deu errado");
		$sql = null;
    }

    public static function gerarSenha(){
        $alfabeto = "23456789ABCDEFGHIJLMNOPQRST";
        $tamanho =12;
        $letra = "";
        $resultado = "";
        for($i = 1;$i <= 12; $i++){
            $letra = substr($alfabeto, rand(0,23), 1);
            $resultado .= $letra;
        }
        return $resultado;
    }
}
?>