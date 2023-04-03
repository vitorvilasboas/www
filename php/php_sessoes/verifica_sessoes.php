<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            if ( !isset($_SESSION['status']) ){
                echo "<h2>Sessões encerradas!!</h2>";
                echo 'Teste: '.$_SESSION['usuario_nome'].'   -   '.$_SESSION['usuario_cpf'];
            } else {
                echo "<h2>Sessões ainda ativas!!</h2>";
            }
        ?>
        <br><br><a href="index.php">Voltar à Página Inicial</a>
    </body>
</html>
