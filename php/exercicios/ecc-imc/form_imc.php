<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cáculo IMC</title>
    </head>
    <body>
        <h1>Cálculo IMC</h1>
        <form action="imc.php" method="POST">
            Nome: <br>
            <input type="text" name="cmp_nome"><br>
            Idade: <br>
            <input type="number" name="cmp_idade"><br>
            Peso: <br>
            <input type="number" name="cmp_peso"><br>
            Altura: <br>
            <input type="text" name="cmp_altura"><br><br>
            
            <input type="submit" name="Enviar">
        </form>
    </body>
</html>
