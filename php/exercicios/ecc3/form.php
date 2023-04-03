<html>
	<head>
		<title> Exercicio 3 </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
    	<h2>Cadastro:</h2>>
    	<form action="exibe.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" value="" maxlength="50" /><br>
            <label for="sexo">Sexo: </label>
            	<select name="sexo">
            		<option value="" selected></option>
            		<option value="F">Feminino</option>
            		<option value="M">Masculino</option>
            	</select><br>
            <label for="idade">Idade: </label>
            <input type="number" name="idade" value="" maxlength="3" /><br>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
	</body>
</html>