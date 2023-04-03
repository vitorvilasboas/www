<?php
    function conectaBD(){
        $host = "localhost";
        $usuarioBD = "root";
        $senhaBD = "root";
        $banco = "ifeventos";

        $conexao = mysqli_connect($host,$usuarioBD,$senhaBD,$banco);

        return $conexao;
    }
?>