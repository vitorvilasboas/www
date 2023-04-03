<?php
	// vamos receber uma variavel via GET e exibir a mesma na tela 
	
	$texto = $_GET['nome'];

	// FAÇA OS TESTES:
	// 1º tente executar as páginas sem informar o valor da variavel
	// nome no URL da página
	//
	// 2º informe na URL da pagina o valor da váriavel nome 
	
?>
<html>
	<head>
		<title>Curso de PHP - método get</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<!-- Exibindo a variavel texto criada anteriormente -->
		<!-- codigos PHP também podem ser renderizados pelas 
		     tags em vermelho logo abaixo, que estão entre 
			 os sinais de interrogação-->
			 
		Olá <strong><?=$texto?></strong>, seja bem vindo!
	</body>
</html>