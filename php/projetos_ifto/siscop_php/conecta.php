<?php
    require("adodb/adodb.inc.php"); //biblioteca necessaria para utilização do adodb
    class conexao {
        var $tipo_banco = "mysql";
        var $servidor = "localhost";
        var $usuario = "root";
        var $senha = "";
        var $dbbanco = "siscop";  
        var $banco;

        function conexao(){//metodo construtor da conexao
            $this->banco = NewADOConnection($this->tipo_banco);
            $this->banco->dialect = 3;
            $this->banco->debug = false;//mostrar descrição de erros e avisos
            $this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->dbbanco);
            $this->banco->EXECUTE("set names 'utf8'");
        }
    }
    $con = new conexao();
?>