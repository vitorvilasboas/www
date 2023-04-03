<?php
    function conectar(){
        $host = "localhost";
        $usuarioBD = "root";
        $senhaBD = "root";
        $banco = "eleicao";
        $conecta = mysqli_connect($host,$usuarioBD,$senhaBD,$banco);
        return $conecta;
    }
?>