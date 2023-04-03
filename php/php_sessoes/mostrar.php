<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sessões PHP</title>
    </head>
    <body>
        <h3>Mostrando valores (POST, variável e Sessões):</h3>
        <?php
            session_start();
            echo "Valor do POST['campo_nome']: ". $_POST['campo_nome'];
            echo "<br><br>";
            echo "Valor da variavel nome: $nome";
            echo "<br><br>";
            echo "Valor da sessão usuario_nome: ".$_SESSION['usuario_nome'];
            echo "<br><br>Valor da sessão usuario_cpf: ".$_SESSION['usuario_cpf'];
            echo "<br><br>Valor da sessão usuario_sexo: ".$_SESSION['usuario_sexo'];
            echo "<br><br>Valor da sessão usuario_idade: ".$_SESSION['usuario_idade'];
            echo "<br><br>Valor da sessão status: ".$_SESSION['status'];
        ?>
        <br><br>
        <a href="destruir_sessoes.php?">Encerrar Sessões</a>
        
    </body>
</html>
