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
            $boletim_urna = $_SESSION['vetor_votos'];
            echo '<h4>Votação encerrada</h4>';
            
            $total = 0;
            foreach ($boletim_urna as $indice) {
                $total = $total + (int)$indice;
            }
            echo "<h4>Total de Votos: $total</h4>";
            
            echo "<h4>Resultado:</h4>";
            $candidato = 1;
            foreach ($boletim_urna as $indice) {
                $percentual = ($indice/$total)*100;
                echo "   <b>Candidato $candidato:</b> $indice ($percentual%)<br>";
                $candidato++;
            }
            
            unset($_SESSION['vetor_votos']); 
        ?>
        <br><br>
        <a href="index.php">Reiniciar Votação</a>
    </body>
</html>
