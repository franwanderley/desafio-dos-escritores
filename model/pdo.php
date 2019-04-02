<?php
// conexão com PDO;
function conexao(){
    try{
        $pdo = new PDO('mysql:dbname=epiz_23047560_artigos;host=sql311.epizy.com', 'epiz_23047560', "KyIFHxkTPi");//Caminho -- nome do banco-- login --senha
    }catch(PDOException $e){
        die("Aconteceu algo de errado com o bd.");
    }
    return $pdo;
}
$pdo = conexao();
var_dump($pdo);
?>
