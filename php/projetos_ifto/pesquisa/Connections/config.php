<?php
include 'funcoes.php';
function conexao(){
    $HOST = 'localhost';
    $USER = 'root';
    $PASS = '';
    $BD = 'pesquisa';
    try{
        $con = new PDO("mysql:host=$HOST;dbname=$BD",$USER, $PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $con->exec("set names utf8");
        return $con;

    }catch(PDOexception $e){
        echo "Erro: ".$e->getMessage();
    }    
}


