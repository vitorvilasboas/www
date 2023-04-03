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
        <?php
            //$nota=5;
            //$mediaMinima = 6;
            $nota=$_GET['n'];
            $mediaMinima = $_GET['media'];
            /*if( $nota > 8 && $nota < 9 ){
                echo "APROVADO COM CONCEITO B";
            }*/
            //if( $nota >= $mediaMinima)
            if( (($nota > $mediaMinima) || ($nota == $mediaMinima)) ) {
                echo "APROVADO";
            } else {
                echo "REPROVADO";
            }
        ?> 
    </body>
</html>
