<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>PHP com Banco de Dados</title>
    </head>
    <body>
        <h2>Operações PHP com Banco de Dados</h2>
        <form action="operacoes.php" method="POST">
            <h2>Escolha uma operação:</h2>
            <label>
                <select name="cmp_seila">
                    <option value="0">---</option>
                    <option value="listar">Selecionar</option>
                    <option value="excluir">Deletar</option>
                    <option value="cadastrar">Inserir</option>
                    <option value="alterar">Alterar</option>
                </select>
            </label>
            <br><br>
            <input type="submit" value="Mandar"/>
        </form>
    </body>
</html>
