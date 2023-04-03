<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title></title>
    </head>
    <body>
        <h2>Minha primeira calculadora em PHP</h2>
        <hr>
        <?php
            $n1 = $_POST["cmp_num1"];
            $n2 = $_POST["cmp_num2"];
            $operacao = $_POST["cmp_operacao"];
            switch ($operacao){
                case '1':{//soma
                    $resultado = $n1 + $n2;
                    echo "A soma entre $n1 e $n2 é $resultado<br><br>";
                    break;
                }
                case '2':{//subtração
                    $resultado = $n1 - $n2;
                    echo "A diferença entre $n1 e $n2 é $resultado<br><br>";
                    break;
                }
                case '3':{//divisão
                    $resultado = $n1 / $n2;
                    echo "O quociente entre $n1 e $n2 é $resultado<br><br>";
                    break;
                }
                case '4':{//produto
                    $resultado = $n1 * $n2;
                    echo "O produto entre $n1 e $n2 é $resultado<br><br>";
                    break;
                }
                default :
                    echo "Você informou uma operação inválida!!! :(";
            }
        ?>
    </body>
</html>
