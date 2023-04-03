<html>
	<head>
		<title> Exercicio 3 </title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style type="text/css">
			body{
				background-color: #ccc;
			}
			.container-fluid{
				background-color: #fff;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
	            <aside class="col-md-10" >
	            	<h2>Cadastro:</h2>
	            	<p class="text-center">Preencha todos os campos</p>
	            </aside>
	            <article class="col-md-2">
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
	            </article>
            </div>
        </div>
	</body>
</html>