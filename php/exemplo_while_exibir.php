<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $numero = $_POST["cmp_numero"];
            
            // imprimir os numeros de 1 ate $numero 
            $contador = 0;
            while( $contador <= $numero ){//enquanto
                echo "$contador<br>";
                $contador++;
            }
            echo "Saiu porque o contador é $contador";
            
            // imprimir do $numero ate 1
            for($cont=$numero;$cont>=1;$cont--){//para
                echo "<br>$cont";
            }
            echo "Saiu porque o cont é $cont";
            
            
            $numeros[1]=40;
            $numeros[2]=69;
            $numeros[3]=38;
            
            //echo "$numeros[2]";
            
            for($cont=1;$cont<=3;$cont++){
                echo "<br>$numeros[$cont]";
            }
            
            
        ?>
    </body>
</html>
