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
        <title>Meu primeiro formulario dinâmico</title>
    </head>
    <body>
        <h2>Formulário</h2>
        <form action="form_receber.php" method="POST" name="form_soma">
            <label for="valor1">Primeiro Valor:
                <input type="number" name="valor1"/>
            </label>
            <br><br>
            <label for="valor2">Segundo Valor:
                <input type="number" name="valor2"/>
            </label>
            <br><br>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
