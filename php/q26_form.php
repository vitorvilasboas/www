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
        <h2>Cálculo da média - IFTO</h2>
        <p>Informe as duas notas normais e a nota optativa do aluno. 
           <br>Caso o aluno não tenha realizado
            a avaliação optativa, informe -1 no respectivo campo.
        </p>
        
        <form action="q26_exibir.php" method="POST">
            <label for="cmp_nota1">Nota 1: 
                <input type="text" name="cmp_nota1" placeholder="Informe a nota 1">
            </label><br>
            <label for="cmp_nota2">Nota 2:
                <input type="text" name="cmp_nota2" placeholder="Informe a nota 2">
            </label><br>
            <label for="cmp_notaop">Nota Optativa:
                <input type="text" name="cmp_notaop" placeholder="Informe a nota optativa">
            </label>
            <br><br>
            <input type="submit" name="btn_calcular" value="Calcular Média"/>
        </form>

    </body>
</html>
