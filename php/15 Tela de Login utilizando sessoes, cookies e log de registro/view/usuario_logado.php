<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>                 <!--nome do usuário -->
		<h1>Seja bem vindo <?=$_SESSION['usuario']?>, você está logado!</h1>
		
		<!-- Link para efetuar logout-->
		<!-- Esse link vai passar informações pelo método GET -->
		<p><a href="index.php?logout=sim">Efetuar logout</a></p>
	</body>
</html>