<?php
    function conectaBD(){
        $host = "localhost";
        $usuarioBD = "root";
        $senhaBD = "root";
        $banco = "matricula";
        $conecta = mysqli_connect($host,$usuarioBD,$senhaBD,$banco);
        return $conecta;
    }
?>