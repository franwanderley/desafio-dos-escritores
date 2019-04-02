<?php
// conexão com PDO;
function conexao(){
    try{
        $pdo = new PDO('mysql:dbname=artigos;host=localhost', 'root', "");//Caminho -- nome do banco-- login --senha
    }catch(PDOException $e){
        die($e.getMessage());
    }
    return $pdo;
}
?>