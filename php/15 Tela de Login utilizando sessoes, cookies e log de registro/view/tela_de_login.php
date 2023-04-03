<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>
		<h4> TELA DE LOGIN </h4>
		<p>Efetue login para ter acesso ao sistema!</p> <br>
		<form method="post">
			<p>Usuário:</p>        
			<input type="text" name="usuario" />
													<!-- Observem que a identificação de um campo de um formulario -->
			<p>Senha:</p>                           <!-- em php é feita utilizando o atributo name -->
			<input type="password" name="senha" />  <!-- Em javascript essa identificação era feita com o atributo id -->
			
			
			<!-- Oferece a opção de manter logado ao usuário-->
			<p> <input type="checkbox" value="sim" name="manter_login"> Permanecer logado </p>
			
			<input type="submit" value="Efetuar login"/>
		</form>
	</body>
</html>