<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sistema Eleitoral</title>
    </head>
    <body>
        <?php
            echo '<h4>Votação encerrada</h4>';
            
            require_once 'conexao.php';
            $conexao = conectar();
            $sql_select = "SELECT * FROM candidato";
            $resultado= mysqli_query($conexao, $sql_select);//executa uma instrução sql
            
            echo "<h4>Resultado:</h4>";
            $total = 0;
            while( $tupla = mysqli_fetch_assoc($resultado) ){
                $id = $tupla['cand_id'];
                $nome = $tupla['cand_nome'];
                $qtd = $tupla['cand_qtd'];
                
                $total = $total + $qtd;
                $percentual = ($qtd/$total)*100;
                
                echo "   <b>Candidato $id:</b> $qtd ($percentual%)<br>"; 
            }
            
            echo "<h4>Total de Votos: $total</h4>";

            mysqli_close($conexao);
            
        ?>
        <br><br>
        <a href="computar.php?reiniciar=sim">Reiniciar Votação</a>
    </body>
</html>
