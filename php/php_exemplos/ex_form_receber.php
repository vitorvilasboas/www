<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title></title>
    </head>
    <body>
        <h2>IMPRESSÃO DO RESULTADO</h2>
        <?php
            $n1 = $_POST["valor1"];
            $n2 = $_POST["valor2"];
            echo "<br>O valor do campo1 é $n1";
            echo "<br>O valor do campo2 é $n2";
            
            $soma = $n1 + $n2;
            echo "<br>A soma é $soma";
        ?>
    </body>
</html>
