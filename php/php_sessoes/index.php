<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Vitor Vilas Boas">
        <title>Sessões PHP</title>
    </head>
    <body>
        <form action="criar_sessoes.php" method="POST">
            
            <h3>Formulário de cadastro </h3><hr><br>
            
            <label>Nome: <input type="text" name="campo_nome"/></label><br><br>
            
            <label>CPF: <input type="text" name="campo_cpf"/></label><br><br>
            
            <label>Idade: <input type="number" name="campo_idade"/></label><br><br>
            
            <label>Sexo: 
                <select name="campo_sexo">
                    <option value=""></option>
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                </select>
            </label><br><br>
            
            <input type="hidden" name="status" value="aguardando_aprovacao"/> 
            
            <input type="submit" value="Enviar"/> 
            
        </form>
    </body>
</html>
