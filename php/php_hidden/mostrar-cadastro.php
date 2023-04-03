<!DOCTYPE html>
<html>
    <head>
        <title>Campos Ocultos PHP (Hidden)</title>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
    </head>
    <body>	
        <h2>Dados do cadastro:</h2><br><br>
        <?php
            echo "Título: ".$_POST['cmp_titulo'].'<br><br>';
            echo "Área: ".$_POST['cmp_area'].'<br><br>';
            echo "Data Inicio: ".$_POST['cmp_dtinicio'].'<br><br>';
            echo "Data Fim: ".$_POST['cmp_dtfim'].'<br><br>';
            echo "Nome: ".$_POST['cmp_nome'].'<br><br>';
            echo "Tipo: ".$_POST['cmp_tipo'].'<br><br>';
            echo "Local: ".$_POST['cmp_local'].'<br><br>';
            echo "Endereço: ".$_POST['cmp_endereco'].'<br><br>';
            echo "Qtd. vagas: ".$_POST['cmp_vagas'].'<br><br>';
        ?>
        <br><br><a href="index.php">Voltar à Página Inicial</a>
    </body>
</html>