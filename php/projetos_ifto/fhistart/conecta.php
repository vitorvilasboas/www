<?php
require("adodb/adodb.inc.php"); //biblioteca necessaria para trabalhar com adodb
require ("funcoes.php");
    class conexao{//abre a conexão
        var $tipo_banco = "mysql";
	var $servidor = "localhost";
	var $usuario = "root";
	var $senha = "1234";
	var $dbbanco = "fhistart";  
	var $banco;
	
        function conexao(){ //metodo construtor		  
            $this->banco = NewADOConnection($this->tipo_banco);
            $this->banco->dialect = 3;
	    $this->banco->debug = true;
	    $this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->dbbanco);
            $this->banco->EXECUTE("set names 'utf8'");
	}//fecha o metodo construtor
    }//fecha a conexão
    $con = new conexao();	
	
?>
