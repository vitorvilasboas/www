<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sistema Eleitoral</title>
    </head>
    <body>
        <?php
            session_start();
            if( !isset($_SESSION['vetor_votos']) ){
                $_SESSION['vetor_votos'] = array(0,0,0,0,0,0);
            }
            $voto = $_POST["cmp_cand"];
            switch ($voto) {
                case '1':{
                    $_SESSION['vetor_votos'][0] = (int)$_SESSION['vetor_votos'][0]+1;
                    echo "<h3>Voto computado!!</h3>Você votou no candidato 1.";
                    break;
                }
                case '2':{
                    (int)$_SESSION['vetor_votos'][1]++;
                    echo "<h3>Voto computado!!</h3>Você votou no candidato 2.";
                    break;
                }
                case '3':{
                    (int)$_SESSION['vetor_votos'][2]++;
                    echo "<h3>Voto computado!!</h3>Você votou no candidato 3.";
                    break;
                }
                case '4':{
                    (int)$_SESSION['vetor_votos'][3]++;
                    echo "<h3>Voto computado!!</h3>Você votou no candidato 4.";
                    break;
                }
                case '5':{
                    (int)$_SESSION['vetor_votos'][4]++;
                    echo "<h3>Voto computado!!</h3>Você votou NULO.";
                    break;
                }
                case '6':{
                    (int)$_SESSION['vetor_votos'][5]++;
                    echo "<h3>Voto computado!!</h3>Você votou BRANCO.";
                    break;
                }
                default :
                    echo "Voto inválido!!";           
            }
        ?>
        <br><br>
        <a href="index.php">Novo voto</a>
        <br><br>
        <a href="resultado.php">Finalizar eleição e Gerar Resultado</a>
        
    </body>
</html>
