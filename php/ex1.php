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
            define('const', 10);
            $var1 = 5;
            $var0 = 7;
            $var2 = $var0 + $var1;
            $var3 = "Vitor";
            echo "<h3>var1= $var1 </h3>";
            echo "<h3>var2= $var2 </h3>";
            echo "<h3>var3= $var3 </h3>"." Mendes Vilas Boas";
        ?>
        
        <h3>var3= <?=$var3?> Mendes Vilas Boas</h3>
    </body>
</html>