<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cálculo da média - IFTO</h2>
        <?php
            $nota1 = $_POST["cmp_nota1"];
            $nota2 = $_POST["cmp_nota2"];
            $notaop = $_POST["cmp_notaop"];
            
            if( $notaop == '-1' ){//não fez a optativa
                $media = ($nota1 + $nota2) / 2;
            } else {//fez a optativa
                if($nota1 < $nota2){//notaop substitui nota1
                    $media = ($nota2 + $notaop) / 2;
                } else {//notaop substitui nota2
                    $media = ($nota1 + $notaop) / 2;
                }
            }
            echo "A media do aluno é $media";
            if($media>=6){
                echo "<h2>Aluno APROVADO!! :D </h2>";
            } elseif($media<6 && $media >=3){
                echo "<h2>Aluno terá que fazer o EXAME!!! :| </h2>";
            } else {
                echo "<h2>Aluno REPROVADO!! :( </h2>";
            }
            
            
        ?>
    </body>
</html>
