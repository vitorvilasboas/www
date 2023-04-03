<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Minha primeira calculadora em PHP</h2>
        <form action="calc_calcular.php" method="POST">
            <label>1º Número:
                <input type="number" name="cmp_num1" placeholder="Informe o primeiro número"/>
            </label>
            <br><br>
            <label>2º Número:
                <input type="number" name="cmp_num2" placeholder="Informe o segundo número"/>
            </label>
            <br><br>
            <label>Operação:
                <select name="cmp_operacao">
                    <option value="0">---</option>
                    <option value="1">Soma</option>
                    <option value="2">Subtração</option>
                    <option value="3">Divisão</option>
                    <option value="4">Multiplicação</option>
                </select>
            </label>
            <br><br>
            <input type="submit" value="Calcular" />
        </form>
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
